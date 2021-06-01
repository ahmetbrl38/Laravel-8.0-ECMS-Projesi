@extends('frontend.layout')
@section('title','Anasayfa Başlığı')
@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Hakkımda
        </h1>

        <!-- Intro Content -->
        <div class="col-lg-12">
            <p>{!! $home_detail !!}</p>
        </div>
        <!-- /.row -->

        {{--        <!-- Our Customers -->--}}
        {{--        <h2>Our Customers</h2>--}}
        {{--        <div class="row">--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-2 col-sm-4 mb-4">--}}
        {{--                <img class="img-fluid" src="http://placehold.it/500x300" alt="">--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <!-- /.row -->--}}

    </div>
    <!-- /.container -->


@endsection
@section('css') @endsection
@section('js') @endsection
