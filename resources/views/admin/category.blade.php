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
                       <h4>Add New Category :</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('cat.store')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <input type="text" class="form-control" name="cat" required="">
                           </div>
                           <div class="form-group">
                             <label for="exampleInputEmail1">Category class</label>
                             <input type="text" class="form-control" name="class" required="">
                          </div>
                           <div class="form-group">
                             <label for="exampleInputCategory">Add image to Category</label>
                             <input type="file" name="cat_img" required="">
                          </div>
                           <button type="submit" class="btn btn-default">Add Category</button>
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
