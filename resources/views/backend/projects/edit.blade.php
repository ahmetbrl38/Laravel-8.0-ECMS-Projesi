@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Proje Düzenleme</h3>
            </div>
            <div class="box-body">
                <form action="{{route('project.update',$projects->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    @isset($projects->project_file)
                    <div class="form-group">
                        <label>Yüklü Ekran Görüntüsü</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <img width="100" src="/images/projects/{{$projects->project_file}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset
                    <div class="form-group">
                        <label>Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="project_file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Proje Türü</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="project_type"
                                       value="{{$projects->project_type}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Proje Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="project_title"
                                       value="{{$projects->project_title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Proje Açıklaması</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="project_explanation"
                                       value="{{$projects->project_explanation}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="project_slug" value="{{$projects->project_slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Proje Detayları</label>
                        <div class="row">
                            <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1" rows="5"
                                              name="project_content">{{$projects->project_content}}</textarea>
                                <script>
                                    CKEDITOR.replace('editor1');
                                </script>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Proje Durumu</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select name="project_status" class="form-control">
                                        <option {{$projects->project_status=="1" ? "selected=''" : ""}} value="1">Tamamlandı
                                        </option>
                                        <option {{$projects->project_status=="0" ? "selected=''" : ""}} value="0">Devam Ediyor
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="old_file" value="{{$projects->project_file}}">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-success">Güncelle</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
