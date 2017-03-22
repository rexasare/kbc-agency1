@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>View Ads</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
                 <div class="form-grids widget-shadow" data-example-id="basic-forms">
                     <div class="form-title">
                       <h4>Search Ad :</h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('view-fad.store')}}" method="post" enctype="multipart/form-data">
                          {!! csrf_field() !!}
                          <div class="col-md-12">

                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Choose Category Name</label>
                              <select class="form-control" id="cat" name="cat_id">
                                @foreach ($cats as $cat)
                                   <option class="{{$cat->name}}"  value="{{$cat->id}}">{{ $cat->name}}</option>
                                @endforeach
                              </select>
                           </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Choose Sub-Category</label>
                              <select class="form-control" id="scat" name="scat_id">
                                @foreach ($scats as $scat)
                                   <option class="{{ $scat->cat_id}}" value="{{$scat->id}}">{{ $scat->name}}</option>
                                @endforeach
                              </select>
                           </div>
                         </div>
                         <div class="col-md-2"><br>
                           {{-- <label for="exampleInputEmail1">Search Ad</label> --}}
                            <button type="submit" class="btn btn-default">Search Ad</button>
                         </div>
                         </div>
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
