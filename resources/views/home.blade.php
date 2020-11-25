@extends('layouts.adminlte')

@section('styles')
<style>
    canvas {
    width: 100%;
    height: auto;
}
</style>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Employees</span>
                    <span class="info-box-number">{{ $employee_count }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="far fa-building"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Departments</span>
                    <span class="info-box-number">{{ $department_count }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-user-lock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number">{{ $user_count }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Employee Distribution</h3>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="400"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $keys !!},
        datasets: [{
            backgroundColor: 'rgba(0,100,255, .4)',
            label: 'Employees',
            data: {!! $values !!},
            borderColor: 'rgba(0,100,255, .7)',
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
@endsection
