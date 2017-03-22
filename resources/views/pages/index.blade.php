@extends('main')

@section('slider')
  <div class="slider">
   <div class="callbacks_container">
      <ul class="rslides" id="slider">
        @foreach ($banners as $banner)


          <li>
        <div class="banner{{$banner->id}}" style="background:url(../images/banners/{{$banner->img_file}}) no-repeat 0px 0px;background-size:cover; height:70vh; background-position: center;">
           <div class="banner-info">
           {{-- <h3>{{ $banner->img_title }}.</h3>
           <p>{{ $banner->img_desc }}.</p> --}}
           </div>
        </div>
          </li>
            @endforeach
       </ul>
   </div>
 </div>
@endsection
{{-- {{ URL::to('categories#parentVerticalTab' . $cat->id) }} --}}
@section('content')
		<!-- content-starts-here -->
		<div class="main-content">
			<div class="w3-categories">
				<h3>Browse Categories</h3>
				<div class="container">
          @foreach ($cats as $cat)
					<div class="col-md-3">
						<div class="focus-grid w3layouts-boder{{ $cat->id}}">
							<a class="btn-8" href="{{ URL::to('categories#parentVerticalTab'.$cat->id) }}">
								<div class="focus-border">
									<div class="focus-layout">
										<div class="focus-image"><i class="fa fa-{{ $cat->class}}"></i></div>
										<h4 class="clrchg">{{ $cat->name }}</h4>
									</div>
								</div>
							</a>
						</div>
					</div>
          @endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			{{-- <!-- most-popular-ads -->
			<div class="w3l-popular-ads">
				<h3>Most Popular Ads</h3>
				 <div class="w3l-popular-ads-info">
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad1.jpg" class="img-responsive" alt=""/>
							<div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="cars.html">Latest Cars</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="cars.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad2.jpg" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="real-estate.html">Apartments for Sale</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="real-estate.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad3.jpg" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="jobs.html">BPO jobs</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="jobs.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad4.jpg" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="electronics-appliances.html">Accessories</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="electronics-appliances.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad5.jpg" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="furnitures.html">Home Appliances</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="furnitures.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls-portfolio-left">
						<div class="portfolio-img event-img">
							<img src="images/ad6.jpg" class="img-responsive" alt=""/>
							 <div class="over-image"></div>
						</div>
						<div class="portfolio-description">
						   <h4><a href="fashion.html">Clothing</a></h4>
						   <p>Suspendisse placerat mattis arcu nec por</p>
							<a href="fashion.html">
								<span>Explore</span>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				 </div>
			 </div> --}}
			<!-- most-popular-ads -->
			<div class="trending-ads">
				<div class="container">
				<!-- slider -->
				<div class="agile-trend-ads">
					<h2>Trending Ads</h2>
							<ul id="flexiselDemo3">
								<li>
                  @foreach ($adfeatures as $adfeature)


									<div class="col-md-3 biseller-column">
										<a href="{{ route('adf.single', ['catid' => $adfeature->cat_id, 'scatid' => $adfeature->scat_id, 'id' => $adfeature->id])}}">
											<img src="images/ads/{{$adfeature->ad_img}}" alt="" />
											<span class="price">¢ {{$adfeature->ad_cost}}</span>
										</a>
										<div class="w3-ad-info">
											<h5>{{$adfeature->ad_sdesc}}</h5>
											<span>1 hour ago</span>
										</div>
									</div>
                  @endforeach
								</li>
								<li>
                  @foreach ($ad_features as $ad_feature)


									<div class="col-md-3 biseller-column">
										<a href="{{ route('adf.single', ['catid' => $ad_feature->cat_id, 'scatid' => $ad_feature->scat_id, 'id' => $ad_feature->id])}}">
											<img src="../../images/ads/{{$ad_feature->ad_img}}" alt="" />
											<span class="price">¢ {{$ad_feature->ad_cost}}</span>
										</a>
										<div class="w3-ad-info">
											<h5>{{$ad_feature->ad_sdesc}}</h5>
											<span>1 hour ago</span>
										</div>
									</div>
                    @endforeach
								</li>
						</ul>
					</div>
			</div>
			<!-- //slider -->
			</div>

		</div>

  @endsection
