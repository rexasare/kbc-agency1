<!-- Navigation-Js-->
<script src="{{URL::asset('js/search.js')}}"></script>
  <script type="text/javascript" src="{{URL::to('js/main.js')}}"></script>
  <script type="text/javascript" src="{{ URL::to('js/classie.js')}}"></script>
  <script src="{{URL::asset('js/parsley.min.js')}}"></script>

<script>
  $(document).ready(function () {
  var mySelect = $('#first-disabled2');

  $('#special').on('click', function () {
    mySelect.find('option:selected').prop('disabled', true);
    mySelect.selectpicker('refresh');
  });

  $('#special2').on('click', function () {
    mySelect.find('option:disabled').prop('disabled', false);
    mySelect.selectpicker('refresh');
  });

  $('#basic2').selectpicker({
    liveSearch: true,
    maxOptions: 1
  });
  });
</script>

<script type="text/javascript" src="{{URL::to('js/jquery.flexisel.js')}}"></script><!-- flexisel-js -->
      <script type="text/javascript">
         $(window).load(function() {
          $("#flexiselDemo3").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 5000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
              portrait: {
                changePoint:480,
                visibleItems:1
              },
              landscape: {
                changePoint:640,
                visibleItems:1
              },
              tablet: {
                changePoint:768,
                visibleItems:1
              }
            }
          });

        });
         </script>
<!-- Slider-JavaScript -->
  <script src="{{URL::to('js/responsiveslides.min.js')}}"></script>
  <script>
      $(function () {
        $("#slider").responsiveSlides({
        	auto: true,
        	nav: true,
        	speed: 500,
          namespace: "callbacks",
          pager: false,
        });
      });
    </script>
<!-- //Slider-JavaScript -->
<!-- here stars scrolling icon -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
        };
      */

      $().UItoTop({ easingType: 'easeOutQuart' });

      });
  </script>
  <!-- start-smoth-scrolling -->
  <script type="text/javascript" src="{{URL::asset('js/move-top.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('js/easing.js')}}"></script>



  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>
  <!-- start-smoth-scrolling -->
<!-- //here ends scrolling icon -->
