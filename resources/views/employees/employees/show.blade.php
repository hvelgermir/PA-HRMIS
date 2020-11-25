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
            <div class="col-sm-6 col-md-12 d-flex justify-content-start">
                <h1>{{ $employee->full_name_surname_first }} : <small class="text-muted"><i>{{ $employee->department->department_name }}</i></small></h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <!-- Information -->
    <div class="row">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Employee Information</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" value="{{ $employee->lname }}" id="last-name" name="lname" readonly>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control" value="{{ $employee->fname }}" id="first-name" name="fname" readonly>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="middle-name">Middle Name</label>
                            <input type="text" class="form-control" value="{{ $employee->mname }}" id="middle-name" name="mname" readonly>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="dob">DOB</label>
                            <input type="text" class="form-control" value="{{ $employee->dob }}" id="dob" name="dob" readonly>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" value="{{ $employee->gender }}" id="gender" name="gender" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Education -->
    <div class="row">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Education</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <a href=" {{ route('educations.create', $employee) }} " class="btn btn-info mr-1 btn-sm">Add New Education</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <table id="employee_education_table" class="table table-bordered table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Level</th>
                                    <th>School</th>
                                    <th>Date Graduated</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($employee->education as $education)
                                        <tr>
                                            <td>{{ $education->id }}</td>
                                            <td>{{ $education->level }}</td>
                                            <td>{{ $education->school_name }}</td>
                                            <td>{{ $education->date_graduated }}</td>
                                            <td>
                                                <a href="{{ route('educations.edit', $education) }}" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" id="btnDelete"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<!-- Delete Modal -->
<div class="modal fade" id="modal-delete" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Education</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this item?</p>
            <p id="message"></p>
            <p id="id"></p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <form style="display:inline" action="#" method="post" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ asset('/css/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/css/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/css/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/css/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('css/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('css/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('css/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('css/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function () {
        var t = $('#employee_education_table').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "columnDefs": [{
                        "targets": 4,
                        "orderable": false
                    }]
                });
        $('#employee_education_table tbody').on( 'click', 'button#btnDelete', function () {
            var data = t.row($(this).parents('tr')).data();
            document.getElementById("id").value = data[0];
            document.getElementById("message").innerHTML = "<b>" + data[2] + "</b>?";
            $('#delete-form').attr('action', '/educations/' + data[0]);
            $('#modal-delete').modal('show');
        });
    });
</script>
@endsection