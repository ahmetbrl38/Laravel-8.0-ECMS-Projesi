<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$description}}">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/frontend/css/modern-business.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</head>

<body>

{{--<nav>--}}
{{--    <label class="logo">Ahmet Yasin Burul</label>--}}
{{--    <ul>--}}
{{--        <li><a class="active" href="#">Ana Sayfa</a></li>--}}
{{--        <li><a href="#">Blog Yazıları</a></li>--}}
{{--        <li><a href="#">Sayfalar</a></li>--}}
{{--        <li><a href="#">Hakkımda</a></li>--}}
{{--        <li><a href="#">İletişim</a></li>--}}
{{--    </ul>--}}
{{--    <label id="icon">--}}
{{--        <i class="fas fa-bars"></i>--}}
{{--    </label>--}}
{{--</nav>--}}

<!-- Navigation -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.Index')}}">Ahmet Yasin Burul</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.Index')}}">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog.Index')}}">Blog Yazıları</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('project.Index')}}">Projelerim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/page/{{$slug}}">Sayfalar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.Detail')}}">Hakkımda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.Detail')}}">İletişim</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">{!! $footer !!}</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/frontend/vendor/jquery/jquery.min.js"></script>
<script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/custom.js" ></script>
</body>

</html>
