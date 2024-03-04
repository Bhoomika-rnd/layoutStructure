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
                  <h4 class="card-title">Leads Form</h4>
                </div>
                <form method="POST" action="{{ route('leads.update', ['id' => $lead->id]) }}">
                        @csrf
                        @method('PUT')
                    <div class="card-body ">
                      <div class="form-group has-label">
                        <label>
                          First Name *
                        </label>
                        <input class="form-control" name="firstName" type="text"  value="{{ $lead->firstName }}" />
                      </div>
                      <div class="form-group has-label">
                        <label>
                          Last Name *
                        </label>
                        

                         <textarea name="lastName" id="lastName" rows="10" cols="80" >{{ $lead->lastName }}</textarea>


                      </div>
                      <div class="form-group has-label">
                        <label>
                         Email *
                        </label>
                        <input class="form-control" name="email" id="email" type="email" required="true" value="{{ $lead->email }}" />
                      </div>
                      <div class="form-group has-label">
                        <label>
                         Phone *
                        </label>
                        <input class="form-control" name="phone" id="phone" type="phone" required="true"value="{{ $lead->phone }}" />
                      </div>


                      
                      <div class="category form-category">* Required fields</div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
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


