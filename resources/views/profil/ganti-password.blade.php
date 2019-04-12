@extends('layouts.default')

@section('title', 'Ganti Password')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Ganti Password</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <form action="" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group {{ $errors->has('passwordLama') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Password Lama</label>
            <div class="col-sm-5 form-entries">
              <input type="password" id="passwordLama" name="passwordLama" value="{{ old('passwordLama') }}" class="form-control">
              @if ($errors->has('passwordLama'))
                <span class="help-block">{{ $errors->first('passwordLama') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('passwordBaru') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Password Baru</label>
            <div class="col-sm-5 form-entries">
              <input type="password" id="passwordBaru" name="passwordBaru" value="{{ old('passwordBaru') }}" class="form-control">
              @if ($errors->has('passwordBaru'))
                <span class="help-block">{{ $errors->first('passwordBaru') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('konfirmasiPasswordBaru') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
            <div class="col-sm-5 form-entries">
              <input type="password" id="konfirmasiPasswordBaru" name="konfirmasiPasswordBaru" value="{{ old('konfirmasiPasswordBaru') }}" class="form-control">
              @if ($errors->has('konfirmasiPasswordBaru'))
                <span class="help-block">{{ $errors->first('konfirmasiPasswordBaru') }}</span>
              @endif
            </div>
          </div>

          <hr/>

          <div class="form-group">
            <div class="col-sm-12 text-right">
              <button type="submit" class="btn btn-primary btn-md">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
