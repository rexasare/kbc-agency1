<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Banner;

use App\Category;

use App\Sub_Category;
use App\Ad;
use App\Ad_image;
use App\Ad_condition;
use Input;
use App\Featured_Ad;
use App\Featured_image;
use App\Featured_conditon;



/**
 *
 */
class PagesController extends Controller
{
  public function getIndex(){
    $adfeatures = Featured_Ad::where('scat_id', 14)->get();
    $ad_features = Featured_Ad::where('scat_id', 15)->get();
    $banners = Banner::all();
    $cats = Category::all();
     return view('pages.index')->with('banners', $banners)
                               ->withCats($cats)
                               ->with('adfeatures', $adfeatures)
                               ->with('ad_features', $ad_features);



  }

  public function getCategory(){
      $cats = category::all();
      $subcats = Sub_Category::all();
      $ads = Ad::all();
     return view('pages.categories')->with('cats', $cats)
                                    ->with('subcats', $subcats)
                                    ->with('ads', $ads);
  }

  public function getAllAds(Request $request, $catid){
    $cat_info = Category::where('id', $catid)->first();
     $adfeatures = Featured_Ad::where('scat_id', 14)->get();

     $query = new Ad();

     if ($request->has('search') && $request->has('cat')) {
       if ($request->has('search')) {
         $query = $query->where('ad_name', 'LIKE', '%' . $request->search . '%');
       }

     if ($request->has('cat')) {
         $query = $query->where('cat_id', $request->cat);
                         //  ->where('scat_id', $sub_cat);
       }
   }else if($request->has('search') || $request->has('cat')){
     if($request->has('search')){
        $query = $query->where('ad_name', 'LIKE', '%'. $request->search . '%')
                       ->where('cat_id', $request->cat);
     }

   }else if($request->has('sort') && strtoupper($request->sort) === 'DESC'){
     $query = $query->where('cat_id', $request->cat)
                    ->orderBy('ad_cost', 'DESC');

 }else if($request->has('sort') && strtoupper($request->sort) === 'ASC'){
   $query = $query->where('cat_id', $request->cat)
                    ->orderBy('ad_cost', 'ASC');

   } else {
       $query = $query->where('cat_id', $catid);
     }

     $cats = Category::all();
     $ads = $query->paginate(7);

     if ($request->ajax()) {
       return view('pages.all-ads-list', compact('ads', 'cat_info',  'adfeatures'));
     }

     return view('pages.all-ads')->with('ads', $ads)
                                ->with('catid', $catid)
                                ->with('cats',$cats)
                                ->with('adfeatures', $adfeatures)
                                ->with('cat_info', $cat_info);


  }

  public function getAds(Request $request, $cat_id, $sub_cat){
    $query = new Ad();

    $cat_info = Category::where('id', $cat_id)->first();
    $sub_info = Sub_Category::where('id', $sub_cat)->first();
    $adfeatures = Featured_Ad::where('scat_id', 14)->get();



    if ($request->has('search') && $request->has('cat')) {
      if ($request->has('search')) {
        $query = $query->where('ad_name', 'LIKE', '%' . $request->search . '%');
      }

    if ($request->has('cat')) {
        $query = $query->where('cat_id', $request->cat);
                        //  ->where('scat_id', $sub_cat);
      }
  }else if($request->has('search') || $request->has('cat')){
    if($request->has('search')){
       $query = $query->where('ad_name', 'LIKE', '%'. $request->search . '%')
                      ->where('cat_id', $request->cat)
                      ->where('scat_id', $sub_cat);
    }

  }else if($request->has('sort') && strtoupper($request->sort) === 'DESC'){
    $query = $query->where('cat_id', $request->cat)
                     ->where('scat_id', $sub_cat)
                     ->orderBy('ad_cost', 'DESC');

}else if($request->has('sort') && strtoupper($request->sort) === 'ASC'){
  $query = $query->where('cat_id', $request->cat)
                   ->where('scat_id', $sub_cat)
                   ->orderBy('ad_cost', 'ASC');

  } else {
      $query = $query->where([
        ['cat_id', $cat_id],
        ['scat_id', $sub_cat]
      ]);
    }

    $cats = Category::all();
    $ads = $query->paginate(7);

    if ($request->ajax()) {
      return view('pages.ads-list', compact('ads', 'cat_info', 'sub_info', 'adfeatures'));
    }

    return view('pages.ads', compact('cats', 'ads', 'cat_id', 'sub_cat', 'cat_info', 'sub_info', 'adfeatures'));
  }


  public function getSingle($catid, $scatid, $id){
    $cats = Category::all();
     $ad = Ad::where([['cat_id', $catid], ['scat_id', $scatid], ['id', $id]])->get()->first();
     $ad_imgs = Ad_image::where('ad_id', $id)->get();
     $ad_cons = Ad_condition::where('ad_id', $id)->get();
     $cat_name = Category::where('id', $catid)->first();
     $scat_name = Sub_Category::where('id', $scatid)->first();

     return view('pages.single')->with('ad', $ad)
                                 ->with('ad_imgs', $ad_imgs)
                                 ->with('cat_name', $cat_name)
                                 ->with('scat_name', $scat_name)
                                 ->with('ad_cons', $ad_cons)
                                 ->with('cats', $cats)
                                 ->with('catid', $catid)
                                 ->with('scatid', $scatid);
  }


  public function getResults(Request $request) {
    $cats = Category::all();

    $catid = $request->cat;
    $catn = Category::where('id', $catid)->first();

    $cat_info = Category::where('id', $catid)->first();
    $sub_info = Sub_Category::where('cat_id', $catid)->first();

    $item = $request->searchname;

    $query = Ad::where([
                    ['ad_name', 'LIKE', '%'.$item.'%'],
                    ['cat_id', $catid]
                ])
                ->orWhere('ad_location', 'LIKE', '%'.$item.'%');

    if ($request->has('sort1') && strtoupper($request->sort1) === 'DESC') {
      $query->orderBy('ad_cost', 'DESC');
    } else {
      $query->orderBy('ad_cost', 'ASC');
    }



    $ads = $query->paginate(7);

    if ($request->ajax()) {
      return view('pages.ads-list1', compact('ads', 'cat_info', 'sub_info'));
    }

    return view('pages.results', compact('ads', 'cats', 'item', 'catn', 'cat_info', 'sub_info'));
  }

  public function getAdFSingle($catid, $scatid, $id){
    $cats = Category::all();
     $ad = Featured_Ad::where([['cat_id', $catid], ['scat_id', $scatid], ['id', $id]])->get()->first();
     $ad_fimgs = Featured_image::where('ad_id', $id)->get();
     $ad_fcons = Featured_conditon::where('ad_id', $id)->get();
     $cat_name = Category::where('id', $catid)->first();
     $scat_name = Sub_Category::where('id', $scatid)->first();

     return view('pages.fsingle')->with('ad', $ad)
                                 ->with('ad_fimgs', $ad_fimgs)
                                 ->with('cat_name', $cat_name)
                                 ->with('scat_name', $scat_name)
                                 ->with('ad_fcons', $ad_fcons)
                                 ->with('cats', $cats)
                                 ->with('catid', $catid)
                                 ->with('scatid', $scatid);
  }
}
