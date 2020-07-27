<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">

            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <b>Services Management Projects</b>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Critical', 'Major', 'Normal', 'Minor'],
            datasets: [{
                label: 'Priority levels of issues',
                data: [12, 19, 3, 5],
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
</script>
</body>

</html>