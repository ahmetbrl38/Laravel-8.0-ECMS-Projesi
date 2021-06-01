@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sayfalar</h3>
                <div align="right">
                    <a href="{{route('page.create')}}">
                        <button class="btn btn-success" style="height: 30px">Ekle</button>
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Kapak Resmi</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($data['page'] as $page)
                        <tr id = "item-{{$page->id}}">
                            <td class="sortable"><img style="border-radius: 15px;" width="100"
                                                      src="/images/pages/{{$page->page_file}}" alt="">
                            </td>
                            <td class="sortable">{{$page['page_title']}}</td>
                            <td>{!! substr($page->page_content,0,98) !!}...</td>
                            <td width="5"><a href="{{route('page.edit',$page->id)}}"><i class="fa fa-pencil-square"></i></a></td>
                            <td width="5">
                                <a href="javascript:void(0)"><i id="{{$page->id}}" class="fa fa-trash-o"></i></a>
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
        $(function(){

            $.ajaxSetup({
                headers:{
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
                        url: "{{route('page.Sortable')}}",
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

                    type:"DELETE",
                    url:"page/"+destroy_id,
                    success: function (msg){

                        if (msg){
                            $('#item-'+destroy_id).remove();
                            alertify.success('Silme işlemi başarılı.');


                        }
                        else{

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
