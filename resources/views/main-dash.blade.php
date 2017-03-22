<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
  @include('partials-dash._head')
</head>
<body>
  <div class="page-container">
     <div class="left-content">
       <div class="inner-content">
           @include('partials-dash._messages')
          @include('partials-dash._header-section')
           <div class="content">
             @yield('main-content')
           </div>
        </div>
    </div>
    @include('partials-dash._sidebar')
  </div>
  @include('partials-dash._scripts')
</body>
</html>
