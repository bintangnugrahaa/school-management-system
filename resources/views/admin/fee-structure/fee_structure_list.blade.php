@extends('admin.layout')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="shortcut icon" href="dist/img/logo-univpancasila.png" type="image/x-icon">
@endsection
@section('content')
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Fee Structure</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="card-body">
              <div style="overflow-x: auto;">
                <a href="{{ route('fee-structure.create') }}" style="margin-bottom: 10px !important;" class="btn btn-primary"><i class="fas fa-plus"></i> Add Fee Structure</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Academic Year</th>
                      <th>Class</th>
                      <th>Fee Head</th>
                      <th>January</th>
                      <th>February</th>
                      <th>March</th>
                      <th>April</th>
                      <th>May</th>
                      <th>June</th>
                      <th>July</th>
                      <th>August</th>
                      <th>September</th>
                      <th>October</th>
                      <th>November</th>
                      <th>December</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($fee_structure as $item)
                    <tr>
                      <td>{{$item->AcademicYear->name}}</td>
                      <td>{{$item->Class->name}}</td>
                      <td>{{$item->FeeHead->name}}</td>
                      <td>{{$item->january}}</td>
                      <td>{{$item->february}}</td>
                      <td>{{$item->march}}</td>
                      <td>{{$item->april}}</td>
                      <td>{{$item->may}}</td>
                      <td>{{$item->june}}</td>
                      <td>{{$item->july}}</td>
                      <td>{{$item->august}}</td>
                      <td>{{$item->september}}</td>
                      <td>{{$item->october}}</td>
                      <td>{{$item->november}}</td>
                      <td>{{$item->december}}</td>
                      <td>
                        <a href="{{ route('fee-structure.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('fee-structure.delete', $item->id) }}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Delete</a>
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

</div>
@endsection
@section('customJs')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "scrollX": true, // Enable horizontal scrolling
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection