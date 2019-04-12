@extends('layouts.default')

@section('title', 'Profilku')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Profilku</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Nama</label>
            <div class="col-sm-5 form-entries">
              <input type="text" id="nama" name="nama" value="{{ count($errors) > 0 ? old('nama') : $model->name }}" class="form-control">
              @if ($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-5 form-entries">
              <input type="text" id="email" name="email" value="{{ count($errors) > 0 ? old('email') : $model->email }}" class="form-control">
              @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Photo</label>
            <div class="col-sm-5 form-entries">
              <?php
                $imgSrc = !empty($model->photo) ? $model->photo : '200x200.png';
              ?>
              <img src="{{ asset('images/users/'.$imgSrc) }}" id="showPhoto" style="cursor: pointer;" />
              <input type="file" id="photo" name="photo" class="hidden" />
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

@section('scripts')
@parent
<script type="text/javascript" >
$(document).on('ready', function() {
    $("#photo").change(function () {
        readURL(this);
    });

    $("#showPhoto").on('click', function () {
        $('#photo').click();
    });
})

var readURL = function(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#showPhoto').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection