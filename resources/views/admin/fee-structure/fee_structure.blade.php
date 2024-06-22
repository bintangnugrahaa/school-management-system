@extends('admin.layout')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Fee Structure</h1>
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
              <h3 class="card-title">Add Fee Structure</h3>
            </div>

            <form id="feeStructureForm" action="{{ route('fee-structure.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>Select Academic Year</label>
                    <select name="academic_year_id" class="form-control">
                      <option>Select Academic Year</option>
                      @foreach($academic_year as $academicyear)
                      <option value="{{ $academicyear->id }}">{{ $academicyear->name }}</option>
                      @endforeach
                    </select>
                    @error('academic_year_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Select Class</label>
                    <select name="class_id" class="form-control">
                      <option>Select Class</option>
                      @foreach($class as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                    @error('class_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group col-md-4">
                    <label>Select Fee Head</label>
                    <select name="fee_head_id" class="form-control">
                      <option>Select Fee Head</option>
                      @foreach($fee_head as $feehead)
                      <option value="{{ $feehead->id }}">{{ $feehead->name }}</option>
                      @endforeach
                    </select>
                    @error('fee_head_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="january">January Fee</label>
                    <input type="text" name="january" class="form-control" id="january" placeholder="Enter January fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="february">February Fee</label>
                    <input type="text" name="february" class="form-control" id="february" placeholder="Enter February fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="march">March Fee</label>
                    <input type="text" name="march" class="form-control" id="march" placeholder="Enter March fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="april">April Fee</label>
                    <input type="text" name="april" class="form-control" id="april" placeholder="Enter April fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="may">May Fee</label>
                    <input type="text" name="may" class="form-control" id="may" placeholder="Enter May fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="june">June Fee</label>
                    <input type="text" name="june" class="form-control" id="june" placeholder="Enter June fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="july">July Fee</label>
                    <input type="text" name="july" class="form-control" id="july" placeholder="Enter July fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="august">August Fee</label>
                    <input type="text" name="august" class="form-control" id="august" placeholder="Enter August fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="september">September Fee</label>
                    <input type="text" name="september" class="form-control" id="september" placeholder="Enter September fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="october">October Fee</label>
                    <input type="text" name="october" class="form-control" id="october" placeholder="Enter October fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="november">November Fee</label>
                    <input type="text" name="november" class="form-control" id="november" placeholder="Enter November fee">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="december">December Fee</label>
                    <input type="text" name="december" class="form-control" id="december" placeholder="Enter December fee">
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('fee-structure.read') }}" class="btn btn-warning">Return</a>
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
    $('#feeStructureForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: this.action,
        data: $(this).serialize(),
        success: function() {
          Swal.fire({
            title: 'Success!',
            text: 'Class created successfully',
            icon: 'success',
            timer: 1000,
            showConfirmButton: false
          }).then(function() {
            window.location.href = "{{ route('class.read') }}";
          });
          $('#feeStructureForm')[0].reset();
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