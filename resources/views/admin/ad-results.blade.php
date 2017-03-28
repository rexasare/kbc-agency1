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
                           @if ($ads->count() == 0)
                              <h3>No Results found!</h3>
                           @else
                               @foreach ($ads as $ad)
                                     <div class="col-md-4">
                                       <div class="row">
                                         <div class="col-sm-12 col-md-12">
                                             <div class="thumbnail">
                                                 <img src="{{URL::to('images/ads/'.$ad->ad_img)}}" alt="ads-images" >
                                                 <div class="caption">
                                                   <h3>{{$ad->ad_name}}</h3>
                                                   <p>{{ substr($ad->ad_desc, 0, 100)}}{{ strlen($ad->ad_desc) > 100 ? "..." : "" }}</p>
                                                   <p>
                                                     <a href="{{ route('ads.edit', ['ad_id' => $ad->id, 'cid' => $ad->cat_id, 'sid' => $ad->scat_id])}}" class="btn btn-default btn-sm" role="button">Edit Ad</a>
                                                     <a href="{{ route('add-images', ['ad_id' => $ad->id])}}" class="btn btn-default btn-sm" role="button">Add Images</a>
                                                     <a href="{{ route('add-conditions', ['id' => $ad->id])}}" class="btn btn-default btn-sm" role="button">Add Conditions</a>
                                                   </p>
                                                 </div>
                                             </div>
                                         </div>
                                       </div>
                                  </div>
                          @endforeach
                      @endif

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
