@extends('main')

@section('breadcrumbs')
  <div class="w3layouts-breadcrumbs text-center">
		<div class="container">
			<span class="agile-breadcrumbs">
			<a href="index.html"><i class="fa fa-home home_1"></i></a> /
			<a href="categories.html">{{$catn->name}}</a> /
			<span>Search Results for "{{$item}}"</span></span>
		</div>
	</div>
@endsection

@section('content')
<h2 style="border-bottom: 6px solid #0099e5; width: 500px; padding:7px; margin-top:17px;">Search Results: "{{$item}}"</h2>
<div class="total-ads main-grid-border">
  <div class="container">
    <div class="ads-grid">
      <div class="agileinfo-ads-display col-md-9 col-md-offset-2">
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
                 <div class="sort-by" style="margin-bottom: 24px;">
                  <label>Sort By : </label>
                  <form>
                    <input type="hidden" name="cat" value="{{ $catn->id }}">
                    <input type="hidden" name="searchname" value="{{$item}}">
                    <select id="sort1">
                            <option value="">Most recent</option>
                            <option value="asc">Price: Rs Low to High</option>
                            <option value="desc">Price: Rs High to Low</option>
                    </select>
                  </form>
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
                 <div class="sort-by" style="margin-bottom: 24px;">
                  <label>Sort By : </label>
                  <form>
                    <input type="hidden" name="cat" value="{{ $catn->id }}">
                    <input type="hidden" name="searchname" value="{{$item}}">
                    <select id="sort1">
                            <option value="">Most recent</option>
                            <option value="asc">Price: Rs Low to High</option>
                            <option value="desc">Price: Rs High to Low</option>
                    </select>
                  </form>

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
