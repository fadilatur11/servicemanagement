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
        
            <div class="col-md-6 col-lg-3">
                <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                    <a href="{{ url('/ticket?filter='.$getlevel['id']) }}" target="_blank" class="nonedecoration">
                        <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left pr-2 fsize-1">
                                    @php $persentase =  ($status[$loop->index] * 100) @endphp
                                <div class="widget-numbers mt-0 fsize-3 @if($getlevel['id'] == 1) {{'text-danger'}} @elseif($getlevel['id'] == 2) {{'text-warning'}} @elseif($getlevel['id'] == 3) {{'text-success'}} @elseif($getlevel['id'] == 4) {{'text-info'}} @endif">@if($status[$loop->index] == 0){{'0'}}@else{{ round($persentase / $countbar[$loop->index])}}@endif%</div></div>
                                <div class="widget-content-right w-100">
                                    <div class="progress-bar-xs progress">
                                    <div class="progress-bar @if($getlevel['id'] == 1) {{'bg-danger'}} @elseif($getlevel['id'] == 2) {{'bg-warning'}} @elseif($getlevel['id'] == 3) {{'bg-success'}} @elseif($getlevel['id'] == 4) {{'bg-info'}} @endif" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" @if($status[$loop->index] == 0){{'style="width: 0%;"'}}@else{{'style=width:'.round($persentase / $countbar[$loop->index]).'%'}}@endif></div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left fsize-1">
                                <div class="text-muted opacity-6">Finished {{ $status[$loop->index] }} out of {{ $countbar[$loop->index] }}</div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach 
        <input type="hidden" id="levelbar" value="@foreach($levelbar as $getlevelbar) {{$getlevelbar['name']}} @endforeach">
        <input type="hidden" id="countbar" value="@foreach($countbar as $getcountbar) {{ $getcountbar }} @endforeach">
        <input type="hidden" value="{{$countbar[0]}}">
        </div>
        
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i> Bugs Report
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Days</a></li>
                            <li class="nav-item"><a href="javascript:void(0);" class="active nav-link second-tab-toggle">Monthly</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <input type="date" class="form-control width15" value="{{ date('Y-m-d') }}">
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

        </div>

    </div>
@include('layouts.footer')
<script>
    
    $(document).ready(function() {
        const getlevelbar = $("#levelbar").val()
        const arraybar = getlevelbar.split("  ")
        const getcountbar = $("#countbar").val()
        const arraycountbar = getcountbar.split("  ")
        // alert(arraycountbar)
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: arraybar,
                datasets: [{
                    label: 'Priority levels of issues',
                    data: arraycountbar,
                    backgroundColor: [
                        'rgba(217, 37, 80, 1)',
                        'rgba(247, 185, 36, 1)',
                        'rgba(58, 196, 125, 1)',
                        'rgba(22, 170, 255, 1)'
                    ],
                    borderColor: [
                        'rgba(217, 37, 80, 1)',
                        'rgba(247, 185, 36, 1)',
                        'rgba(58, 196, 125, 1)',
                        'rgba(22, 170, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    })
</script>