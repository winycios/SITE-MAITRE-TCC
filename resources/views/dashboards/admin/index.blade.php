@extends('layouts.admin')
@section('content')


<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    
    });
    google.charts.setOnLoadCallback(drawLineChart);
    google.charts.setOnLoadCallback(drawBarChart);
    google.charts.setOnLoadCallback(drawCategoriaRestaurantes);
    google.charts.setOnLoadCallback(drawCategoriaPratos);
    
    function drawLineChart() {
        var data = google.visualization.arrayToDataTable([
            ['', 'basico', 'Medio', 'avançado'],
            ['Jan', 2, 3, 1],
            ['Fev', 3, 2, 1],
            ['Mar', 1, 2, 3],
            ['Abr', 5, 4, 2]
        ]);
    
        var options = {
            title: 'Vendas dos nossos serviços',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
    
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    
        chart.draw(data, options);
    }
    
    function drawCategoriaPratos() {
        var data = google.visualization.arrayToDataTable([
            ['categoria', 'Restaurantes'],
            ['caseiro', 0],
            ['arabe', 2.3],
            ['Mediterraneo', 38],
            ['oriental', 20],
            ['Marmitas', 72],
            ['Italiana', 29],
            ['Lanches', 2.5],
        ]);


        var options = {
            title: 'Categoria de pratos',
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

        var chart = new google.visualization.PieChart(document.getElementById('categoria_restaurantes'));
        chart.draw(data, options);
    }

    function drawCategoriaRestaurantes() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'Categoria dos restaurantes',
            pieHole: 0.4,

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

        var chart = new google.visualization.PieChart(document.getElementById('categoria_pratos'));
        chart.draw(data, options);
    }
    
    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
        ['Mes', 'Usuarios'],
        @php
        $meses = array(
            '01' => "Jan",
            '02' => "Fev",
            '03' => "Mar",
            '04' => "Abr",
            '05' => "Mai",
            '06' => "Junho",
            '07' => "Julho",
            '08' => "Agosto",
            '09' => "Setembro",
            '10' => "Outubro",
            '11' => "Novembro",
            '12' => "Dezembro",
        );
        foreach($users as $u){
           $mes = $meses[$u->mes];
            echo("['".$mes."', ".$u->total."],");
        }
        @endphp
      ]);
    
        var options = {
            chart: {
                title: 'Usuarios cadastrados por mes',
            }
        };
    
        var chart = new google.charts.Bar(document.getElementById('user_chart'));
    
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
    
    
    
    <main>
        <h1>Analise de Dados</h1>
    
        <div class="insi">
            <div id="user_chart" style="height: 450px;"></div>
            <div id="curve_chart" style="height: 450px"></div>
            
        </div>
    
        <!---------------- end insights ---------------->
        <div class="recent-orders">
            <h2>Nossos Clientes</h2>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.min.js"></script>
            <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Numero</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $c)
                    <tr>
                        <td>{{$c->nome}}</td>
                        <td>{{$c->endereco}}</td>
                        <td>{{$c->numero}}</td>
                        <td><a href="#modal" role="button">Excluir dados</a>
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
            <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
            </script>
        </div>
    </main>
    <!----------- end main ABERTA NO MENU.PHP ------------->
    
    <!-- Modal -->
    <div class="modal-wrapper" id="modal">
        <div class="modal-body card">
            <div class="modal-header">
                <h2 class="heading">tem certeza ?</h2>
                <a href="#!" role="button" class="close" aria-label="close this modal">
                    <svg viewBox="0 0 24 24">
                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                    </svg>
                </a>
            </div>
            <h3>Esse dado será excluido permanentemente, tem certeza ?</h3>
    
            <div class="button-center">
                <a href="" class="button button__link">Não</a>
                <a href="" class="button button__link">Sim</a>
            </div>
        </div>
        <a href="#!" class="outside-trigger"></a>
    </div>
    
    
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
                    <p>hey, <b>ADM</b></p>
                    <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                    <img src="/img/logos/atlanticSemfundo.png">
                </div>
            </div>
        </div>
        <div class="sales-analytics">
            
            <div class="item offline">
                <div id="categoria_restaurantes" style="width: 100%; height: 350px;"></div>
            </div>
            <div class="item online">
                <div id="categoria_pratos" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    <!--FECHAMENTO DA DIV CONTAINER, ABERTA EM MENU.PHP-->
    </div>

@endsection