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
                       <h4>Add New Ad:</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('ads.store')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <select class="form-control" name="cat_id">
                                @foreach ($cats as $cat)
                                   <option value="{{$cat->id}}">{{ $cat->name}}</option>
                                @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1">Sub-Category Name</label>
                             <select class="form-control" name="scat_id">
                               @foreach ($scats as $scat)
                                  <option value="{{$scat->id}}">{{ $scat->name}}</option>
                               @endforeach
                             </select>
                          </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1">Ad Name</label>
                             <input type="text" class="form-control" name="ad_name" required="" value="{{ old('ad_name')}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Ad Brand</label>
                            <input type="text" class="form-control" name="ad_brand" required="" value="{{ old('ad_brand')}}">
                         </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Ad Short Desciption</label>
                           <input type="text" class="form-control" name="ad_sdesc" required="" value="{{ old('ad_sdesc')}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Ad Desciption</label>
                        <textarea name="ad_desc" class="form-control" value="{{ old('ad_desc')}}"></textarea>
                       </div>
                           <div class="form-group">
                             <label for="exampleInputCategory">Add Ad image</label>
                             <input type="file" name="ad_img" class="form-control" required="" value="{{ old('ad_img')}}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputCategory">Add Quantity:</label>
                            <input type="text" name="ad_quantity" class="form-control" required="" value="{{ old('ad_quantity')}}">
                         </div>
                         <div class="form-group">
                           <label for="exampleInputCategory">Add Cost_per_One:</label>
                           <input type="text" name="ad_cost" class="form-control" required="" value="{{ old('ad_cost')}}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputCategory">Add location:</label>
                          <input type="text" name="ad_location" class="form-control" required="" value="{{ old('ad_location')}}">
                       </div>
                       <div class="form-group">
                         <label for="exampleInputCategory">Add Condition:</label>
                         <input type="text" name="ad_conditon" class="form-control" required="" value="{{ old('ad_condition')}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCategory">Add Seller No:</label>
                        <input type="text" name="ad_telno" class="form-control" required="" value="{{ old('ad_telno')}}">
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
