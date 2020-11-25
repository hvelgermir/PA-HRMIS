@extends('layouts.adminlte')

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/css/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Department</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-body">
                    <form action="{{ route('departments.update', $department) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('administration.departments._departmentsForm', ['buttonText' => 'Update'])
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
<script>

</script>
@endsection