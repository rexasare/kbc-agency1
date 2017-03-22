<!-- header -->
<header>
  <div class="w3ls-header"><!--header-one-->
     <div class="w3ls-header-left">
        <p><a href="#">Kbc Agency -- Ads Stand Point</a></p>
    </div>
    <div class="w3ls-header-right">
      @if (Auth::check())
        <ul>
          <li class="dropdown head-dpdn">
            <a href="{{ route('logout') }}" aria-expanded="false"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
          <li class="dropdown head-dpdn">
            <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
          </li>
        </ul>
      @else
        <ul>
          <li class="dropdown head-dpdn">
            <a href="{{ route('login') }}" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
          </li>
          <li class="dropdown head-dpdn">
            <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
          </li>
        </ul>
      @endif

    </div>

    <div class="clearfix"> </div>
  </div>
  <div class="container">
    <div class="agile-its-header">
      <div class="logo">
        <h1><a href="{{ route('home') }}"><span>Kbc-</span>Agency</a></h1>
      </div>
      <div class="agileits_search">
        <form action="{{ route('results')}}" method="GET">
          <select id="agileinfo_search" name="cat" required="">
            <option value="">All Categories</option>
            @foreach ($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
              <input name="searchname" type="text"  placeholder="How can we help you today?" required="" />
               <button type="submit" class="btn btn-default" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"> </i>
              </button>
        </form>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</header>

@yield('breadcrumbs')
<!-- //header -->
