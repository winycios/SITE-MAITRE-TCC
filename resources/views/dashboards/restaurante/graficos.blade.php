@extends('layouts.restaurante-adm')
@section('content')

<script>
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawMultSeries);

    function drawMultSeries() {
        var data = google.visualization.arrayToDataTable([
            ['Pratos', 'Mais pedidos'],
            ['Feijuca, pesado', 8175000],
            ['Coxinha da asa, frango', 3792000],
            ['Baiao de dois, Regional', 2695000],

        ]);

        var options = {
            chartArea: {
                width: '50%'
            },
            hAxis: {
                title: 'Mais pedidos',
                minValue: 0,
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
                titleTextStyle: {
                    color: '#677483',
                    fontSize: '16',
                    fontName: 'arial',
                }
            },
            vAxis: {
                title: 'Pratos',
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
                titleTextStyle: {
                    color: '#677483',
                    fontSize: '16',
                    fontName: 'arial',
                }
            },
            legend: {
                position: 'bottom',
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
            },
            chartArea: {
                backgroundColor: {
                    fill: '--color-background',
                    fillOpacity: 0
                },
            },

            backgroundColor: {
                fill: '--color-background',
                fillOpacity: 0
            },

            titleTextStyle: {
                color: '#677483',
                fontSize: '16',
                fontName: 'arial',
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

<!-- pizza 3d-->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['categoria', 'Restaurantes'],
            ['caseiro', 13],
            ['arabe', 2.3],
            ['Mediterraneo', 38],
            ['oriental', 20],
            ['Marmitas', 72],
            ['Italiana', 29],
            ['Lanches', 2.5],
        ]);

        var options = {
            legend: 'none',
            pieSliceText: 'label',
            slices: {
                4: {
                    offset: 0.2
                },
                12: {
                    offset: 0.3
                },
                14: {
                    offset: 0.4
                },
                15: {
                    offset: 0.5
                },
            },
            legend: {
                position: 'bottom',
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
            },
            chartArea: {
                backgroundColor: {
                    fill: '--color-background',
                    fillOpacity: 0
                },
            },

            backgroundColor: {
                fill: '--color-background',
                fillOpacity: 0
            },

            titleTextStyle: {
                color: '#677483',
                fontSize: '16',
                fontName: 'arial',
            },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<!--grafico de linha-->
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'reserva'],
            @php
            $diaSemana = array(
                '1' => "Dom",
                '2' => "Seg",
                '3' => "Ter",
                '4' => "Qua",
                '5' => "Qui",
                '6' => "Sex",
                '7' => "Sab",
            );
            foreach($reservas as $r){
            $dia = $diaSemana[$r->diaSemana];
                echo("['".$dia."', ".$r->total."],");
            }
            @endphp
        ]);

        var options = {
            title: 'Reservas(Por semana)',
            curveType: 'function',
            legend: {
                position: 'bottom',
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
            },
            chartArea: {
                backgroundColor: {
                    fill: '--color-background',
                    fillOpacity: 0
                },
            },

            backgroundColor: {
                fill: '--color-background',
                fillOpacity: 0
            },

            titleTextStyle: {
                color: '#677483',
                fontSize: '16',
                fontName: 'arial',
            },

        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>

<!--grafico de barra-->
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Avaliação(estrelas)', 'usuarios'],
            ['1', 2],
            ['2', 5],
            ['3', 3],
            ['4', 7],
            ['5', 10]
        ]);

        var options = {
            chart: {
                title: 'Avaliação geral dos clientes',
            },
            legend: {
                position: 'bottom',
                textStyle: {
                    color: '#677483',
                    fontSize: 16
                },
            },
            chartArea: {
                backgroundColor: {
                    fill: '--color-background',
                    fillOpacity: 0
                },
            },

            backgroundColor: {
                fill: '--color-background',
                fillOpacity: 0
            },

            titleTextStyle: {
                color: '#677483',
                fontSize: '16',
                fontName: 'arial',
            },
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>


<main>
    <h1>Análise de Dados</h1>

    <div class="insi">
        <div id="curve_chart" class="grafico"></div>
        <div id="columnchart_material" class="grafico"></div>
    </div>

    <div class="recent-orders">
        <h2 class="text-muted">Pratos mais pedidos</h2>
        <div class="graficoBorder">
            <div class="graficoPrato" id="chart_div"></div>
        </div>
    </div>
</main>
<!----------- end main ABERTA NO MENU.PHP ------------->


<!--light and white mode-->
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
        </button>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        <div class="profile">
            <div class="info">
                <p>hey, <b>{{Auth::user()->name}}</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="/img/logos/atlanticSemFundo.png">
            </div>
        </div>
    </div>

    <div class="sales-analytics">
        <h2 class="text-muted">Categorias mais populadas</h2>
        <div class="item offline">
            <div id="piechart" class="graficoCat"></div>
        </div>
        <a href="">
            <div class="item online">
                <div class="icon">
                    <span class="material-icons-sharp">analytics</span>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Gerar relatório</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
</div>

@endsection