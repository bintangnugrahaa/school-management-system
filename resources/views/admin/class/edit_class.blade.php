@extends('admin.layout')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Class</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Class</h3>
            </div>

            <form id="classForm" action="{{ route('class.update') }}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $classes->id }}">
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Class Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Class" value="{{ old('name', $classes ->name) }}">
                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('class.read') }}" class="btn btn-warning">Return</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('customJs')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function() {
    $('#classForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: this.action,
        data: $(this).serialize(),
        success: function() {
          Swal.fire({
            title: 'Success!',
            text: 'Class updated successfully',
            icon: 'success',
            timer: 1000,
            showConfirmButton: false
          }).then(function() {
            window.location.href = "{{ route('class.read') }}";
          });
          $('#classForm')[0].reset();
        },
        error: function(xhr) {
          const errorMessages = xhr.responseJSON?.errors ?
            Object.values(xhr.responseJSON.errors).map(error => error[0]).join('<br>') :
            'Something went wrong.';
          Swal.fire({
            title: 'Error!',
            html: errorMessages,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    });
  });
</script>
@endsection