@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="simple-page-form animated flipInY" id="signup-form">
    <h4 class="form-title m-b-xl text-center">Selamat datang</h4>
    <form method="POST" action="">
        <div class="form-group">
            <input id="name" name="name" type="text" class="form-control" placeholder="Nama" value="{{ old('name') }}" autofocus>
            @if($errors->has('name'))
                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <input id="email" name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <span class="help-block text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
            @if($errors->has('password'))
                <span class="help-block text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <input id="confirmPassword" name="confirmPassword" type="password" class="form-control" placeholder="Konfirmasi Password" value="{{ old('confirmPassword') }}">
            @if($errors->has('confirmPassword'))
                <span class="help-block text-danger">{{ $errors->first('confirmPassword') }}</span>
            @endif
        </div>

        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="DAFTAR">
    </form>
</div>

<div class="simple-page-footer">
    <p>
        <small>Sudah punya akun ?</small>
        <a href="{{ URL('/masuk') }}">MASUK</a>
    </p>
</div>
@endsection