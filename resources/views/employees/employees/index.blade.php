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
                <h1>Employees</h1>
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
                    <h3 class="card-title">List of Employees</h3>
                    <div class="card-tools">
                        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">Add New Employee</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="employees_table" class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($employees_list as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->full_name_surname_first }}</td>
                                    <td>{{ $employee->department->department_name }}</td>
                                    <td>
                                        <a href="{{ route('employees.show',$employee->id) }}" class="btn btn-default btn-sm"><i class="far fa-file-alt"></i></a>
                                        <button class="btn btn-danger btn-sm" id="btnDelete"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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
            <h4 class="modal-title">Delete Employee</h4>
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
<script>
    $(function () {
        var t = $('#employees_table').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "columnDefs": [{
                        "targets": 3,
                        "orderable": false
                    }]
                });

        $('#employees_table tbody').on( 'click', 'button#btnDelete', function () {
            var data = t.row($(this).parents('tr')).data();
            document.getElementById("id").value = data[0];
            document.getElementById("message").innerHTML = "<b>" + data[1] + "</b>?";
            $('#delete-form').attr('action', '/employees/' + data[0]);
            $('#modal-delete').modal('show');
        });
    });
</script>
@endsection