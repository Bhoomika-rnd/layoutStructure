@extends('admin.layouts.master')
@section('content')
<section class="content">
    @include('partials.errors')
    @include('partials.success')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">Import Form</h4>
                </div>
                <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                    <div class="card-body ">
                      <div class="form-group has-label">
                        <label>
                          Choose Excel File
                        </label>
                        <input class="form-control" name="file" type="file" />
                      </div>

                      <div class="category form-category">* Required fields</div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
</section>


<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>


<script>
    CKEDITOR.replace('lastName');
</script>

@endsection


