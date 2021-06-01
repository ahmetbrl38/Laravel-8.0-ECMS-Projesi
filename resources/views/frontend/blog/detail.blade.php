@extends('frontend.layout')
@section('title','Anasayfa Başlığı')
@section('content')
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">{{$blog->blog_title}}
        </h1>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="/images/blogs/{{$blog->blog_file}}" alt="">

                <hr>

                <!-- Date/Time -->
                <small style="color: #6c7375">Yayınlanma Tarihi: {{$blog->created_at->format('d/m/y - h:i')}}</small>

                <hr>

                <p>{!!$blog->blog_content!!}</p>

                <hr>


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

            {{--            <!-- Search Widget -->--}}
            {{--            <div class="card mb-4">--}}
            {{--                <h5 class="card-header">Search</h5>--}}
            {{--                <div class="card-body">--}}
            {{--                    <div class="input-group">--}}
            {{--                        <input type="text" class="form-control" placeholder="Search for...">--}}
            {{--                        <span class="input-group-btn">--}}
            {{--                <button class="btn btn-secondary" type="button">Go!</button>--}}
            {{--              </span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            {{--            <!-- Categories Widget -->--}}
            {{--            <div class="card my-4">--}}
            {{--                <h5 class="card-header">Categories</h5>--}}
            {{--                <div class="card-body">--}}
            {{--                    <div class="row">--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <ul class="list-unstyled mb-0">--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">Web Design</a>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">HTML</a>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">Freebies</a>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-lg-6">--}}
            {{--                            <ul class="list-unstyled mb-0">--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">JavaScript</a>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">CSS</a>--}}
            {{--                                </li>--}}
            {{--                                <li>--}}
            {{--                                    <a href="#">Tutorials</a>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Son Eklenen Yazılar</h5>
                    <ul class="list-group">
                        @foreach($blogList as $list)
                            <a href="{{route('blog.Detail',$list->blog_slug)}}">
                                <li class="list-group-item">{{$list->blog_title}}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

@endsection
@section('css') @endsection
@section('js') @endsection

