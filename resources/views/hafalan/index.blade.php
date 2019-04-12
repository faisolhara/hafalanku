@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Hafalan</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <form action="" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="surat" class="col-xs-4 control-label">Surat</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="surat" name="surat">
                                <option value="" >Pilih Surat</option>
                                @foreach($optionSurat as $option)
                                    <option value="{{ $option->surat }}" {{ !empty($filters['surat']) && $option->surat == $filters['surat'] ? 'selected' : '' }}>{{ $option->surat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="juz" class="col-xs-4 control-label">Juz</label>
                        <div class="col-xs-8">
                            <select class="form-control" id="juz" name="juz">
                                <option value="" >Pilih Juz</option>
                                @foreach($optionJuz as $option)
                                    <option value="{{ $option->juz }}" {{ !empty($filters['juz']) && $option->juz == $filters['juz'] ? 'selected' : '' }}>{{ $option->juz }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tanggalAwal" class="col-xs-4 control-label">Tanggal Awal</label>
                        <div class="col-xs-8">
                            <div class='input-group date' id="input-group-tanggalAwal">
                                <input type="text" id="tanggalAwal" name="tanggalAwal" class="form-control" value="{{ !empty($filters['tanggalAwal']) ? $filters['tanggalAwal'] : '' }}" readonly="true">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggalAkhir" class="col-xs-4 control-label">Tanggal Akhir</label>
                        <div class="col-xs-8">
                            <div class='input-group date' id="input-group-tanggalAkhir">
                                <input type="text" id="tanggalAkhir" name="tanggalAkhir" class="form-control" value="{{ !empty($filters['tanggalAkhir']) ? $filters['tanggalAkhir'] : '' }}" readonly="true">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-success">Cari</button>
                    <a href="{{ URL($url.'/tambah') }}" class="btn btn-primary">Tambah Hafalan</a>
                </div>
            </div>
        </form>
        <hr/>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="70px">No</th>
                    <th width="150px">Tanggal</th>
                    <th width="150px">Waktu</th>
                    <th>Hafalan</th>
                    <th width="100px">#</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($data as $hafalan)
                <?php
                $hafalan = \App\Models\Hafalan::find($hafalan->id);
                $tanggalAwal = new \DateTime($hafalan->tanggal_awal);
                $tanggalAkhir = new \DateTime($hafalan->tanggal_akhir);
                $tanggalAwal = \App\Services\TimezoneDateConverter::getClientDateTime($hafalan->tanggal_awal);
                $tanggalAkhir = \App\Services\TimezoneDateConverter::getClientDateTime($hafalan->tanggal_akhir);
                $intervalMinute = abs($tanggalAwal->getTimestamp() - $tanggalAkhir->getTimestamp()) / 60;
                $ayatAwal = $hafalan->getAyatAwalHafalan();
                $ayatAkhir = $hafalan->getAyatAkhirHafalan();
                ?>
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">{{ $tanggalAwal->format('d-m-Y H:i') }}</td>
                    <td class="text-right">{{ $intervalMinute }} menit</td>
                    <td>
                        {{ $ayatAwal !== null ? $ayatAwal->surat.':'.$ayatAwal->ayat : '' }}
                         - 
                         {{ $ayatAkhir !== null ? $ayatAkhir->surat.':'.$ayatAkhir->ayat : '' }}
                    </td>
                    <td class="text-center">
                        <a href="{{ URL($url.'/ubah/'.$hafalan->id) }}" class="icon icon-circle icon-sm m-b-0"><i class="fa fa-edit"></i></a>
                        <a href="#" data-id="{{ $hafalan->id }}" data-label="{{ $tanggalAwal->format('d-m-Y H:i') }}" class="icon icon-circle icon-sm m-b-0 btn-delete"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="data-table-toolbar">
            {!! $data->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div id="modal-delete" class="modal fade" tabindex="-1" role="dialog">
    <form action="{{ URL($url.'/hapus') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" id="delete-id" name="id" />
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Hafalan</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus hafalan <span id="delete-label"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-primary">Ya</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
$(document).on('ready', function() {
    $('#surat').select2();
    $('#juz').select2();
    $('#input-group-tanggalAwal').datetimepicker({format: 'DD-MM-YYYY', ignoreReadonly: true, allowInputToggle: true, showClear: true});
    $('#input-group-tanggalAkhir').datetimepicker({format: 'DD-MM-YYYY', ignoreReadonly: true, allowInputToggle: true, showClear: true});

    $('.btn-delete').on('click', function() {
        $('#delete-id').val($(this).data('id'));
        $('#delete-label').html($(this).data('label'));
        $('#modal-delete').modal('show');
    });
})
</script>
@endsection