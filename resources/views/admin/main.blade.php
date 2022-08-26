@extends('admin.layout')

@section('custom_js')

@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 ml-5 mt-3">
                    <div style="height: 300px; width: 600px">
                        <canvas id="myChart" ></canvas>
                    </div>
                </div>
                <div class="col-md-3 ml-5">
                    <div style="height: 400px; width: 300px">
                        <canvas id="newChart" ></canvas>
                    </div>
                </div>
            <div class="col-lg-3 col-5">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($users) }}</h3>

                        <p>Зареєстровано користувачів</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            </div>

            <div class="row">
                <div class="col-md-5 ml-5 mt-3">
                    <div style="height: 300px; width: 600px">
                        <canvas id="myDevice" ></canvas>
                    </div>
                </div>
            </div>



        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [`@foreach ($schedules as $key => $scheduleDate) {{date('d. m', strtotime($key))}} `, ` @endforeach`],
                datasets: [{
                    label: 'Кількість сеансів за наступні 14 днів',
                    data: [`@foreach ($schedules as $schedule) {{count($schedule)}} `, ` @endforeach`],
                    backgroundColor: 'green',
                    borderColor: 'green',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('newChart');
        const newChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Чоловіки', 'Жінки', 'Не зазнечено'],
                datasets: [{
                    data: [`{{ count($men) }}`, '{{ count($women) }}', '{{ count($else) }}'],
                    backgroundColor: [
                        'blue',
                        'red',
                        'green',
                        ],
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx3 = document.getElementById('myDevice');
        const myDevice = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: [`@foreach ($information as $key => $inform) {{date('d. m', strtotime($key))}} `, ` @endforeach`],
                datasets: [{
                    label: "Комп'ютери",
                    data: [`@foreach ($informDesktop as $inform) {{count($inform)}} `, ` @endforeach`],
                    backgroundColor: 'green',
                    borderColor: 'green',
                    borderWidth: 1
                },
                    {
                        label: 'Мобільні',
                        data: [`@foreach ($informMobile as $informMob) {{count($informMob)}} `, ` @endforeach`],
                        backgroundColor: 'orange',
                        borderColor: 'orange',
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    </script>

@endsection
