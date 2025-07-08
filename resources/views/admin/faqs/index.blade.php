@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>FAQs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">FAQs</li>
            </ol>
        </nav> 
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertMsg" style="display: none">
            FAQ deleted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
 
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">FAQ List</h5>
                            <div>
                                <a href="{{ route('faqs.create') }}" class="btn btn-primary">Add FAQ</a>
                            </div>
                        </div>
                        <table class="table datatable text-capitalize ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($faqs as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->question }}</td>
                                        <td>{{ $value->answer }}</td>
                                        <td>{{ $value->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('faqs.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a> 
                                            <button class="btn btn-danger btn-sm deleteData" data-id="{{ $value->id }}"
                                                data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close custom-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary custom-close">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Custom close icon or cancel button
        $(document).on('click', '.custom-close', function() {
            $('#confirmDeleteModal').modal('hide');
        });
        // You can also add an Esc key fallback if needed:
        $(document).on('keyup', function(e) {
            if (e.key === "Escape") {
                $('#confirmDeleteModal').modal('hide');
            }
        });
    });
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // When delete button is clicked, get the ID
        $(document).on('click', '.deleteData', function() {
            var id = $(this).data('id');
            $('#confirmDelete').data('id', id);
        });

        $(document).on('click', '#confirmDelete', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ route('faqs.delete', ':id') }}".replace(':id', id),
                success: function(data) {
                    $('#confirmDeleteModal').modal('hide');
                    $('#alertMsg').show().delay(3000)
                .fadeOut(); // Show the alert message- Show for 3 seconds and fade out
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting item:', error);
                }
            });
        });
    });
</script>
@endsection
