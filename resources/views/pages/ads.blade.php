@extends('main')

@section('breadcrumbs')
  <div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs">
			<a href="index.html"><i class="fa fa-home home_1"></i></a> /
			<a href="{{ URL::to('categories#parentVerticalTab'.$cat_id) }}">Categories</a> /
			<span><a href="{{ route('ad.nxt', ['cat_id' => $cat_id, 'subcat' => $sub_cat])}}">{{ $cat_info->name }} / {{$sub_info->name}}</a></span></span>
		</div>
	</div>
@endsection

@section('content')

  <div class="total-ads main-grid-border">
		<div class="container">
			<div class="select-box">
				<div class="browse-category ads-list">
          <form>
            <input type="hidden" name="cat_id" value="{{$cat_id}}">
            <input type="hidden" name="scat_id" value="{{$sub_cat}}">
					<label>Browse Categories</label>
					<select class="selectpicker show-tick" data-live-search="true" name="cats" id="cats">
            @foreach ($cats as $cat)
					  <option data-tokens="{{$cat->name}}" value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
					</select>
				</div>
				<div class="search-product ads-list">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
						<div class="input-group">
							<input type="text" id="search_name" class="form-control input-lg" placeholder="Laptops" />
							<span class="input-group-btn">
								<button class="btn btn-info btn-lg" id="searchp" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
					</div>
				</div>
        </form>
				<div class="clearfix"></div>
			</div>
			<div class="ads-grid">
				<div class="side-bar col-md-3">
          <div class="search-hotel">
        <h3 class="agileits-sear-head">Name contains</h3>
        <form>
          <input type="hidden" name="cat_id" value="{{$cat_id}}">
          <input type="hidden" name="scat_id" value="{{$sub_cat}}">
          <input type="text" id="search_name1" value="Product name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Product name...';}" required="" style="width: 100%;">
        </form>
      </div>
				<div class="w3ls-featured-ads">
					<h2 class="sear-head fer">Featured Ads</h2>
          @foreach ($adfeatures as $adfeature)


					<div class="w3l-featured-ad">
						<a href="{{ route('adf.single', ['catid' => $adfeature->cat_id, 'scatid' => $adfeature->scat_id, 'id' => $adfeature->id])}}">
							<div class="w3-featured-ad-left">
								<img src="../../../images/ads/{{$adfeature->ad_img}}" title="ad image" alt="" />
							</div>
							<div class="w3-featured-ad-right">
								<h4>{{$adfeature->ad_sdesc}}</h4>
								<p>¢ {{$adfeature->ad_cost}}</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
          @endforeach


					<div class="clearfix"></div>
				</div>
				</div>
				<div class="agileinfo-ads-display col-md-9">
					<div class="wrapper">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active">
						  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
							<span class="text">All Ads</span>
						  </a>
						</li>
						<li role="presentation" class="next">
						  <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
							<span class="text">Ads with Photos</span>
						  </a>
						</li>
					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								<div class="view-controls-list" id="viewcontrols">
									<label>view :</label>
									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								</div>
								<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
										<select id="sort">
														<option value="">Most recent</option>
														<option value="asc">Price: Rs Low to High</option>
														<option value="desc">Price: Rs High to Low</option>
										</select>
									   </div>
									 </div>
								<div class="clearfix"></div>

                <div class="ads-list-wrapper">
                  @include('pages.ads-list', ['ads' => $ads])
                </div>
						</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
						 <div>
												<div id="container">
								<div class="view-controls-list" id="viewcontrols">
									<label>view :</label>
									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								</div>
								<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
                    <select id="sort">
														<option value="">Most recent</option>
														<option value="asc">Price: Rs Low to High</option>
														<option value="desc">Price: Rs High to Low</option>
										</select>
									   </div>
									 </div>
								<div class="clearfix"></div>

                <div class="ads-list-wrapper">
                  @include('pages.ads-list', ['ads' => $ads])
                </div>
              </div>
							</div>
						</div>
						<ul class="pagination pagination-sm">
						{!! $ads->links() !!}
						</ul>
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

@endsection
