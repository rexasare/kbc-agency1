<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
  $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
  $("#menu span").css({"position":"absolute"});
  }
  else
  {
  $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
  setTimeout(function() {
    $("#menu span").css({"position":"relative"});
  }, 400);
  }

        toggle = !toggle;
      });
</script>
<!--js -->
<script src="{{URL::to('js/jquery.nicescroll.js')}}"></script>
<script src="{{URL::to('js/scripts.js')}}"></script>
<script src="{{URL::to('js/validation.js')}}"></script>

<script src="{{URL::to('js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('js/menu_jquery.js')}}"></script>
