@extends('main')

@section('breadcrumbs')
  <div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs">
			<a href="index.html"><i class="fa fa-home home_1"></i></a> /
			<a href="{{ URL::to('categories#parentVerticalTab'.$cat_name->id) }}">Categories</a> /
			<span><a href="{{ route('ad.nxt', ['cat_id' => $cat_name->id, 'subcat' => $scat_name->id])}}">{{ $cat_name->name }} / {{$scat_name->name}}</a> /
      </span><a href="">{{$ad->ad_name}}</a></span>
		</div>
	</div>
@endsection

@section('content')

  <!--single-page-->
<div class="single-page main-grid-border">
  <div class="container">
    <div class="product-desc">
      <div class="col-md-7 product-view">
        <h2>{{ $ad->ad_sdesc }}</h2>
        <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">{{ $ad->ad_location}}</a> | Added at {{date('h:ia', strtotime($ad->created_at))}}, Ad ID: {{$ad->ad_code}}</p>
        <div class="flexslider">
          <ul class="slides">
            @foreach ($ad_imgs as $ad_img)
            <li data-thumb="{{asset('images/ads/'.$ad_img->ad_imgs)}}">
              <img src="{{asset('images/ads/'. $ad_img->ad_imgs)}}" />
            </li>
              @endforeach
          </ul>
        </div>
        <!-- FlexSlider -->
          <script defer src="{{URL::to('js/jquery.flexslider.js')}}"></script>

          <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
          $('.flexslider').flexslider({
          animation: "slide",
          controlNav: "thumbnails"
          });
        });
        </script>
        <!-- //FlexSlider -->
        <div class="product-details">
          <h4><span class="w3layouts-agileinfo">Brand </span> : {{$ad->ad_name }}</a><div class="clearfix"></div></h4>
          <h4><span class="w3layouts-agileinfo">Summary</span> :<p>{{$ad->ad_desc}}.</p><div class="clearfix"></div></h4>

        </div>
      </div>
      <div class="col-md-5 product-details-grid">
        <div class="item-price">
          <div class="product-price">
            <p class="p-price">Price</p>
            <h3 class="rate">¢ {{$ad->ad_cost}}</h3>
            <div class="clearfix"></div>
          </div>
          <div class="condition">
            <p class="p-price">Condition</p>
            <h4>{{$ad->ad_conditon}}</h4>
            <div class="clearfix"></div>
          </div>
          <div class="itemtype">
            <p class="p-price">Item Type</p>
            <h4>{{ $cat_name->name}}</h4>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="interested text-center">
          <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
          <p><i class="glyphicon glyphicon-earphone"></i>{{$ad->ad_telno}}</p>
        </div>
          <div class="tips">
          <h4>Tips for Buyers</h4>
            <ol>
              @foreach ($ad_cons as $ad_con)
                  <li><a href="#">{{$ad_con->ad_conditon}}.</a></li>
              @endforeach


            </ol>
          </div>
      </div>
    <div class="clearfix"></div>
    </div>
  </div>
</div>

@endsection
