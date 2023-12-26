<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Models\CmsProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveuser(Request $request)
    {
        $name = request('name') ?? '';
        $phone = request('phone') ?? '';
        $email = request('email') ?? '';
        $address = request('address') ?? '';
        $customer_note = request('customer_note') ?? '';

        $user = session()->get('user', []);
        $user['user'] = [
                "name" => $name,
                "phone" => $phone,
                "email" => $email,
                "address" => $address,
                "customer_note" => $customer_note
            ]; 
        session()->put('user', $user);
    }
    public function vnpayPayment(Request $request)
    {
        $params = $request->all();

        if(isset($params['submit']) == 'submit'){

            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return redirect()->back()->with('errorMessage', __('Cart is empty!'));
            }

            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);
            // Check and store order
            $order_params = $request->only([
                'name',
                'email',
                'phone',
                'address',
                'customer_note'
            ]);
            $order_params['is_type'] = Consts::ORDER_TYPE['product'];
            $order = Order::create($order_params);

            $data = [];
            foreach ($cart as $id => $details) {
                // Check and store order_detail
                $order_detail_params['order_id'] = $order->id;
                $order_detail_params['item_id'] = $id;
                $order_detail_params['quantity'] = $details['quantity'] ?? 1;
                $order_detail_params['price'] = $details['price'] ?? null;
                array_push($data, $order_detail_params);

                $product = CmsProduct::findOrFail($id);
                $quantity = $details['quantity'];
                $soluongconlai = $product->soluongconlai - $quantity;
                $product->soluongconlai = $soluongconlai;
                $product->save();

            }
            OrderDetail::insert($data);
            session()->forget('cart');

            echo"<script>alert('Đặt hàng thành công, chúng tôi sẽ gửi hàng đến bạn trong thời gian sớm nhất!');window.location.href='/gio-hang';</script>";

        }else{


            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8005/gio-hang";
            $vnp_TmnCode = "MDH116ZV";//Mã website tại VNPAY 
            $vnp_HashSecret = "RKTPTYJOPWSRZPSTTBVPGTDLQXALEJOK"; //Chuỗi bí mật

            $vnp_TxnRef = $_REQUEST['madonhang']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $_REQUEST['tongtien'] * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }

        }
        
    }
    public function storeOrderService(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'customer_note' => "required|string",
                'item_id' => "required|integer|min:0",
            ]);
            // Check and store order
            $order_params = $request->only([
                'name', 'email', 'phone', 'customer_note'
            ]);
            $order_params['is_type'] = Consts::ORDER_TYPE['service'];
            $order = Order::create($order_params);

            // Check and store order_detail
            $order_detail_params = $request->only([
                'item_id', 'quantity', 'price', 'discount'
            ]);
            $order_detail_params['quantity'] = $request->get('quantity') > 0 ? $request->get('quantity') : 1;
            $order_detail_params['order_id'] = $order->id;
            $order_detail_params['json_params']['post_type'] = Consts::POST_TYPE['service'];
            $order_detail_params['json_params']['post_link'] = $request->headers->get('referer');

            $order_detail = OrderDetail::create($order_detail_params);

            $messageResult = $this->web_information->information->notice_advise ?? __('Booking successfull!');

            if (isset($this->web_information->information->email)) {
                $email = $this->web_information->information->email;
                Mail::send(
                    'frontend.emails.booking',
                    [
                        'order' => $order,
                        'order_detail' => $order_detail
                    ],
                    function ($message) use ($email) {
                        $message->to($email);
                        $message->subject(__('You received a new appointment from the system'));
                    }
                );
            }
            DB::commit();
            return $this->sendResponse($order, $messageResult);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }

    // Cart
    public function cart()
    {
        if(isset($_REQUEST['vnp_TransactionStatus'])){

            if($_REQUEST['vnp_TransactionStatus'] == '00'){

                $cart = session()->get('cart', []);

                if (empty($cart)) {
                    return redirect()->back()->with('errorMessage', __('Cart is empty!'));
                }
                $user = session()->get('user');
                $order_params['name'] = $user['user']['name'];
                $order_params['email'] = $user['user']['email'];
                $order_params['phone'] = $user['user']['phone'];
                $order_params['address'] = $user['user']['address'];
                $order_params['customer_note'] = $user['user']['customer_note'];
                $order_params['is_type'] = Consts::ORDER_TYPE['product'];
                $order = Order::create($order_params);

                $data = [];
                foreach ($cart as $id => $details) {
                    // Check and store order_detail
                    $order_detail_params['order_id'] = $order->id;
                    $order_detail_params['item_id'] = $id;
                    $order_detail_params['quantity'] = $details['quantity'] ?? 1;
                    $order_detail_params['price'] = $details['price'] ?? null;
                    array_push($data, $order_detail_params);

                    $product = CmsProduct::findOrFail($id);
                    $quantity = $details['quantity'];
                    $soluongconlai = $product->soluongconlai - $quantity;
                    $product->soluongconlai = $soluongconlai;
                    $product->save();
                }
                OrderDetail::insert($data);
                DB::commit();
                session()->forget('cart');

                echo"<script>alert('Đặt hàng thành công, chúng tôi sẽ gửi hàng đến bạn trong thời gian sớm nhất!');window.location.href='/gio-hang';</script>";
            }

        }
        return $this->responseView('frontend.pages.cart.index');
    }

    public function addToCart(Request $request)
    {
        $quantity = request('quantity') ?? '1';

        $id = request('id') ?? '';

        $product = CmsProduct::findOrFail($id);

        $soluongconlai = $product->soluongconlai ?? '0';

        $soluongban = $product->soluongconlai;

        if($quantity > $soluongban){
            //số lượng không đủ
            echo 1;

        }else{

            $price = $product->giakm ?? $product->gia;
            
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
            } else {
                $cart[$id] = [
                    "title" => $product->title,
                    "quantity" => $quantity,
                    "price" => $price,
                    "image" => $product->image,
                    "image_thumb" => $product->image_thumb
                ];
            }
            session()->put('cart', $cart);

            echo 2;

        }

        

        // $id = $request->get('id')  ?? null;
        // $quantity = $request->get('quantity')  ?? 1;

        // $product = CmsProduct::findOrFail($id);

        // if($product->giakm != ''){
        //     $price = $product->giakm;
        // }else{
        //     $price = $product->gia;
        // }

        // $cart = session()->get('cart', []);

        // if (isset($cart[$id])) {
        //     $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
        // } else {
        //     $cart[$id] = [
        //         "title" => $product->title,
        //         "quantity" => $quantity,
        //         "price" => $price,
        //         "image" => $product->image,
        //         "image_thumb" => $product->image_thumb
        //     ];
        // }
        // session()->put('cart', $cart);
        // session()->flash('successMessage', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        $quantity = request('quantity') ?? '1';

        $id = request('id') ?? '';

        if ($id && $quantity) {
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $quantity;
            session()->put('cart', $cart);
            session()->flash('successMessage', 'Cart updated successfully!');
        }
    }

    public function removeCart(Request $request)
    {   
        $id = request('id') ?? '';

        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('successMessage', 'Product removed successfully!');
        }
    }

    public function storeOrderProduct(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return redirect()->back()->with('errorMessage', __('Cart is empty!'));
            }

            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);
            // Check and store order
            $order_params = $request->only([
                'name',
                'email',
                'phone',
                'address',
                'customer_note'
            ]);
            $order_params['is_type'] = Consts::ORDER_TYPE['product'];
            $order = Order::create($order_params);

            $data = [];
            foreach ($cart as $id => $details) {
                // Check and store order_detail
                $order_detail_params['order_id'] = $order->id;
                $order_detail_params['item_id'] = $id;
                $order_detail_params['quantity'] = $details['quantity'] ?? 1;
                $order_detail_params['price'] = $details['price'] ?? null;
                array_push($data, $order_detail_params);

                $product = CmsProduct::findOrFail($id);
                $quantity = $details['quantity'];
                $soluongconlai = $product->soluongconlai - $quantity;
                $product->soluongconlai = $soluongconlai;
                $product->save();
            }
            OrderDetail::insert($data);

            $messageResult = $this->web_information->information->notice_order_cart ?? __('Submit order successfull!');

            // if (isset($this->web_information->information->email)) {
            //     $email = $this->web_information->information->email;
            //     Mail::send(
            //         'frontend.emails.order',
            //         [
            //             'order' => $order
            //         ],
            //         function ($message) use ($email) {
            //             $message->to($email);
            //             $message->subject(__('You received a new order from the system'));
            //         }
            //     );
            // }
            DB::commit();
            session()->forget('cart');
            echo"<script>alert('Đặt hàng thành công');window.location.href='/';</script>";
            // return redirect()->back()->with('successMessage', $messageResult);
        } catch (Exception $ex) {
            DB::rollBack();
            throw $ex;
        }
    }
}
