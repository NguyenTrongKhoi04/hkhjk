@extends('users.body.main')

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Your JSON of Store Format</h4>
                <button class="btn btn-success btn-icon-split btn-create" data-toggle="modal" data-target="#permissionModal">
                    <span class="text">Add Store Format</span>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Tag</th>
                                <th>Description</th>
                                <th>Data</th>
                                <th>Date Store</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Tag</th>
                                <th>Description</th>
                                <th>Data</th>
                                <th>Date Store</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>2011/01/25</td>
                                <td>$112,000</td>
                                <td>
                                    <button href="#" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Read & Edit">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                    <button href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel"
        aria-hidden="true">
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='permissionModalLabel'><b>Add Store Format</b></h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>

                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary' id='saveChanges'>Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $('.btn-create').click(function() {
            $.ajax({
                url: "{{ route('create.save.format') }}",
                success: function(response) {
                    console.log(response);
                    $('.modal-body').empty().html(response.html);
                    $('#permissionModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                },
                complete: function() {
                    console.log('oke');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
            }
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                info: false,
                pagingType: "full",
                pageLength: 10,
                ajax: {
                    url: "{{ route('get.save') }}",
                    data: function(d) {
                        d.search.value = $('#search').val();
                        d.length = $('#dataTable').DataTable().page.len();
                        d.order = d.order;
                    }
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'tag',
                        name: 'tag'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'date_store',
                        name: 'date_store'
                    },
                    {
                        data: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                searching: false,
                sorting: false,
            });

            $('#dataTable_filter input').on('keyup change', function() {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
            });
        });
    </script>
@endpush
