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
                       <h4>Add Featured Ad Images: </h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('post-fimages', ['id' => $id])}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                           <div class="form-group">
                             <label for="exampleInputCategory">Add Image to Ads</label>
                             <input type="file" name="ad_imgs" class="form-control" required="">
                          </div>
                           <button type="submit" class="btn btn-default">Add Ad Image</button>
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
