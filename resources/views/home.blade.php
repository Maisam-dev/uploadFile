<!doctype html>
<html lang="en">
    @yield('header')
<body>
<div class="jumbotron text-center vogtitle"  >
    <h1>VOG Linz</h1>
</div>
@yield('Menu')
<div class="container">
    <p style=" color:  #06845b; font-size: xx-large; text-indent: 30%">
        @isset($ret)
            {{ $ret}}
        @endisset
    </p>
   @isset($ret)
        @yield('Form')
   @endisset
@isset($links)
        @yield('Table')
    @endisset
    </div>
@yield('foot')
</body>
</html>

