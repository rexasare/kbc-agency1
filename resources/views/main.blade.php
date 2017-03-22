<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials._head')
</head>
<body>
    @include('partials._nav')
    @include('partials._header')
    @include('partials._messages')
    @yield('slider')
    @yield('content')
    @include('partials._footer')
    @include('partials._scripts')
</body>
</html>
