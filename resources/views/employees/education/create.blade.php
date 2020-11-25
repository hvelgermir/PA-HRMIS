@extends('layouts.adminlte')

@section('styles')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('/css/plugins/daterangepicker/daterangepicker.css') }}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>New Education for: {{ $employee->full_name_surname_first }} : <small class="text-muted"><i>{{ $employee->department->department_name }}</i></small></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Education Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('educations.store', $employee) }}" method="post">
                        @csrf
                        @include('employees.education._educationForm')
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-default mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@section('scripts')
<!-- InputMask -->
<script src="{{ asset('css/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('css/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('css/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('css/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function(){
        //Date range picker
        $('#date_graduated').datetimepicker({
            format: 'YYYY-MM-DD',
        });
    });
</script>
@endsection