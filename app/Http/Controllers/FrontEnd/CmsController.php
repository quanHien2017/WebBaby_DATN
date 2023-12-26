<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Http\Services\ContentService;
use App\Models\CmsPost;
use App\Models\Profile;
use App\Models\CmsPostDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CmsController extends Controller
{
    public function convert(Request $request)
    {
        // code...
    }
    public function countdownload(Request $request)
    {
        $id = request('id') ?? '';

        $id_document = request('id_document') ?? '';

        $count = CmsPost::where('id',$id)->first();

        $link_document = CmsPostDocument::where('id',$id_document)->first();

        $link = $link_document->link_file;

        if($count){

            $click_new = $count->number_download + 1;
            $count->number_download = $click_new;
            $count->save();
            echo $link;
        }
    }

    public function search_document(Request $request){

        $keyword = request('keyword') ?? '';
        $orderby = request('orderby') ?? '';
        $taxolist = request('taxolist') ?? '';

        $params['keyword'] = $keyword;

        $params['order_by'] = $orderby;

        $params['taxonomy_id'] = $taxolist;

        $params['different_news_position'] = '1';

        $params['status'] = 'active';

        $params['is_type'] = Consts::POST_TYPE['post'];

        $document = ContentService::getCmsPost($params)->get();

        if(count($document) > 0){

            foreach($document as $item) { ?>
            
                <div class="list-2__item">
                    <div class="doc-2">
                        <h3 class="doc-2__title">
                            <a href="/chi-tiet/<?= $item->url_part ?>.html" title="{{ $item->title }}"><?= $item->title ?></a>
                        </h3>
                        <div class="media">
                            <a class="doc-2__frame" href="/chi-tiet/<?= $item->url_part ?>.html" title="<?= $item->title ?>">
                            <img src="<?= $item->image ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="{{ $item->title ?>" /></a>
                            <div class="media-body">
                                <div class="doc-2__desc"><?= $item->title ?></div>
                                <div class="doc-2__footer">
                                    <div class="doc-2__info">
                                        <!-- <span class="d-inline-block mr-3"><i class="fa fa-file-pdf-o mr-1"></i><span>70tr</span></span><span
                                            class="d-inline-block mr-3"><i class="fa fa-share-square-o mr-1"></i><span>ntt</span></span> -->
                                        <span
                                        class="d-inline-block mr-3"><i class="fa fa-calendar mr-1"></i><span><?= date('d/m/Y', strtotime($item->created_at)) ?></span></span>
                                        <span
                                        class="d-inline-block mr-3"><i class="fa fa-eye mr-1"></i><span><?= $item->number_view ?></span></span>
                                        <span
                                        class="d-inline-block"><i class="fa fa-cloud-download mr-1"></i><span><?= $item->number_download ?></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

         <?php } }else{ ?>

            <div class="list-2__item">
                <div class="doc-2">
                    <h3 class="doc-2__title">
                        <a href="#">Chưa tìm thấy tài liệu</a>
                    </h3>
                </div>
            </div>

        <?php }
        
    }

    public function viewMore()
    {

        $txt_post = session('post_id');
        
        //$articles = request('articles') ?? '';
        $trang = request('trang') ?? '';
        $banghibandau = request('row') ?? '';
        $limit = request('limit') ?? '';

        $locale = 'vi';

        $paramPost['status']='active';
        $paramPost['limit']=$limit;
        $paramPost['is_type'] = Consts::POST_TYPE['post'];
        $paramPost['order_by']= array( 'news_position'=>'desc', 'iorder' => 'asc', 'aproved_date'=>'desc' );
        
        $article_id = $txt_post;

        $dsTinTuc = ContentService::getCmsPostLoading($paramPost,trim($txt_post,','))->get();
        $data_post = '';
        foreach($dsTinTuc as $item){
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay alias bai viet
            $alias_detail = $item->url_part ? $item->url_part : Str::slug($title);
            
            $url_link = route('frontend.cms.post', ['alias_detail' => $alias_detail]) . '.html';
            $article_id.=$item->id.',';
            $author = $item->author !='' ? $item->author : $item->fullname;
            $hienthingay = ContentService::postTime($item->aproved_date);
            $avatar = $item->avatar !='' ? $item->avatar : '/images/noiavatar.png';
            $data_post .=' 
            <article class="story story--flex story--round " id="article'.$item->id.'">
                <div class="story__meta">
                    <div class="story__avatar">
                        <img src="'.$avatar .'" alt="'.$author.'" class="img-fluid rounded-circle">
                    </div>
                    <div class="story__info">
                        <h3 class="story__author">'.$author.'</h3>
                        <div class="story__time"><time datetime="'.$item->updated_at.'" class="time-ago">'.$hienthingay.'</time></div>
                    </div>
                </div>
                <div class="story__header">
                    <h3 class="story__title">'.$title.'</h3>
                    <div class="story__summary">
                        '.$brief.'
                        <a href="'.$url_link.'" class="view-more">Xem thêm</a>
                        <div class="post-content d-none"></div>
                    </div>
                </div>
                <div class="story__images lightgallery">
                    
                    <div data-src="'.$image.'" class="item">
                        <img src="'.$image.'" alt="'.$title.'" class="img-fluid" title="'.$title.'">
                    </div>
                        
                </div>
                <footer class="story__footer">
                    <div class="story__react share">
                        <div class="fb-like fb_iframe_widget" data-href="'.$url_link.'" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=625475154576703&amp;container_width=0&amp;href=https%3A%2F%2Fnguoimuanha.vn%2Fgia-bds-se-tiep-tuc-tang-60883.html&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;size=small&amp;width="><span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe name="f1f94d842c23d74" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v4.0/plugins/like.php?action=like&amp;app_id=625475154576703&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df2eda2a027ba0d8%26domain%3Dnguoimuanha.vn%26is_canvas%3Dfalse%26origin%3Dhttps%253A%252F%252Fnguoimuanha.vn%252Ff102ff38a076bb8%26relation%3Dparent.parent&amp;container_width=0&amp;href='.$url_link.'&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;size=small&amp;width=" style="border: none; visibility: visible; width: 150px; height: 28px;" class=""></iframe></span></div>
                    </div>
                    <a href="'.$url_link.'#detail__footer" title="Bình luận" class="story__react comment" data-article="'.$item->id.'"><i class="fal fa-comment"></i><span></span></a>
                    <a href="javascript:void(0)" title="Chia sẻ lên facebook" class="story__react love" data-article="'.$item->id.'"><i class="fal fa-share"></i></a>
                </footer>

                <div class="story__comment" data-count-comment="0" >
                    <div class="comment-listing" id="post'.$item->id.'" data-url="'.$url_link.'"></div>
                    <div class="input-wrap">
                        <div class="avatar avatarUser"></div>
                        <div class="content">
                            <div contenteditable="true" draggable="true" class="form-control bg-light editor inputComment auto-size" spellcheck="false" data-id="post'.$item->id.'"></div>
                            <span class="fal fa-image commentUploadImage">
                                <input type="file" accept="image/png, image/jpeg, img/gif" onchange="Images.UploadImage(this,$(this).parent().prev())">
                            </span>
                            <span class="btn-send pointer" title="Gửi bình luận"><i class="fas fa-paper-plane"></i></span>
                        </div>
                    </div>
                </div>

                <div class="story__extend">
                    <div class="dropdown">
                        <a class="" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu dropdown-menu-right moreActionArticle" aria-labelledby="dropdownMenuLink1" data-user="377" data-article="'.$item->id.'">
                            <a class="dropdown-item aNotiArticle" href="javascript:void(0)" onclick="FollowingArticles.Follow('.$item->id.')"><i class="fal fa-bell mr-2"></i>Thông báo khi có bình luận</a>
                            <a class="dropdown-item aFollow" href="javascript:void(0)" onclick="Following.Follow(377)"> <i class="fal fa-user-plus mr-2"></i>Theo dõi tác giả</a>
                            
                            <a class="dropdown-item getLinkArticle" href="javascript:void(0)" data-toggle="modal" data-url="'.$url_link.'"><i class="fal fa-link mr-2"></i>Lấy link bài viết</a>

                            <a class="dropdown-item text-danger reportArticle" href="javascript:void(0)" data-toggle="modal" data-target="#modalReport" data-article="'.$item->id.'"><i class="fal fa-exclamation-square mr-2"></i>Báo cáo bài viết</a>
                        </div>
                    </div>
                </div>
            </article>';
        }
        session(['post_id'=>$article_id]);
        return $data_post;
        
    }

    public function postCategoryProfile($alias = null, Request $request)
    {
        
        if ($alias != "" ) {
            $params['url_part'] = str_replace('.html','',$alias);
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['profile'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            $paramslist['status'] = Consts::TAXONOMY_STATUS['active'];
            $taxonomylist = ContentService::getCmsTaxonomy($paramslist)->get();
            $this->responseData['taxonomylist'] = $taxonomylist;

            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $this->responseData['posts'] =  ContentService::getCmsProfile($paramPost)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);

                return $this->responseView('frontend.pages.post.category_profile');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function postCategoryTailieu($alias = null, Request $request)
    {
        //$id = $request->get('id')  ?? null;
        
        if ($alias != "" ) {
            $params['url_part'] = str_replace('.html','',$alias);
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['tai-lieu'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            $paramslist['status'] = Consts::TAXONOMY_STATUS['active'];
            $taxonomylist = ContentService::getCmsTaxonomy($paramslist)->get();
            $this->responseData['taxonomylist'] = $taxonomylist;

            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                    $paramPostNoibat['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                    $paramPostNoibat['taxonomy_id'] = $id;
                }
                $paramPost['different_news_position'] = '1';
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

                $paramPostNoibat['news_position'] = '1';
                $paramPostNoibat['status'] = Consts::POST_STATUS['active'];
                $paramPostNoibat['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['postsnoibat'] = ContentService::getCmsPost($paramPostNoibat)->get();
                return $this->responseView('frontend.pages.post.category_document');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.post.default');
    }
    
    public function postCategoryMedia($alias = null, Request $request)
    {
        //$id = $request->get('id')  ?? null;
        
        if ($alias != "" ) {
            $params['url_part'] = str_replace('.html','',$alias);
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['media'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            $paramslist['status'] = Consts::TAXONOMY_STATUS['active'];
            $taxonomylist = ContentService::getCmsTaxonomy($paramslist)->get();
            $this->responseData['taxonomylist'] = $taxonomylist;

            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.post.category_media');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.post.default');
    }
    public function postCategory($alias = null, Request $request)
    {
        //$id = $request->get('id')  ?? null;

        $keyword = $request->get('keyword')  ?? null;
        $paramPost['keyword'] = $keyword;
        $this->responseData['keyword'] = $keyword;
        
        if ($alias != "" ) {

            $params['url_part'] = str_replace('.html','',$alias);

            $this->responseData['alias'] = str_replace('.html','',$alias);

            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['tin-tuc'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            $paramslist['status'] = Consts::TAXONOMY_STATUS['active'];
            $taxonomylist = ContentService::getCmsTaxonomy($paramslist)->get();
            $this->responseData['taxonomylist'] = $taxonomylist;

            $paramPost_sp['status'] = 1;
            $this->responseData['posts_sp'] = ContentService::getProducts($paramPost_sp)->paginate(Consts::POST_PAGINATE_LIMIT);

            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function dichvuCategory($alias = null, Request $request)
    {
        if ($alias != "" ) {

            $params['url_part'] = str_replace('.html','',$alias);
            $this->responseData['alias'] = str_replace('.html','',$alias);
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = 'dich-vu';
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['parent_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['taxonomy'] = 'dich-vu';
                $this->responseData['posts'] = ContentService::getCmsTaxonomy($paramPost)->get();

                return $this->responseView('frontend.pages.post.category_dichvu');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function dichvuDetail($alias_detail = null, Request $request)
    {
        
        if ($alias_detail != '') {

            $params['url_part'] = str_replace('.html','',$alias_detail);
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = 'dich-vu';
            $detail = ContentService::getCmsTaxonomy($params)->first();
            
            if ($detail) {

                $detail->number_view = $detail->number_view + 1;
                
                $detail->save();

                $this->responseData['detail'] = $detail;

                $paramstaxo['id'] = $detail->parent_id;
                $paramstaxo['status'] = Consts::TAXONOMY_STATUS['active'];
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramstaxo)->first();

                $params_relative['different_id'] = $detail->id;
                $params_relative['parent_id'] = $detail->parent_id;
                $params_relative['status'] = Consts::TAXONOMY_STATUS['active'];
                $params_relative['taxonomy'] = 'dich-vu';
                $this->responseData['posts'] = ContentService::getCmsTaxonomy($params_relative)->limit(Consts::DOCTOR_OTHER_LIMIT)->get();

                $params_dv['status'] = Consts::TAXONOMY_STATUS['active'];
                $params_dv['taxonomy'] = 'dich-vu';
                $this->responseData['dichvu'] = ContentService::getCmsTaxonomy($params_dv)->get();
                
                return $this->responseView('frontend.pages.post.detail_dichvu');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function thuvienCategory($alias = null, Request $request)
    {
        //$id = $request->get('id')  ?? null;

        $keyword = $request->get('keyword')  ?? null;
        $paramPost['keyword'] = $keyword;
        
        if ($alias != "" ) {

            $params['url_part'] = str_replace('.html','',$alias);
            $this->responseData['alias'] = str_replace('.html','',$alias);

            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = 'thu-vien';
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $this->responseData['posts'] = ContentService::getCmsMedia($paramPost)->paginate(Consts::POST_MEDIA_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.post.category_thuvien');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function addnew(Request $request)
    {
        $params = $request->all();

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:7000',
        ]);

        $targetDir = "member/hinhanh".Auth::guard('web')->user()->id."/";
        //$allowTypes = array('jpg','png','jpeg','gif');
        if(!file_exists($targetDir)){
            if(mkdir($targetDir)){
                //echo "Tạo thư mục thành công.";
            }
        }
        
        if($_FILES['image']['name']){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $imageName = time().'.'.$request->image->extension();  
    
            $request->image->move(public_path($targetDir), $imageName);
            
            $path_image = $targetDir.$imageName;
        }else{
            $path_image = null;
        }

        $tb_cms_posts = new CmsPost();
        $tb_cms_posts->is_type = 'post';
        $tb_cms_posts->title = $params['title'];
        $tb_cms_posts->brief = $params['title'];
        $tb_cms_posts->content = $params['content'];
        $tb_cms_posts->image = $path_image;
        $tb_cms_posts->status = 'waiting';
        $tb_cms_posts->user_id = Auth::guard('web')->user()->id;
        $tb_cms_posts->save();
        
        //return redirect('/')->with('successMessage', 'Thêm mới tin thành công! Tin của bạn đang được chờ duyệt');

        $this->responseData['successMessage']  =  __('Thêm mới tin thành công! Tin của bạn đang được chờ duyệt.');
        return $this->responseView('frontend.pages.home.index');

    }

    public function search($alias = null, Request $request)
    {
        $keyword = $request->get('keyword')  ?? null;

        $paramPost['status'] = Consts::POST_STATUS['active'];
        $paramPost['is_type'] = Consts::POST_TYPE['post'];
        $paramPost['keyword'] = $keyword;
        $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        return $this->responseView('frontend.pages.post.category');
    }

    public function cmstag($alias = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        //echo 'AAAAAAAA'.$id;die;
        if ($id > 0) {
            //echo 'AAAAAAAA'.$id;die;
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['post_tag'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $id;
                }
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPostTag($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.post.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['post'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.post.default');
    }

    public function post($alias_detail = null, Request $request)
    {
        if ($alias_detail != '') {

            $params['url_part'] = str_replace('.html','',$alias_detail);
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['post'];
            $params['aproved_date'] = date('Y-m-d H:i:s');
            $detail = ContentService::getCmsPost($params)->first();
            
            if ($detail) {

                $id = $detail->id;
                
                $detail->number_view = $detail->number_view + 1;
                
                $detail->save();

                $this->responseData['detail'] = $detail;

				$id = $detail->id;
				$params_relative['id'] = $id;
				$params_relative['taxonomy_id'] = $detail->taxonomy_id;
				$params_relative['status'] = Consts::POST_STATUS['active'];
				$params_relative['is_type'] = Consts::POST_TYPE['post'];
                $this->responseData['posts'] = ContentService::getCmsPostRelative($params_relative)->limit(Consts::DOCTOR_OTHER_LIMIT)->get();

                $paramstaxo['id'] = $detail->taxonomy_id;
                $paramstaxo['status'] = Consts::TAXONOMY_STATUS['active'];
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramstaxo)->first();
                
                $paramPost_sp['status'] = 1;
                $this->responseData['posts_sp'] = ContentService::getProducts($paramPost_sp)->paginate(Consts::POST_PAGINATE_LIMIT);

                $this->responseData['comments'] = ContentService::getComment(['post_id'=>$id,'status'=>0])->get();
                
                return $this->responseView('frontend.pages.post.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function postMedia($alias_detail = null, Request $request)
    {
        if ($alias_detail != '') {

            $params['url_part'] = str_replace('.html','',$alias_detail);
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['post'];
            $params['aproved_date'] = date('Y-m-d H:i:s');
            $detail = ContentService::getCmsMedia($params)->first();

            if ($detail) {

                $id = $detail->id;
                
                $detail->number_view = $detail->number_view + 1;
                
                $detail->save();

                $this->responseData['detail'] = $detail;

                $id = $detail->id;
                $params_relative['id'] = $id;
                $params_relative['taxonomy_id'] = $detail->taxonomy_id;
                $params_relative['status'] = Consts::POST_STATUS['active'];
                $params_relative['is_type'] = Consts::POST_TYPE['post'];

                $this->responseData['posts'] = ContentService::getCmsMediaRelative($params_relative)->get();
                
                $paramstaxo['id'] = $detail->taxonomy_id;
                $paramstaxo['status'] = Consts::TAXONOMY_STATUS['active'];
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramstaxo)->first();

                //list ảnh
                $params_image['media_id'] = $id;
                $params_image['status'] = Consts::POST_STATUS['active'];
                $this->responseData['list_image'] = ContentService::getCmsMediaImage($params_image)->get();

                //list video
                $params_document['media_id'] = $id;
                $params_document['status'] = Consts::POST_STATUS['active'];
                $this->responseData['list_video'] = ContentService::getCmsMediaVideo($params_document)->get();
                
                return $this->responseView('frontend.pages.post.detail_media');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function postDoctor($alias_detail = null, Request $request)
    {
        if ($alias_detail != '') {

            $params['url_part'] = str_replace('.html','',$alias_detail);
            $params['status'] = Consts::POST_STATUS['active'];
            $params['aproved_date'] = date('Y-m-d H:i:s');
            $detail = ContentService::getCmsProfile($params)->first();

            if ($detail) {

                $this->responseData['detail'] = $detail;

                $id = $detail->id;
                $params_relative['id'] = $id;
                $params_relative['taxonomy'] = $detail->taxonomy;
                $params_relative['status'] = Consts::POST_STATUS['active'];
                $this->responseData['posts'] = ContentService::getCmsProfileRelative($params_relative)->limit(Consts::DEFAULT_RELATIVE_LIMIT)->get();
                
                $paramstaxo['id'] = $detail->taxonomy;
                $paramstaxo['status'] = Consts::TAXONOMY_STATUS['active'];
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramstaxo)->first();
                
                return $this->responseView('frontend.pages.post.detail_doctor');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function postIntroduction($alias = null, Request $request)
    {
		//dd($alias);
        
        if ($alias !="") {
            $params['url_part'] = str_replace('.html','',$alias);
            //$params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['gioi-thieu'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
			//dd($taxonomy);
			if ($taxonomy) {
				$id=$taxonomy->id;
				$paramPost['taxonomy_id'] = $id;
				$paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['intro'];
				//dd($paramPost);
				$detail = ContentService::getCmsPost($paramPost)->first();
				//dd($detail);
                $this->responseData['detail'] = $detail;
                
                return $this->responseView('frontend.pages.post.intro');
				
			}
			
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function serviceCategory($alias = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['service_category'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['service'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.service.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['service'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.service.default');
    }

    public function service($alias_category = null, $alias_detail = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['service'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.service.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function productCategory($alias = null, Request $request)
    {

		if ($alias != "" ) {
            $params['url_part'] = str_replace('.html','',$alias);
			
			$params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::CATEGORY['san-pham'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $id=$taxonomy->id;
                $this->responseData['taxonomy'] = $taxonomy;
				
				$paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = 1;
                $this->responseData['posts'] = ContentService::getProducts($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
				
				return $this->responseView('frontend.pages.product.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
		}else {
            $paramPost['status'] = 1;
            $this->responseData['posts'] = ContentService::getProducts($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }
		
        return $this->responseView('frontend.pages.product.category');
    }
	
	public function productSearch(Request $request)
    {
		//echo $alias;die;
		$params = $request->all();
		$keyword = $params['search'] ?? '';
		$this->responseData['posts'] = array();

        $paramPost_noibat['status'] = 1;
        $this->responseData['posts_nb'] = ContentService::getProducts($paramPost_noibat)->paginate(Consts::POST_PAGINATE_LIMIT);
		
		if($keyword!=""){
			$paramPost['status'] = 1;
			$paramPost['keyword'] = $keyword;
			$this->responseData['posts'] = ContentService::getProducts($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
			
			return $this->responseView('frontend.pages.product.search');
			
		}else{

            $paramPost['status'] = 1;
            $this->responseData['posts'] = ContentService::getProducts($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
            return $this->responseView('frontend.pages.product.search');
        }

		
        
    }
	

    public function product($alias_detail = null, Request $request)
    {
		if($alias_detail != ""){
			
			$params['alias'] = str_replace('.html','',$alias_detail);
			$params['status'] = 1;
			
			$detail = ContentService::getProducts($params)->first();
			
			if ($detail) {
				
				$this->responseData['detail'] = $detail;
				
				$params_relative['different_id'] = $detail->id;
				$params_relative['taxonomy_id'] = $detail->taxonomy_id;
                $this->responseData['posts'] = ContentService::getProducts($params_relative)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                $paramstaxo['status'] = Consts::TAXONOMY_STATUS['active'];
                $paramstaxo['taxonomy'] = Consts::CATEGORY['san-pham'];
                $paramstaxo['id'] = $detail->taxonomy_id;
                $this->responseData['taxonomy'] = ContentService::getCmsTaxonomy($paramstaxo)->first();

                $params_image['post_id'] = $detail->id;
                $params_image['order_by'] = ['created_at'=>'ASC'];
                $params_image['status'] = Consts::POST_STATUS['active'];
                $this->responseData['list_image'] = ContentService::getCmsPostImage($params_image)->get();

				return $this->responseView('frontend.pages.product.detail');
			}
			
		}
		
		return redirect()->back()->with('errorMessage', __('not_found'));
		
    }

    public function doctorList(Request $request)
    {
        $paramPost['status'] = Consts::POST_STATUS['active'];
        $paramPost['is_type'] = Consts::POST_TYPE['doctor'];
        $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        return $this->responseView('frontend.pages.doctor.default');
    }

    public function doctor($alias = null, $id = null, Request $request)
    {
        $id = $request->get('id')  ?? $id;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['doctor'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DOCTOR_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.doctor.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }

    public function galleryCategory($alias = null, $id = null, Request $request)
    {

        $paramPost['status'] = Consts::POST_STATUS['active'];
        $paramPost['is_type'] = Consts::POST_TYPE['gallery'];
        $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);

        return $this->responseView('pages.gallery.default');
    }

    public function gallery($alias = null, $id = null, Request $request)
    {
        $id = $request->get('id')  ?? $id;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['gallery'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                return $this->responseView('pages.gallery.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }


    public function department($alias = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['department'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['detail'] = $taxonomy;

                $params['id'] = null;
                $params['different_id'] = $taxonomy->id;
                $this->responseData['posts'] = ContentService::getCmsTaxonomy($params)->limit(Consts::DEPARTMENT_OTHER_LIMIT)->get();


                return $this->responseView('frontend.pages.department.detail');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::TAXONOMY_STATUS['active'];
            $paramPost['taxonomy'] = Consts::TAXONOMY['department'];
            $this->responseData['posts'] = ContentService::getCmsTaxonomy($paramPost)->paginate(Consts::POST_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.department.default');
    }

    public function resourceCategory($alias = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $params['taxonomy'] = Consts::TAXONOMY['resource_category'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();
            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                $paramPost['taxonomy_id'] = $id;
                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = Consts::POST_TYPE['resource'];
                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
                return $this->responseView('frontend.pages.resource.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        } else {
            $paramPost['status'] = Consts::POST_STATUS['active'];
            $paramPost['is_type'] = Consts::POST_TYPE['resource'];
            $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::DEFAULT_PAGINATE_LIMIT);
        }

        return $this->responseView('frontend.pages.resource.default');
    }

    public function resource($alias_category = null, $alias_detail = null, Request $request)
    {
        $id = $request->get('id')  ?? null;
        if ($id > 0) {
            $params['id'] = $id;
            $params['status'] = Consts::POST_STATUS['active'];
            $params['is_type'] = Consts::POST_TYPE['resource'];
            $detail = ContentService::getCmsPost($params)->first();
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();

                $this->responseData['detail'] = $detail;

                $params['id'] = null;
                $params['different_id'] = $detail->id;
                $params['order_by'] = 'id';
                $params['taxonomy_id'] = $detail->taxonomy_id;
                $this->responseData['posts'] = ContentService::getCmsPost($params)->limit(Consts::DEFAULT_OTHER_LIMIT)->get();

                return $this->responseView('frontend.pages.resource.detail');
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }
}
