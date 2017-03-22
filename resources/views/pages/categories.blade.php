@extends('main')

@section('breadcrumbs')
  <div class="w3layouts-breadcrumbs text-center">
  		<div class="container">
  			<span class="agile-breadcrumbs"><a href="index.html"><i class="fa fa-home home_1"></i></a> / <span>Categories</span></span>
  		</div>
  	</div>
@endsection

@section('content')
  <div class="categories-section main-grid-border">
  		<div class="container">
  			<h2 class="w3-head">All Categories</h2>
  			<div class="category-list">
  				<div id="parentVerticalTab">
  					<div class="agileits-tab_nav">
  					<ul class="resp-tabs-list hor_1">
              @foreach ($cats as $cat)
                <li>{{ $cat->name}}</li>
              @endforeach
  					</ul>
  						<a class="w3ls-ads" href="#">View all Ads</a>
  					</div>
  					<div class="resp-tabs-container hor_1">
  						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>All Ghana</strong> (Select your category to see local ads)</span>
              @foreach ($cats as $cat)
  						<div>
  							<div class="category">
  								<div class="category-img">
  									<img src="../../images/cat/{{ $cat->img_file}}" title="image" alt="" />
  								</div>
  								<div class="category-info">
  									<h4>{{ $cat->name }}</h4>
                     {{-- @if ($ads->cat_id === $cat->id)
                       <span>{{$ads->count()}} Ads</span>
                     @endif --}}
  									<a href="{{ route('all.ads', ['catid' => $cat->id])}}">View all Ads</a>
  								</div>
  								<div class="clearfix"></div>
  							</div>
  							<div class="sub-categories">
  								<ul>
                    @foreach ($subcats as $subcat)
                      @if ($subcat->cat_id == $cat->id)
  									<li><a href="{{ route('ad.nxt', ['cat_id' => $cat->id, 'subcat' => $subcat->id])}}">{{ $subcat->name}}</a></li>
                    @endif
                    @endforeach
  								</ul>
  							</div>
  						</div>
            @endforeach
  					</div>
  					<div class="clearfix"></div>
  				</div>
  			</div>
  		</div>
  	</div>

    <!--Plug-in Initialisation-->
	<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

@endsection
