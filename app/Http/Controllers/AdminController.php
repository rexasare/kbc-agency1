<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Auth;

use Image;

use App\Banner;

use App\Category;

use App\Sub_Category;

use App\Ad;

use App\Ad_image;

use App\Ad_condition;

use App\Featured_Ad;

use App\Featured_image;

use App\Featured_conditon;

class AdminController extends Controller
{
  //  public function __construct(){
  //     $this->middleware('admin');
  //  }
  public function getIndex(){
    $banners = Banner::all();
   return view('admin.index')->with('banners', $banners);
}

       public function getBanner(){
       return view('admin.banner');
    }

    public function postBanner(Request $request){
      $this->validate($request, [
        'ban_title'    => 'max:255',
        'ban_desc'     => 'max:255',
        'banner'       => 'required|max:1000|mimes:jpeg,png'
     ]);

      $banner = new Banner;

      $banner->img_title = $request->ban_title;
      $banner->img_desc = $request->ban_desc;

      if($request->hasFile('banner')){
         $image = $request->file('banner');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/banners/' .$filename);
         Image::make($image)->save($location);

         $banner->img_file = $filename;
      }

      $banner->save();

      notify()->flash('Added Successfully!', 'success', [
               'timer' => 3000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

            return redirect()->route('banner');


    }

    public function viewBanners(){
      $banners = Banner::paginate(6);
       return view('admin/view-banners')->with('banners', $banners);
    }

    public function showBanner($id){
      $banner = Banner::find($id);
       return view('admin/show-banner')->with('banner', $banner);
    }

    public function updateBanner(Request $request, $id){
      $this->validate($request, [
        'ban_title'    => 'max:255',
        'ban_desc'     => 'max:255',
        'banner'       => 'required|max:1000|mimes:jpeg,png'
     ]);

     $banner = Banner::find($id);

     $banner->img_title = $request->ban_title;
     $banner->img_desc = $request->ban_desc;

     if($request->hasFile('banner')){
        $image = $request->file('banner');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/banners/' .$filename);
        Image::make($image)->save($location);

        $banner->img_file = $filename;
     }

     $banner->save();

     notify()->flash('Updated Successfully!', 'success', [
              'timer' => 1000,
              'text' => 'Have a wonderful shopping experience at Kbc-Agency',
               ]);

           return redirect()->route('banners.view');
    }

    public function deleteBanner($id){
      $banner = Banner::find($id);
      $banner->delete();
      notify()->flash('Deleted Successfully!', 'success', [
               'timer' => 1000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);
        return redirect()->route('banners.view');
    }

  public function getCat(){
     return view('admin.category');
  }

 public function postCat(Request $request){
   $this->validate($request, [
           'cat'      => 'required|max:255',
           'class'    => 'required|max:255',
           'cat_img'  => 'required|max:1000|mimes:jpeg,png',
       ]);

       $category = new Category;

      $category->name = strtoupper($request->cat);
      $category->class = strtolower($request->class);

      if($request->hasFile('cat_img')){
         $image = $request->file('cat_img');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/cat/' .$filename);
         Image::make($image)->save($location);

         $category->img_file = $filename;
      }

      $category->save();

      notify()->flash('Added Successfully!', 'success', [
                 'timer' => 3000,
                 'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                  ]);

              return redirect()->route('cat');

 }

 public function viewCategories(){
    $cats = Category::all();
    return view('admin.view-Cats')->with('cats', $cats);
 }

 public function editCategory($id){
     $cat = Category::find($id);
     return view('admin/edit-cat')->with('cat', $cat);
 }

 public function updateCategory(Request $request, $id){
   $this->validate($request, [
           'cat'      => 'required|max:255',
           'class'    => 'required|max:255',
           'cat_img'  => 'max:1000|mimes:jpeg,png',
       ]);

      $category = Category::find($id);

      $category->name = strtoupper($request->cat);
      $category->class = strtolower($request->class);

      if($request->hasFile('cat_img')){
         $image = $request->file('cat_img');
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/cat/' .$filename);
         Image::make($image)->save($location);

         $category->img_file = $filename;
      }

      $category->save();

      notify()->flash('Updated Successfully!', 'success', [
                 'timer' => 1000,
                 'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                  ]);

              return redirect()->route('category.all');
 }


 public function getSubCat(){
   $cats = Category::all();
    return view('admin.sub_category')->withCats($cats);
 }

 public function postSubCat(Request $request){
   $this->validate($request, [
          'sub_cat' => 'required|max:255',
       ]);

      $subcat = new Sub_Category;

      $subcat->cat_id = $request->cat_id;
      $subcat->name   = $request->sub_cat;

      $subcat->save();

      notify()->flash('Added Successfully!', 'success', [
                'timer' => 3000,
                'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                 ]);

      return redirect()->route('sub_cat');

 }

 public function viewSubCats(){
    $scats = Sub_Category::all();
    $cat_name = array();
    foreach ($scats as $scat) {
      $cat_name[$scat->id] = Category::where('id', $scat->cat_id)->first();
    }

    return view('admin/view-subCats')
            ->with('scats', $scats)
            ->with('cat_name', $cat_name);
 }

 public function editSubCats($id){
     $cats = Category::all();
     $scat = Sub_Category::find($id);
     return view('admin.edit-SubCat')
             ->with('scat', $scat)
             ->with('cats', $cats);
 }

 public function updateSubCats(Request $request, $id){
   $this->validate($request, [
          'sub_cat' => 'required|max:255',
       ]);

      $subcat = Sub_Category::find($id);

      $subcat->cat_id = $request->cat_id;
      $subcat->name   = $request->sub_cat;

      $subcat->save();

      notify()->flash('Updated Successfully!', 'success', [
                'timer' => 1000,
                'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                 ]);

      return redirect()->route('sub-category.all');
 }


 public function deleteSubCats($id){
    $scat = Sub_Category::find($id);
    $scat->delete();
    notify()->flash('Deleted Successfully!', 'success', [
             'timer' => 1000,
             'text' => 'Have a wonderful shopping experience at Kbc-Agency',
              ]);

      return redirect()->route('sub-category.all');
 }

 public function getAds(){
      $cats = Category::all();
      $scats = Sub_Category::all();
     return view('admin.ads')->with('cats', $cats)->with('scats', $scats);
 }

 public function postAds(Request $request){
     $this->validate($request, [
        'ad_name'     => 'required|max:255',
        'ad_brand'    => 'required|max:255',
        'ad_sdesc'    => 'required|max:255',
        'ad_desc'     => 'required|max:1000',
        'ad_img'      => 'required|max:1000|mimes:jpeg,png',
        'ad_quantity' => 'required|numeric',
        'ad_cost'     => 'required|numeric',
        'ad_location' => 'required|max:255',
        'ad_conditon' => 'required|max:255',
        'ad_telno'   => 'required|max:255',
     ]);

     $ad = new Ad;

     $ad->cat_id = $request->cat_id;
     $ad->scat_id = $request->scat_id;
     $ad->ad_name = $request->ad_name;
     $ad->ad_brand = $request->ad_brand;
     $ad->ad_code = time();
     $ad->ad_sdesc = $request->ad_sdesc;
     $ad->ad_desc = $request->ad_desc;
     $ad->ad_quantity = $request->ad_quantity;
     $ad->ad_cost = $request->ad_cost;
     $ad->ad_location = $request->ad_location;
     $ad->ad_conditon = $request->ad_conditon;
     $ad->ad_telno = $request->ad_telno;

     if($request->hasFile('ad_img')){
        $ad_image = $request->file('ad_img');
        $filename = time() . '.' . $ad_image->getClientOriginalExtension();
        $location = public_path('images/ads/' .$filename);
        Image::make($ad_image)->save($location);

        $ad->ad_img = $filename;
     }

          $ad->save();

     notify()->flash('Added Successfully!', 'success', [
               'timer' => 3000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

      return redirect()->route('ads');

 }

 public function viewAd(){
    $cats = Category::all();
    $scats = Sub_Category::all();
     return view('admin.view-ad')->with('cats', $cats)->with('scats', $scats);
 }

  public function postViewAd(Request $request){

      $Adcat_id = $request->cat_id;
      $Adscat_id = $request->scat_id;

      $ads = Ad::where([['cat_id', $Adcat_id], ['scat_id', $Adscat_id]])->get();

      return view('admin.ad-results')->withAds($ads);
  }

  public function getResults(){
     return view('admin.ad-results');
  }

  public function getImages($ad_id){
    $id = $ad_id;
    return view('admin.add-images')->with('id', $id);
  }

  public function postImages(Request $request, $id){
     $this->validate($request, [
        'ad_imgs' => 'required|max:1000|mimes:jpeg,png',
     ]);

     $adimgs = new Ad_image;

     $adimgs->ad_id = $id;

     if($request->hasFile('ad_imgs')){
        $ad_images = $request->file('ad_imgs');
        $filename = time() . '.' . $ad_images->getClientOriginalExtension();
        $location = public_path('images/ads/' .$filename);
        Image::make($ad_images)->save($location);

        $adimgs->ad_imgs = $filename;
     }

     $adimgs->save();

     notify()->flash('Added Successfully!', 'success', [
               'timer' => 3000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

      return redirect()->route('add-images', $id);

  }

  public function editAd($id){
     $ad = Ad::find($id);
     $cats = Category::all();
     $scats = Sub_Category::all();
     return view('admin/edit-ads')
                 ->withAd($ad)
                 ->with('cats', $cats)
                 ->with('scats', $scats);
  }


  public function updateAd(Request $request, $id, $sid, $cid){
    $ads = Ad::where([['cat_id', $cid], ['scat_id', $sid]])->get();

    $this->validate($request, [
       'ad_name'     => 'required|max:255',
       'ad_brand'    => 'required|max:255',
       'ad_sdesc'    => 'required|max:255',
       'ad_desc'     => 'required|max:1000',
       'ad_img'      => 'max:1000|mimes:jpeg,png',
       'ad_quantity' => 'required|numeric',
       'ad_cost'     => 'required|numeric',
       'ad_location' => 'required|max:255',
       'ad_conditon' => 'required|max:255',
       'ad_telno'   => 'required|max:255',
    ]);

    $ad = Ad::find($id);

    $ad->cat_id = $request->cat_id;
    $ad->scat_id = $request->scat_id;
    $ad->ad_name = $request->ad_name;
    $ad->ad_brand = $request->ad_brand;
    $ad->ad_code = time();
    $ad->ad_sdesc = $request->ad_sdesc;
    $ad->ad_desc = $request->ad_desc;
    $ad->ad_quantity = $request->ad_quantity;
    $ad->ad_cost = $request->ad_cost;
    $ad->ad_location = $request->ad_location;
    $ad->ad_conditon = $request->ad_conditon;
    $ad->ad_telno = $request->ad_telno;

    if($request->hasFile('ad_img')){
       $ad_image = $request->file('ad_img');
       $filename = time() . '.' . $ad_image->getClientOriginalExtension();
       $location = public_path('images/ads/' .$filename);
       Image::make($ad_image)->save($location);

       $ad->ad_img = $filename;
    }

    $ad->save();

      notify()->flash('Added Successfully!', 'success', [
               'timer' => 1000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

         return view('admin/ad-results')->with('ads', $ads);
  }


  public function getConditions($id){
     return view('admin.add-conditions')->with('id', $id);
  }



  public function postConditions(Request $request, $id){
      $this->validate($request, [
        'ad_condition' => 'required|max:255',
      ]);

      $adcon = new Ad_condition;

      $adcon->ad_id = $id;
      $adcon->ad_conditon = $request->ad_condition;

      $adcon->save();

      notify()->flash('Added Successfully!', 'success', [
                'timer' => 3000,
                'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                 ]);

        return redirect()->route('add-conditions', $id);

  }

  public function getFeaturedAds(){
    $cats = Category::all();
    $scats = Sub_Category::all();
   return view('admin.add-featured-ads')->with('cats', $cats)->with('scats', $scats);
  }

  public function postFeaturedAds(Request $request){
    $this->validate($request, [
       'ad_name'     => 'required|max:255',
       'ad_brand'    => 'required|max:255',
       'ad_sdesc'    => 'required|max:255',
       'ad_desc'     => 'required|max:1000',
       'ad_img'      => 'required|max:1000|mimes:jpeg,png',
       'ad_quantity' => 'required|numeric',
       'ad_cost'     => 'required|numeric',
       'ad_location' => 'required|max:255',
       'ad_conditon' => 'required|max:255',
       'ad_telno'   => 'required|max:255',
    ]);

    $ad_featured = new Featured_Ad;

    $ad_featured->cat_id = $request->cat_id;
    $ad_featured->scat_id = $request->scat_id;
    $ad_featured->ad_name = $request->ad_name;
    $ad_featured->ad_brand = $request->ad_brand;
    $ad_featured->ad_code = time();
    $ad_featured->ad_sdesc = $request->ad_sdesc;
    $ad_featured->ad_desc = $request->ad_desc;
    $ad_featured->ad_quantity = $request->ad_quantity;
    $ad_featured->ad_cost = $request->ad_cost;
    $ad_featured->ad_location = $request->ad_location;
    $ad_featured->ad_conditon = $request->ad_conditon;
    $ad_featured->ad_telno = $request->ad_telno;

    if($request->hasFile('ad_img')){
       $ad_image = $request->file('ad_img');
       $filename = time() . '.' . $ad_image->getClientOriginalExtension();
       $location = public_path('images/ads/' .$filename);
       Image::make($ad_image)->save($location);

       $ad_featured->ad_img = $filename;
    }

         $ad_featured->save();

    notify()->flash('Added Successfully!', 'success', [
              'timer' => 3000,
              'text' => 'Have a wonderful shopping experience at Kbc-Agency',
               ]);

     return redirect()->route('ad-features');

  }

  public function viewFAd(){
     $cats = Category::all();
     $scats = Sub_Category::all();
      return view('admin.view-fad')->with('cats', $cats)->with('scats', $scats);
  }

  public function postViewFAd(Request $request){

      $Adcat_id = $request->cat_id;
      $Adscat_id = $request->scat_id;

      $ads = Featured_Ad::where([['cat_id', $Adcat_id], ['scat_id', $Adscat_id]])->get();

      return view('admin.adf-results')->withAds($ads);
  }

  public function editfAd($id){
     $ad = Featured_Ad::find($id);
     $cats = Category::all();
     $scats = Sub_Category::all();
     return view('admin/edit-fads')
                 ->withAd($ad)
                 ->with('cats', $cats)
                 ->with('scats', $scats);
  }

  public function updatefAd(Request $request, $id, $sid, $cid){
    $ads = Featured_Ad::where([['cat_id', $cid], ['scat_id', $sid]])->get();

    $this->validate($request, [
       'ad_name'     => 'required|max:255',
       'ad_brand'    => 'required|max:255',
       'ad_sdesc'    => 'required|max:255',
       'ad_desc'     => 'required|max:1000',
       'ad_img'      => 'max:1000|mimes:jpeg,png',
       'ad_quantity' => 'required|numeric',
       'ad_cost'     => 'required|numeric',
       'ad_location' => 'required|max:255',
       'ad_conditon' => 'required|max:255',
       'ad_telno'   => 'required|max:255',
    ]);

    $ad_featured = Featured_Ad::find($id);

    $ad_featured->cat_id = $request->cat_id;
    $ad_featured->scat_id = $request->scat_id;
    $ad_featured->ad_name = $request->ad_name;
    $ad_featured->ad_brand = $request->ad_brand;
    $ad_featured->ad_code = time();
    $ad_featured->ad_sdesc = $request->ad_sdesc;
    $ad_featured->ad_desc = $request->ad_desc;
    $ad_featured->ad_quantity = $request->ad_quantity;
    $ad_featured->ad_cost = $request->ad_cost;
    $ad_featured->ad_location = $request->ad_location;
    $ad_featured->ad_conditon = $request->ad_conditon;
    $ad_featured->ad_telno = $request->ad_telno;

    if($request->hasFile('ad_img')){
       $ad_image = $request->file('ad_img');
       $filename = time() . '.' . $ad_image->getClientOriginalExtension();
       $location = public_path('images/ads/' .$filename);
       Image::make($ad_image)->save($location);

       $ad_featured->ad_img = $filename;
    }

    $ad_featured->save();

      notify()->flash('Added Successfully!', 'success', [
               'timer' => 1000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

         return view('admin/adf-results')->with('ads', $ads);
  }

  public function deletefAd($id){
      $cats = Category::all();
      $scats = Sub_Category::all();
      $ad = Featured_Ad::find($id);
      $ad->delete();
      notify()->flash('Deleted Successfully!', 'success', [
               'timer' => 1000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

        return view('admin.view-fad')->with('cats', $cats)->with('scats', $scats);

  }

  public function getFImages($ad_id){
    $id = $ad_id;
    return view('admin.add-fimages')->with('id', $id);
  }

  public function postFImages(Request $request, $id){
     $this->validate($request, [
        'ad_imgs' => 'required|max:1000|mimes:jpeg,png',
     ]);

     $adfimgs = new Featured_image;

     $adfimgs->ad_id = $id;

     if($request->hasFile('ad_imgs')){
        $ad_images = $request->file('ad_imgs');
        $filename = time() . '.' . $ad_images->getClientOriginalExtension();
        $location = public_path('images/ads/' .$filename);
        Image::make($ad_images)->save($location);

        $adfimgs->ad_imgs = $filename;
     }

     $adfimgs->save();

     notify()->flash('Added Successfully!', 'success', [
               'timer' => 3000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

      return redirect()->route('add-fimages', $id);

  }

  public function getFConditions($id){
     return view('admin.add-fconditions')->with('id', $id);
  }

  public function postfConditions(Request $request, $id){
      $this->validate($request, [
        'ad_condition' => 'required|max:255',
      ]);

      $adfcon = new Featured_conditon;

      $adfcon->ad_id = $id;
      $adfcon->ad_conditon = $request->ad_condition;

      $adfcon->save();

      notify()->flash('Added Successfully!', 'success', [
                'timer' => 3000,
                'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                 ]);

        return redirect()->route('add-fconditions', $id);

  }


}
