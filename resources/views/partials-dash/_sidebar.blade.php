<div class="sidebar-menu">
  <header class="logo1">
    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
  </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                   <div class="menu">
          <ul id="menu" >
            <li><a href="{{ url('admin') }}"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
            <li><a href="{{ url('admin/banner')}}"><i class="fa fa-picture-o"></i> <span>Banner</span></a></li>
             <li id="menu-academico" ><a href="#"><i class="fa fa-plus-square"></i> <span>Category</span> <span class="fa fa-angle-right" style="float: right"></span></a>
							   <ul id="menu-academico-sub" >
								   <li id="menu-academico-avaliacoes" ><a href="{{ route('cat')}}">Add Category</a></li>
									<li id="menu-academico-avaliacoes" ><a href="{{ route('sub_cat') }}">Add Sub-Category</a></li>
							  </ul>
						</li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-picture-o"></i> <span>ADS</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="{{ route('ads')}}">Add Ad</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="{{ route('ad-features')}}">Add Featured Ad</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="{{ route('adf-show')}}">View Featured Ad</a></li>
                 <li id="menu-academico-avaliacoes" ><a href="{{ route('ads.show')}}">View Ads</a></li>
               </ul>
           </li>
          </ul>
        </div>
        </div>
        <div class="clearfix"></div>
