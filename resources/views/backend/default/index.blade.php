@extends('backend.layout')
@section('content')
    <section class="content-header">
        <h1>
            Pano
            <small>İstatistikler</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{route('blog.index')}}">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$blogCounter}}</h3>

                            <p>Blog Yazıları</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{route('project.index')}}">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$projectCounter}}</h3>

                            <p>Projelerim</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                @if(Auth::user()->role == 'admin')
                    <a href="{{route('user.index')}}">
                        @else
                            <a href="javascript:void(0)">
                                @endif
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3>{{$userCounter}}</h3>

                                            <p>Kullanıcılar</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                    </div>
                                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <a href="{{route('page.index')}}">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$pageCounter}}</h3>

                            <p>Sayfa Sayısı</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-paperclip"></i>
                        </div>
                    </div>
                </a>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Devam Eden Projelerim</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($data2['project'] as $project)
                        @if($project['project_status'] == '0')
                            <li class="item">
                                <tr id="item-{{$project->id}}">
                                    <div class="product-img">
                                        <img style="border-radius: 10px;" width="100"
                                             src="/images/projects/{{$project->project_file}}"
                                             alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('project.edit',$project->id)}}"
                                           class="product-title">{{$project->project_title}}
                                            <span style="font-size:13px;"
                                                  class="label label-primary pull-right">{{$project['project_type']}}</span>
                                        </a>
                                        <span class="product-description">
                          {!! substr($project->project_explanation,0,170)!!}
                                            @if(strlen($project['project_explanation'])>170)
                                                ...
                                            @endif
                        </span>
                                    </div>
                                </tr>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{route('project.index')}}" class="uppercase">Tüm Projeleri Görüntüle</a>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.row2 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Son Eklenen Yazılar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($data1['blog'] as $blog1)
                        <li class="item">
                            <div class="product-img">
                                <img src="/images/blogs/{{$blog1->blog_file}}" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="{{route('blog.edit',$blog1->id)}}" class="product-title">{{$blog1->blog_title}}
                                    <div class="pull-right">
                                    <span style="font-size:13px;"
                                          class="label label-primary">{{$blog1->created_at->format('d/m/y')}}</span>

                                        <span style="font-size:13px; padding-left: 5px;"
                                              class="label label-warning">{{$blog1->created_at->format('H:i')}}</span>
                                    </div>
                                </a>
                                <span class="product-description">
                          {!! substr($blog1->blog_content,0,100) !!}
                        </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{route('blog.index')}}" class="uppercase">Tüm Yazıları Göster</a>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
