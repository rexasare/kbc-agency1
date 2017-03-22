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
                       <h4>Add Ad Conditions: </h4>
                     </div>
                     <div class="form-body">
                        <form action="{{ route('post-conditions', ['id' => $id])}}" method="post">
                          {!! csrf_field() !!}
                           <div class="form-group">
                             <label for="exampleInputCategory">Add Conditions to Ads</label>
                             <input type="text" name="ad_condition" class="form-control" required="">
                          </div>
                           <button type="submit" class="btn btn-default">Add Ad Condition</button>
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
