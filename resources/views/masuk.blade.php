@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="simple-page-form animated flipInY">
    <h4 class="form-title m-b-xl text-center">Silahkan masuk ke akun anda</h4>
    <form method="POST" action="">
        {{ csrf_field() }}
        <input type="hidden" id="timezoneOffset" name="timezoneOffset" value="{{ old('timezoneOffset') }}">

        <div class="form-group">
            <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
        </div>
        <div class="form-group">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
        </div>
        @if($errors->has('errorMessage'))
            <span class="help-block text-center text-danger">{{ $errors->first('errorMessage') }}</span>
        @endif

        <input type="submit" class="btn btn-primary" value="MASUK">
    </form>
</div>

<div class="simple-page-footer">
    <p>
        <small>Belum mempunyai akun ?</small>
        <a href="{{ URL('/daftar') }}">DAFTAR</a>
    </p>
</div>
@endsection

@section('scripts')
@parent
<script>
$(document).on('ready', function(){
    var time = new Date();
    var timezoneOffset = -time.getTimezoneOffset();
    $('#timezoneOffset').val(timezoneOffset);
});
</script>
@endsection