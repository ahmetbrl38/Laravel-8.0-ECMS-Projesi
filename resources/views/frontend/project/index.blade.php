@extends('frontend.layout')
@section('title','Anasayfa Başlığı')
@section('content')

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h3 class="mt-4 mb-3">Projelerim
        </h3>

        @foreach($data['project'] as $project)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route('project.Detail',$project->project_slug)}}">
                            <img class="img-fluid rounded" src="/images/projects/{{$project->project_file}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title">{{$project->project_title}}</h2>
                        <p class="card-text">{!!($project->project_explanation)!!}</p>
                        <a href="{{route('project.Detail',$project->project_slug)}}" class="btn btn-primary">Devamını Oku &rarr;</a>
                        @if($project['project_status'] == '1')

                            <button style="position: absolute; right:0;" type="button" class="btn btn-success">Tamamlandı</button>


                        @else

                            <button style="position: absolute; right:0;" type="button" class="btn btn-warning text-light">Devam Ediyor</button>

                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                Yayınlanma Tarihi: {{$project->created_at->format('d/m/y - h:i')}}
            </div>
        </div>
        @endforeach
    </div>

@endsection
@section('css') @endsection
@section('js') @endsection
