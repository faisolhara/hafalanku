@extends('layouts.default')

@section('title', 'Hafalan')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Tambah Hafalan</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <form action="{{ $url.'/simpan' }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $model->id }}">
          <div class="form-group {{ $errors->has('tanggalAwal') || $errors->has('suratAwal') || $errors->has('ayatAwal') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Awal</label>
            <div class="col-sm-4 form-entries">
              <?php
              if (count($errors) > 0) {
                $tanggalAwal = !empty(old('tanggalAwal')) ? new \DateTime(old('tanggalAwal')) : null;
              } else {
                  $tanggalAwal = !empty($model->tanggal_awal) ? \App\Services\TimezoneDateConverter::getClientDateTime($model->tanggal_awal) : null;
              }
              ?>
              <div class='input-group date' id="input-group-tanggalAwal">
                  <input type="text" id="tanggalAwal" name="tanggalAwal" value="{{ $tanggalAwal !== null ? $tanggalAwal->format('d-m-Y H:i') : '' }}" class="form-control" readonly="true">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
            <div class="col-sm-4 form-entries">
              <?php
              if (count($errors) > 0) {
                $suratAwal = old('suratAwal');
              } else {
                $objAyatAwal = $model->getAyatAwalHafalan();
                $suratAwal = $objAyatAwal !== null ? $objAyatAwal->surat : '';
              }
              ?>
              <select id="suratAwal" name="suratAwal" class="form-control">
                <option value="">Pilih Surat</option>
                @foreach($optionSurat as $option)
                  <option value="{{ $option->surat }}" {{ $option->surat == $suratAwal ? 'selected' : '' }}>{{ $option->surat }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2 form-entries">
              <?php
              $qb = \DB::table('ayat_alquran')
                          ->select('ayat_alquran.ayat')
                          ->where('ayat_alquran.surat', '=', $suratAwal)
                          ->orderBy('ayat_alquran.ayat', 'asc');

              $optionAyatAwal = $qb->get();

              if (count($errors) > 0) {
                $ayatAwal = old('ayatAwal');
              } else {
                $ayatAwal = $objAyatAwal !== null ? $objAyatAwal->ayat : '';
              }
              ?>
              <select id="ayatAwal" name="ayatAwal" class="form-control">
                <option value="">Pilih Ayat</option>
                @foreach($optionAyatAwal as $option)
                  <option value="{{ $option->ayat }}" {{ $option->ayat == $ayatAwal ? 'selected' : '' }}>{{ $option->ayat }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('tanggalAwal'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('tanggalAwal') }}</span>
            @elseif ($errors->has('suratAwal'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('suratAwal') }}</span>
            @elseif ($errors->has('ayatAwal'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('ayatAwal') }}</span>
            @endif
          </div>

          <div class="form-group {{ $errors->has('tanggalAkhir') || $errors->has('suratAkhir') || $errors->has('ayatAkhir') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label">Akhir</label>
            <div class="col-sm-4 form-entries">
              <?php
              if (count($errors) > 0) {
                $tanggalAkhir = !empty(old('tanggalAkhir')) ? new \DateTime(old('tanggalAkhir')) : null;
              } else {
                $tanggalAkhir = !empty($model->tanggal_akhir) ? \App\Services\TimezoneDateConverter::getClientDateTime($model->tanggal_akhir) : null;
              }
              ?>
              <div class='input-group date' id="input-group-tanggalAkhir">
                  <input type="text" id="tanggalAkhir" name="tanggalAkhir" value="{{ $tanggalAkhir !== null ? $tanggalAkhir->format('d-m-Y H:i') : '' }}" class="form-control" readonly="true">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
            <div class="col-sm-4 form-entries">
              <?php
              if (count($errors) > 0) {
                $suratAkhir = old('suratAkhir');
              } else {
                $objAyatAkhir = $model->getAyatAkhirHafalan();
                $suratAkhir = $objAyatAkhir !== null ? $objAyatAkhir->surat : '';
              }
              ?>
              <select id="suratAkhir" name="suratAkhir" class="form-control">
                <option value="">Pilih Surat</option>
                @foreach($optionSurat as $option)
                  <option value="{{ $option->surat }}" {{ $option->surat == $suratAkhir ? 'selected' : '' }}>{{ $option->surat }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2 form-entries">
              <?php
              $qb = \DB::table('ayat_alquran')
                          ->select('ayat_alquran.ayat')
                          ->where('ayat_alquran.surat', '=', $suratAkhir)
                          ->orderBy('ayat_alquran.ayat', 'asc');

              $optionAyatAkhir = $qb->get();

              if (count($errors) > 0) {
                $ayatAkhir = old('ayatAkhir');
              } else {
                $ayatAkhir = $objAyatAkhir !== null ? $objAyatAkhir->ayat : '';
              }
              ?>
              <select id="ayatAkhir" name="ayatAkhir" class="form-control">
                <option value="">Pilih Ayat</option>
                @foreach($optionAyatAkhir as $option)
                  <option value="{{ $option->ayat }}" {{ $option->ayat == $ayatAkhir ? 'selected' : '' }}>{{ $option->ayat }}</option>
                @endforeach
              </select>
            </div>
            @if ($errors->has('tanggalAkhir'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('tanggalAkhir') }}</span>
            @elseif ($errors->has('suratAkhir'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('suratAkhir') }}</span>
            @elseif ($errors->has('ayatAkhir'))
              <span class="help-block col-sm-10 col-sm-offset-2">{{ $errors->first('ayatAkhir') }}</span>
            @endif
          </div>
          <hr/>
          <div class="form-group">
            <div class="col-sm-12 text-right">
              <a href="{{ URL($url) }}" class="btn btn-warning btn-md">Batal</a>
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
<script type="text/javascript">
$(document).on('ready', function() {
    $('#input-group-tanggalAwal').datetimepicker({format: 'DD-MM-YYYY HH:mm', ignoreReadonly: true, allowInputToggle: true});
    $('#input-group-tanggalAkhir').datetimepicker({format: 'DD-MM-YYYY HH:mm', ignoreReadonly: true, allowInputToggle: true});
    $('#suratAwal').select2();
    $('#ayatAwal').select2();
    $('#suratAkhir').select2();
    $('#ayatAkhir').select2();

    $('#suratAwal').on('change', function() {
      waitingDialog.show('Loading...');
      var surat = $(this).val();
      $.ajax({
        url: '{{ URL($url."/get-ayat-surat") }}',
        method: 'POST',
        data: {surat: surat, _token: "{{ csrf_token() }}",},
        success: function(response) {
            $('#ayatAwal').html('');
            $('#ayatAwal').append('<option value="">Pilih Ayat</option>');
            response.forEach(function(ayat) {
                $('#ayatAwal').append('<option value="' + ayat.ayat + '">' + ayat.ayat + '</option>');
            })
            waitingDialog.hide();
        }
      })
    })

    $('#suratAkhir').on('change', function() {
      waitingDialog.show('Loading...');
      var surat = $(this).val();
      $.ajax({
        url: '{{ URL($url."/get-ayat-surat") }}',
        method: 'POST',
        data: {surat: surat, _token: "{{ csrf_token() }}",},
        success: function(response) {
            $('#ayatAkhir').html('');
            $('#ayatAkhir').append('<option value="">Pilih Ayat</option>');
            response.forEach(function(ayat) {
                $('#ayatAkhir').append('<option value="' + ayat.ayat + '">' + ayat.ayat + '</option>');
            })
            waitingDialog.hide();
        }
      })
    })
})
</script>
@endsection