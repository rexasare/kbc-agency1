@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>Sub-Category</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
                 <div class="form-grids widget-shadow" data-example-id="basic-forms">
                     <div class="form-title">
                       <h4>Edit New Sub-Category :</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{route('scat.update', ['id' => $scat->id])}}" method="post">
                           {!! csrf_field() !!}
                            <div class="form-group">
                              <label for="exampleInputEmail1">Category Name</label>
                              <select class="form-control" name="cat_id">
                                @foreach ($cats as $cat)
                                   <option {{ ($cat->id == $scat->cat_id) ? "selected=selected" : ""}} value="{{$cat->id}}">{{ $cat->name}}</option>
                                @endforeach
                              </select>
                           </div>
                           <div class="form-group">
                             <label for="exampleInputCategory">Name of Sub-Category</label>
                             <input type="text" name="sub_cat" class="form-control" required="" value="{{$scat->name}}">
                          </div>
                           <button type="submit" class="btn btn-default">Update Sub Category</button>
                        </form>
                     </div>
                 </div>
             </div>
         </di+>
   </div>

 <!-- end content -->
<div class="footer">
     <div class="clearfix"> </div>
    <p>© 2016 Gretong. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
</div>
</div>
@endsection
