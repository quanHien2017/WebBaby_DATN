<?php

namespace App\Http\Controllers\Admin;

use App\Consts;
use App\Http\Services\ContentService;
use App\Models\CmsProduct;
use App\Models\CmsPostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsProductController extends Controller
{
    public function __construct()
    {
        $this->routeDefault  = 'cms_products';
        $this->viewPart = 'admin.pages.cms_products';
        $this->responseData['module_name'] = __('Product Management');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if(ContentService::checkRole($this->routeDefault,'index') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
        $params = $request->all();
        //$params['is_type'] = Consts::POST_TYPE['product'];
        // Get list post with filter params
        //$rows = ContentService::getCmsPost($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
		$rows = ContentService::getProducts($params)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        $paramTaxonomys['status'] = Consts::TAXONOMY_STATUS['active'];
        $paramTaxonomys['taxonomy'] = 'san-pham';
        $this->responseData['parents'] = ContentService::getCmsTaxonomy($paramTaxonomys)->get();
		$postStatus = array(1 => 'Đang hoạt động', 0 => 'Không hoạt động');
		$this->responseData['postStatus'] =  $postStatus ;
        $this->responseData['rows'] =  $rows;
        $this->responseData['params'] = $params;

        return $this->responseView($this->viewPart . '.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(ContentService::checkRole($this->routeDefault,'create') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
        $paramTaxonomys['status'] = Consts::TAXONOMY_STATUS['active'];
        $paramTaxonomys['taxonomy'] = 'san-pham';
        $this->responseData['parents'] = ContentService::getCmsTaxonomy($paramTaxonomys)->get();

        return $this->responseView($this->viewPart . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(ContentService::checkRole($this->routeDefault,'create') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
        $request->validate([
            'title' => 'required|max:255',
            'taxonomy_id' => 'required|max:255',
        ]);

        $params = $request->all();

        $hienthi = isset($params['hienthi']) ? implode(';',$params['hienthi']) : '';
        $params['hienthi'] = ';'.$hienthi.';';

        $cmsProduct                      = new CmsProduct();
        $cmsProduct->title               = $params['title'];
        $cmsProduct->mota                = $params['mota'];
        $cmsProduct->alias               = $params['alias'];
        $cmsProduct->taxonomy_id         = $params['taxonomy_id'];
        $cmsProduct->hienthi             = $params['hienthi'];
        $cmsProduct->image               = $params['image'];
        $cmsProduct->gia                 = $params['gia'];
        $cmsProduct->giakm               = $params['giakm'];
        $cmsProduct->soluong             = $params['soluong'];
        $cmsProduct->soluongconlai       = $params['soluong'];
        $cmsProduct->tinhtrang           = $params['tinhtrang'];
        $cmsProduct->status              = $params['status'];
        $cmsProduct->chitiet             = $params['chitiet'];
        $cmsProduct->admin_created_id    = Auth::guard('admin')->user()->id;
        $cmsProduct->admin_updated_id    = Auth::guard('admin')->user()->id;

        $cmsProduct->save();

		if(isset($params['imagelist'])){

          $imagelist = $params['imagelist'];

          foreach($imagelist as $k => $image){

              $CmsPostImage                = new CmsPostImage();

              $CmsPostImage->post_id       = $cmsProduct->id;

              $CmsPostImage->link_image    = $image;

              $CmsPostImage->status        = 'active';

              $CmsPostImage->save();

          }
        }

        // CmsProduct::create($params);

        return redirect()->route($this->routeDefault . '.index')->with('successMessage', __('Add new successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CmsProduct  $cmsProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CmsProduct $cmsProduct)
    {
        // Do not use this function
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CmsProduct  $cmsProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsProduct $cmsProduct)
    {
		if(ContentService::checkRole($this->routeDefault,'update') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
        $paramTaxonomys['status'] = Consts::TAXONOMY_STATUS['active'];
        $paramTaxonomys['taxonomy'] = 'san-pham';
        $this->responseData['parents'] = ContentService::getCmsTaxonomy($paramTaxonomys)->get();
        $images = CmsPostImage::where('post_id',$cmsProduct->id)->get();
        $this->responseData['images'] = $images;
        $this->responseData['detail'] = $cmsProduct;

        return $this->responseView($this->viewPart . '.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CmsProduct  $cmsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CmsProduct $cmsProduct)
    {
		if(ContentService::checkRole($this->routeDefault,'update') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
        $request->validate([
            'title' => 'required|max:255',
            'taxonomy_id' => 'required|max:255',
        ]);

        $params = $request->all();
		
		$hienthi = isset($params['hienthi']) ? implode(';',$params['hienthi']) : '';
		
		$params['hienthi'] = ';'.$hienthi.';';
        
        $cmsProduct->title               = $params['title'];
        $cmsProduct->mota                = $params['mota'];
        $cmsProduct->alias               = $params['alias'];
        $cmsProduct->taxonomy_id         = $params['taxonomy_id'];
        $cmsProduct->hienthi             = $params['hienthi'];
        $cmsProduct->image               = $params['image'];
        $cmsProduct->gia                 = $params['gia'];
        $cmsProduct->giakm               = $params['giakm'];
        $cmsProduct->soluong             = $params['soluong'];
        $cmsProduct->soluongconlai            = $params['soluong'];
        $cmsProduct->tinhtrang           = $params['tinhtrang'];
        $cmsProduct->status              = $params['status'];
        $cmsProduct->chitiet             = $params['chitiet'];
        $cmsProduct->admin_updated_id    = Auth::guard('admin')->user()->id;

        $cmsProduct->save();

        CmsPostImage::where('post_id', '=', $cmsProduct->id)->delete();

        if(isset($params['imagelist'])){

          $imagelist = $params['imagelist'];

          foreach($imagelist as $k => $image){

              $CmsPostImage                = new CmsPostImage();

              $CmsPostImage->post_id       = $cmsProduct->id;

              $CmsPostImage->link_image    = $image;

              $CmsPostImage->status        = 'active';

              $CmsPostImage->save();

          }
        }

        return redirect()->back()->with('successMessage', __('Successfully updated!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsProduct  $cmsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsProduct $cmsProduct)
    {	
		if(ContentService::checkRole($this->routeDefault,'delete') == 0){
			$this->responseData['module_name'] = __('Bạn không có quyền truy cập chức năng này');
			return $this->responseView($this->viewPart . '.404');
		}
		
		$cmsProduct->delete();
		return redirect()->back()->with('successMessage', __('Delete record successfully!'));
		/*
        // check is type product
        if ($cmsProduct->is_type != Consts::POST_TYPE['product']) {
            return redirect()->back()->with('errorMessage', __('Permission denied!'));
        }

        $cmsProduct->status = Consts::STATUS_DELETE;
        $cmsProduct->save();

        return redirect()->route($this->routeDefault . '.index')->with('successMessage', __('Delete record successfully!'));
		*/
    }
}
