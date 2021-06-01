@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sayfa Ekleme</h3>
            </div>
            <div class="box-body">
                                <form action="{{route('page.store')}}" method="post"
                                      enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Resim Seç</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="file" required name="page_file">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Başlık</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="page_title">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Slug</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="page_slug">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>İçerik</label>
                    <div class="row">
                        <div class="col-xs-12">
                                    <textarea class="form-control" id="editor1" rows="5"
                                              name="page_content"></textarea>
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="page_status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-success">Ekle</button>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('css') @endsection
@section('js') @endsection
