@if (Session::has('success'))
  <div class="alert alert-success" id="success_msg">
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
    </strong>
    {{ Session::get('success') }}
  </div>
@endif
