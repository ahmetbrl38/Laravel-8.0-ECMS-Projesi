@extends('frontend.layout')
@section('title','Anasayfa Başlığı')
@section('content')


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Bize Ulaşın</h1>
        <hr>


        @if (session()->has('success'))
            <div class="alert alert-danger">
               <p>{{session('success')}}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-8 mb-4">
                <form method="POST">
                    @CSRF
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Ad Soyad</label>
                            <input type="text" name="name" placeholder="Ad Soyad" class="form-control">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mail</label>
                            <input type="email" name="email" placeholder="Mail" class="form-control" required>
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Telefon</label>
                            <input type="text" name="phone" placeholder="Telefon" class="form-control" required>
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mesaj</label>
                            <textarea rows="10" cols="100" class="form-control" name="message" required
                                      data-validation-required-message="Please enter your message" maxlength="999"
                                      style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>İletişim</h3>
                <p>
                    {!! $adres !!}
                    <br>
                    {{$ilçe}} / {{$il}}
                    <br>
                </p>
                <p>
                    Telefon: {{$phone_gsm}}
                </p>
                <p>
                    Email: {{$mail}}
                </p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->



@endsection
@section('css') @endsection
@section('js') @endsection
