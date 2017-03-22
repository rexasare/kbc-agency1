@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>Category</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
                 <div class="form-grids widget-shadow" data-example-id="basic-forms">
                     <div class="form-title">
                       <h4>Add New Banner :</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                           <div class="form-group">
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Banner Title</label>
                                  <input type="text" class="form-control" name="ban_title">
                             </div>
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Banner Desc</label>
                                  <input type="text" class="form-control" name="ban_desc">
                             </div>
                             <label for="exampleInputCategory">Add image to Bannar</label>
                             <input type="file" name="banner" required="">
                          </div>
                           <button type="submit" class="btn btn-default">Add Bannar</button>
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
