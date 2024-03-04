@extends('admin.layouts.master')
@section('content')
<section class="content">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DataTables.net</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar  -->
                            <a href="{{ url('/leads/create') }}"class="btn btn-primary">Create</a>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($leads as $lead)
                                <tr id="leadRow{{$lead->id}}">
                                    <td>{{ $lead->firstName }} </td>
                                    

                                    <!-- <td>{!! Illuminate\Support\Str::limit(preg_replace('/&nbsp;/', ' ', strip_tags($lead->lastName)), $limit = 100, $end = '...') !!}</td> -->

                                    
                                    <td>{!! $lead->lastName !!}</td>
  

                                    <td>{{ $lead->email }}</td>
                                    <td>{{ $lead->phone }}</td>
                                    <td>
                                       <a  href="{{ route('leads.edit', $lead->id) }}" class="btn btn-round btn-warning btn-icon btn-sm"><i class="far fa-calendar-alt"></i></a>


                                        <a class="btn btn-round btn-danger btn-icon btn-sm" id="deleteButton{{$lead->id}}" data-id="{{$lead->id}}"><i class="fas fa-times" style="color: white;"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
  
    <script>
    // Add event listener to delete buttons
    document.querySelectorAll('.btn-danger').forEach(btn => {
        btn.addEventListener('click', function() {
            const leadId = this.getAttribute('data-id');
            console.log(leadId);
            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then((result) => {
                console.log(result);
                //return;
                if (result) {
                    deleteLead(leadId);
                }
            });
        });
    });

    //Function to delete the lead via AJAX
    function deleteLead(leadId) {
        console.log('Deleting lead with ID:', leadId);
        console.log('{{ route('leads.destroy', '') }}' + '/' + leadId);
        $.ajax({
             url: '{{ route('leads.destroy', '') }}' + '/' + leadId,
           // url : 'http://layoutstructure.com/leads/delete/13',
            method: 'DELETE', // Use DELETE method for deletion
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#leadRow' + leadId).remove();
                swal({
                    title: 'Success!',
                    text: 'Lead deleted successfully.',
                    type: 'success',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false
                });
            },
            error: function(xhr, status, error) {
                swal({
                    title: 'Error!',
                    text: 'An error occurred while deleting the data.',
                    type: 'error',
                    confirmButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                });
            }
        });
    }
</script>
</section>
@endsection