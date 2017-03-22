@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>View Results</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
                 <div class="form-grids widget-shadow" data-example-id="basic-forms">
                     <div class="form-title">
                       <h4>Search Results: </h4>
                     </div>
                      <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                          @if ($ads->count() == 0)
                             <h3>No Results found!</h3>
                          @else
                            @foreach ($ads as $ad)
                              <tr>
                                <td>{{$ad->id}}</td>
                                <td>{{$ad->ad_name}}</td>
                                <td>
                                  <button type="button" class="btn btn-default"><a href="{{ route('add-images', ['ad_id' => $ad->id])}}">Add Images</a></button>
                                  <button type="button" class="btn btn-default"><a href="{{ route('add-conditions', ['id' => $ad->id])}}">Add Conditions</a></button>
                                </td>
                              </tr>

                            @endforeach
                          @endif
                        </tbody>
                      </table>
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
