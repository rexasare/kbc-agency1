@extends('main-dash')

@section('main-content')
<div class="women_main">
 <!-- start content -->
 <div class="grids">
         <div class="progressbar-heading grids-heading">
           <h2>View Featured Results</h2>
         </div>
         <div class="panel panel-widget forms-panel">
             <div class="forms">
               @if ($ads->count() == 0)
                  <h3>No Results found!</h3>
               @else
                   @foreach ($ads as $ad)
                         <div class="col-md-4">
                           <div class="row">
                             <div class="col-sm-12 col-md-12">
                                 <div class="thumbnail">
                                     <img src="{{URL::to('images/ads/'.$ad->ad_img)}}" alt="ads-images" style="width:493px; height:250px;">
                                     <div class="caption">
                                       <h3>{{$ad->ad_name}}</h3>
                                       <p>{{ substr($ad->ad_desc, 0, 100)}}{{ strlen($ad->ad_desc) > 100 ? "..." : "" }}</p>
                                       <p>
                                         <a href="{{ route('ads.fedit', ['ad_id' => $ad->id, 'cid' => $ad->cat_id, 'sid' => $ad->scat_id])}}" class="btn btn-default btn-sm" role="button">Edit Ad</a>
                                         <a href="{{ route('add-fimages', ['ad_id' => $ad->id])}}" class="btn btn-default btn-sm" role="button">Add Images</a>
                                         <a href="{{ route('add-fconditions', ['id' => $ad->id])}}" class="btn btn-default btn-sm" role="button" style="margin-bottom:5px;">Add Conditions</a>
                                         <form class="" action="{{route('adf.destroy', ['id' => $ad->id])}}" method="post" style="display: inline">
                                           {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                         </form>
                                       </p>
                                     </div>
                                 </div>
                             </div>
                           </div>
                      </div>
              @endforeach
          @endif
                 {{-- <div class="form-grids widget-shadow" data-example-id="basic-forms">
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
                                  <button type="button" class="btn btn-default"><a href="{{ route('add-fimages', ['ad_id' => $ad->id])}}">Add Images</a></button>
                                  <button type="button" class="btn btn-default"><a href="{{ route('add-fconditions', ['id' => $ad->id])}}">Add Conditions</a></button>
                                </td>
                              </tr>

                            @endforeach
                          @endif
                        </tbody>
                      </table>
                 </div> --}}
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
