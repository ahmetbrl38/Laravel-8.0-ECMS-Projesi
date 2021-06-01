@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Projelerim</h3>
                <div align="right">
                    <a href="{{route('project.create')}}">
                        <button class="btn btn-success" style="height: 30px">Ekle</button>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>Proje Türü</th>
                        <th>Proje Adı</th>
                        <th>Açıklama</th>
                        <th>Durumu</th>

                    </tr>
                    <tbody id="sortable">
                    @foreach($data['project'] as $project)
                        <tr id="item-{{$project->id}}">
                            <td>{{$project->created_at->format('m/y')}}</td>
                            <td style="font-weight: 520;">{{$project['project_type']}}</td>
                            <td class="sortable">{{$project['project_title']}}</td>
                            <td>{!! substr($project->project_explanation,0,86)!!}
                                @if(strlen($project['project_explanation'])>86)
                                    ...
                                @endif</td>
                            @if($project['project_status'] == '1')

                                <td><span style="display: block; width: 75px;"
                                          class="label label-success">Tamamlandı</span></td>

                            @else

                                <td><span style="display: block; width: 75px;"
                                          class="label label-warning">Devam Ediyor</span></td>

                            @endif
                            <td width="5"><a href="{{route('project.edit',$project->id)}}"><i
                                        class="fa fa-pencil-square"></i></a>
                            </td>
                            <td width="5">
                                <a href="javascript:void(0)"><i id="{{$project->id}}" class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </thead>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $('#sortable').sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('project.Sortable')}}",
                        success: function (msg) {
                            console.log(msg);
                            if (msg) {
                                alert("işlem başarılı");
                            } else {
                                alert("işlem başarısız");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });

        // composer dump-autoload
        // php artisan cache:clear
        // php artisan config:clear
        // php artisan route:clear
        // php artisan view:clear

        $(".fa-trash-o").click(function () {
            destroy_id = $(this).attr('id');

            alertify.confirm('Veriyi silmek istediğinize emin misiniz?', 'Bu işlem geri alınamaz!',
                function () {

                    $.ajax({

                        type: "DELETE",
                        url: "project/" + destroy_id,
                        success: function (msg) {

                            if (msg) {
                                $('#item-' + destroy_id).remove();
                                alertify.success('Silme işlemi başarılı.');


                            } else {

                                alertify.error("İşlem Tamamlanamadı")

                            }

                        }

                    });

                },
                function () {

                    alertify.error('Silme işlemi iptal edildi.');

                }
            )
        });

    </script>
@endsection
@section('css') @endsection
@section('js') @endsection
