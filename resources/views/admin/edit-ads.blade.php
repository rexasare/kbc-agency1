@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>ADs</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
                 <div class="form-grids widget-shadow" data-example-id="basic-forms">
                     <div class="form-title">
                       <h4>Update New Ad:</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{route('ads.update', ['id' => $ad->id, 'sid' => $ad->scat_id, 'cid' => $ad->cat_id])}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <select class="form-control" name="cat_id">
                                @foreach ($cats as $cat)
                                   <option {{ ($cat->id == $ad->cat_id) ?  "selected=selected" : ""}} value="{{$cat->id}}">{{ $cat->name}}</option>
                                @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1">Sub-Category Name</label>
                             <select class="form-control" name="scat_id">
                               @foreach ($scats as $scat)
                                  <option {{ ($scat->id == $ad->scat_id) ?  "selected=selected" : ""}} value="{{$scat->id}}">{{ $scat->name}}</option>
                               @endforeach
                             </select>
                          </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1">Ad Name</label>
                             <input type="text" class="form-control" name="ad_name" required="" value="{{ $ad->ad_name}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Ad Brand</label>
                            <input type="text" class="form-control" name="ad_brand" required="" value="{{ $ad->ad_brand }}">
                         </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Ad Short Desciption</label>
                           <input type="text" class="form-control" name="ad_sdesc" required="" value="{{ $ad->ad_sdesc }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ad Desciption</label>
                        <textarea name="ad_desc" class="form-control">{{ $ad->ad_desc }}</textarea>
                       </div>
                           <div class="form-group">
                             <label for="exampleInputCategory">Add Ad image</label>
                             <input type="file" name="ad_img" class="form-control"  value="{{$ad->ad_img}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputCategory">Add Quantity:</label>
                            <input type="text" name="ad_quantity" class="form-control" required="" value="{{$ad->ad_quantity}}">
                         </div>
                         <div class="form-group">
                           <label for="exampleInputCategory">Add Cost_per_One:</label>
                           <input type="text" name="ad_cost" class="form-control" required="" value="{{$ad->ad_cost}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputCategory">Add location:</label>
                          <input type="text" name="ad_location" class="form-control" required="" value="{{ $ad->ad_location }}">
                       </div>
                       <div class="form-group">
                         <label for="exampleInputCategory">Add Condition:</label>
                         <input type="text" name="ad_conditon" class="form-control" required="" value="{{$ad->ad_conditon}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCategory">Add Seller No:</label>
                        <input type="text" name="ad_telno" class="form-control" required="" value="{{$ad->ad_telno}}">
                     </div>
                           <button type="submit" class="btn btn-default">Add AD</button>
                        </form>
                     </div>
                 </div>
             </div>
         </div>
   </div>

 <!-- end content -->
<div class="footer">
     <div class="clearfix"> </div>
    <p>© 2016 Gretong. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div>
@endsection
