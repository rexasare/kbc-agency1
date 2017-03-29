<title>Kbc-Agency| Home</title>
<link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}"><!-- bootstrap-CSS -->

<link rel="stylesheet" href="{{URL::to('css/bootstrap-select.css')}}"><!-- bootstrap-select-CSS -->
 <link rel="stylesheet" href="{{URL::to('css/sweetalert.css')}}">
 <link rel="stylesheet" type="text/css" href="{{URL::to('css/jquery-ui1.css')}}">
<link href="{{URL::to('css/style.css')}}" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="{{URL::to('css/flexslider.css')}}" type="text/css" media="screen" /><!-- flexslider-CSS -->
<link rel="stylesheet" href="{{URL::to('css/font-awesome.min.css')}}" /><!-- fontawesome-CSS -->
<link rel="stylesheet" href="{{URL::to('css/menu_sideslide.css')}}" type="text/css" media="all"><!-- Navigation-CSS -->
<script type="text/javascript" src="{{URL::to('js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{URL::to('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('js/jquery.min.js')}}"></script>
<script src="{{URL::to('js/bootstrap.js')}}"></script>
<script src="{{URL::to('js/jquery-1.10.2.min.js')}}" charset="utf-8"></script>
<script src="{{URL::asset('js/search.js')}}"></script>
<script src="{{URL::to('js/jquery-ui.js')}}"></script>


<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="{{URL::to('js/bootstrap-select.js')}}"></script>
<!-- //meta tags -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{URL::to('css/easy-responsive-tabs.css')}}" />
<script src="{{URL::to('js/easyResponsiveTabs.js')}}"></script>
<script src="{{URL::to('js/tabs.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
var elem=$('#container ul');
	$('#viewcontrols a').on('click',function(e) {
		if ($(this).hasClass('gridview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('list').addClass('grid');
				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
				$('#viewcontrols .gridview').addClass('active');
				$('#viewcontrols .listview').removeClass('active');
				elem.fadeIn(1000);
			});
		}
		else if($(this).hasClass('listview')) {
			elem.fadeOut(1000, function () {
				$('#container ul').removeClass('grid').addClass('list');
				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
				$('#viewcontrols .gridview').removeClass('active');
				$('#viewcontrols .listview').addClass('active');
				elem.fadeIn(1000);
			});
		}
	});
});
</script>
<style media="screen">
  .w3l-featured-ad{
    width: 100%;
    height: 120px;
    overflow: hidden;
    margin: 0 auto;
    margin-bottom: 20px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
  }
  .w3l-featured-ad:hover{
    box-shadow: 0px 4px 7px rgba(0, 0, 0, 0.35);
  }
  .w3l-featured-ad a{
    display: block;
  }
  .w3-featured-ad-left{
    width: 40% !important;
    margin: -10px;
    margin-right: 0px;
  }
  .w3-featured-ad-right{
    width: 60% !important;
    padding: 10px;
  }
  .w3-featured-ad-right h4{
    font-size: 25px;
  }
  .w3-featured-ad-right p{
    font-size: 20px;
    text-align: left;
  }

  .list-right{}
</style>
@yield('validation')

<!--//fonts-->
