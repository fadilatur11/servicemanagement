@include('layouts.header')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                    </div>
                    <div>Analytics Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
        @foreach ($level as $getlevel)
            @php $persentase =  $finished[$loop->index] * 100 ; @endphp
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                    <a href="{{ url('/ticket?filter='.$getlevel['id']) }}" target="_blank" class="nonedecoration">
                        <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                <div class="widget-numbers mt-0 fsize-3 @if($getlevel['id'] == 1) {{'text-danger'}} @elseif($getlevel['id'] == 2) {{'text-warning'}} @elseif($getlevel['id'] == 3) {{'text-success'}} @elseif($getlevel['id'] == 4) {{'text-info'}} @endif">
                                    @if($finished[$loop->index] == 0){{'0'}}@else{{ round($persentase / $cardcount[$loop->index])}}@endif%</div>
                                </div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                    <div class="progress-bar @if($getlevel['id'] == 1) {{'bg-danger'}} @elseif($getlevel['id'] == 2) {{'bg-warning'}} @elseif($getlevel['id'] == 3) {{'bg-success'}} @elseif($getlevel['id'] == 4) {{'bg-info'}} @endif" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" @if($finished[$loop->index] == 0){{'style="width: 0%;"'}}@else{{'style=width:'.round($persentase / $cardcount[$loop->index]).'%'}}@endif></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Finished {{ $finished[$loop->index] }} out of {{ $cardcount[$loop->index] }}</div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach 
        <input type="hidden" id="levelbar" value="@foreach($level as $getlevelbar) {{$getlevelbar['name']}} @endforeach">
        <input type="hidden" id="progress" value="@foreach($level as $getIdLevel) {{$progress[$loop->index]}} @endforeach">
        <input type="hidden" id="finished" value="@foreach($level as $getlevelid) {{$finished[$loop->index]}} @endforeach">
        <input type="hidden" id="closed" value="@foreach($level as $getid) {{$closed[$loop->index]}} @endforeach">
        <input type="hidden" id="statusProject" value="@foreach($statusProject as $getStatus) {{$getStatus['name']}} @endforeach">
        </div>
        
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Bugs Report
                        </div>
                        <div class="nav bawah15">
                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Project
                        </div>
                        <div class="nav bawah15">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="myJob"></canvas>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>

    </div>
@include('layouts.footer')
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var data = {
  labels: $("#levelbar").val().split("  "),
  datasets: [{
    label: "In Progress",
    backgroundColor: "#f6b93b",
    data: $("#progress").val().split("  ")
  }, {
    label: "Finished",
    backgroundColor: "#27ae60",
    data: $("#finished").val().split("  ")
  }, {
    label: "Closed",
    backgroundColor: "#3c6382",
    data: $("#closed").val().split("  ")
  }]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }]
    }
  }
});


var myjob = document.getElementById("myJob").getContext('2d');
var pieChart = new Chart(myjob, {
  type: 'pie',
  data: {
    labels: $("#statusProject").val().split("  "),
    datasets: [{
      backgroundColor: [
        "#f1c40f",
        "#e67e22",
        "#2980b9",
        "#34495e",
      ],
      data: [{{ $projectProgress }}, {{ $projectHold }}, {{ $projectRejected }}, {{ $projectClosed }}]
    }]
  }
});

</script>