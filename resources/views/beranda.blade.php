@extends('layouts.default')

@section('title', 'Dashboard')

@section('stylesheets')
@parent
<style>
.form-group.progress-juz, .form-group.progress-juz .progress {
  margin-bottom: 0px
}
.form-group.progress-juz .progress {
  margin-top: 2px;
}
.form-horizontal .progress-juz .control-label {
  padding-top: 0px;
}
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Perkembangan Hafalan</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <div id="chart-perkembangan-hafalan" style="height: 300px;"></div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="widget">
      <header class="widget-header">
        <h4 class="widget-title">Persentase Hafalan Per Juz</h4>
      </header>
      <hr class="widget-separator">
      <div class="widget-body">
        <form action="" method="POST" class="form-horizontal">
            <div class="row">
                <div class="col-sm-6">
                    @for($juz = 1; $juz <= 15; $juz++)
                      <?php
                      $stringJuz = $persentaseHafalan[$juz-1]['juz'];
                      $persentase = $persentaseHafalan[$juz-1]['persentase'];
                      ?>
                      <div class="form-group progress-juz">
                          <label for="juz{{ $juz }}" class="col-xs-3 control-label">{{ $stringJuz }}</label>
                          <div class="col-xs-9">
                            <div class="progress">
                              <?php
                                if ($persentase < 50) {
                                  $progressClass = 'progress-bar-warning';
                                } elseif ($persentase >= 50 && $persentase < 100) {
                                  $progressClass = 'progress-bar-success';
                                } else {
                                  $progressClass = 'progress-bar-primary';
                                }
                              ?>
                              <div class="progress-bar {{ $progressClass }} progress-bar-striped" role="progressbar" style="width: {{ $persentase }}%;">
                                {{ $persentase }} %
                              </div>
                            </div>
                          </div>
                      </div>
                    @endfor
                </div>
                <div class="col-sm-6">
                    @for($juz = 15; $juz <= 30; $juz++)
                      <?php
                      $stringJuz = $persentaseHafalan[$juz-1]['juz'];
                      $persentase = $persentaseHafalan[$juz-1]['persentase'];
                      ?>
                      <div class="form-group progress-juz">
                          <label for="juz{{ $juz }}" class="col-xs-3 control-label">{{ $stringJuz }}</label>
                          <div class="col-xs-9">
                            <div class="progress">
                              <?php
                                if ($persentase < 50) {
                                  $progressClass = 'progress-bar-warning';
                                } elseif ($persentase >= 50 && $persentase < 100) {
                                  $progressClass = 'progress-bar-success';
                                } else {
                                  $progressClass = 'progress-bar-primary';
                                }
                              ?>
                              <div class="progress-bar {{ $progressClass }} progress-bar-striped" role="progressbar" style="width: {{ $persentase }}%;">
                                {{ $persentase }} %
                              </div>
                            </div>
                          </div>
                      </div>
                    @endfor
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
  $('#chart-perkembangan-hafalan').chart({
      tooltip : {
          trigger: 'axis'
      },
      legend: {
          data:['Total Ayat yang Telah Dihafal']
      },
      xAxis : [
          {
              type : 'category',
              boundaryGap : false,
              data : {!! json_encode($perkembanganHafalan['bulan']) !!}
          }
      ],
      yAxis : [
          {
              type : 'value'
          }
      ],
      series : [
          {
              name:'Total Ayat yang Telah Dihafal',
              type:'line',
              smooth:true,
              itemStyle: {normal: {areaStyle: {type: 'default'}}},
              data: {!! json_encode($perkembanganHafalan['totalAyat']) !!}
          }
      ]
  });
})
</script>
@endsection