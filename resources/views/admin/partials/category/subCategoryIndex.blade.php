@extends('admin.master.master')
@section('main')


<div class="col-md-12" style="padding-left: 45px;padding-right:45px">
    <div class="overview-wrap">
        <h2 class="title-1">Sub Category</h2>
        {{-- <button type="button" class="btn pull-right btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
            <i class="zmdi zmdi-plus"></i>   Add New
        </button> --}}
        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
           <i class="zmdi zmdi-plus"></i>  New Sub Category
        </button>
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">New Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <ul id="validation_error">

                    </ul>
                    <form id="insert" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="sub_cat_name" class="control-label mb-1">Sub Category Name</label>
                                <input name="sub_cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group">
                                <label for="cat_name" class="control-label mb-1">Category Name</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach ( $cats as $cat )
                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn insert btn-sm btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- edit --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <ul id="validation_error_update">

            </ul>
            <form id="update" method="post">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sub_cat_name" class="control-label mb-1">Sub Category Name</label>
                        <input name="sub_cat_name" id="sub_cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                        <input name="sub_cat_id" id="sub_cat_id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">
                    </div>
                    <div class="form-group">
                        <label for="cat_name" class="control-label mb-1">Category Name</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ( $cats as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn update btn-sm btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End edit --}}



<div class="animate__animated animate__fadeInRightBig animate__delay-1s">
    <div class="section__content section__content--p30">
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3" id="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Sub Category Name</th>
                                        <th>Slug</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click','.editButton',function (e) { 
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                // alert(id);
                var url = "{{ route('sub-category.edit',":id") }}"
                url = url.replace(':id',id);
                // console.log(url);
                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        // console.log(response);
                        $('#sub_cat_name').val(response.sub_cat_name);
                        $('#sub_cat_id').val(response.id);
                        $('#category_id').val(response.category_id);
                    }
                });
            });

            $(document).on('submit','#update',function (e) { 
                e.preventDefault();
                // alert('ok')
                var id = $('#sub_cat_id').val();
                var url = "{{ route('sub-category.update',":id") }}"
                url = url.replace(':id',id);
                $('.update').text('Updating...');
                $.ajax({
                    type: "post",
                    url: url,
                    data: new FormData(this),
                    cache:false,
                    processData:false,
                    contentType:false,
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 200) {
                            // console.log(response); 
                            $('.modal').modal('hide')
                            $('#table').DataTable().ajax.reload(); // refresh data table
                            $('#update')[0].reset();
                            $('.update').text('Update')
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            })
                        } else {
                            $('.update').text('Update')
                            $('#validation_error_update').html("");
                            $('#validation_error_update').addClass('alert alert-danger ps-4');

                            $.each(response.error, function(key, err_value) {
                                $('#validation_error_update').append('<li>' + err_value +
                                    '</li>');
                            });
                        }
                    }
                });
            });

            $(document).on('submit','#insert',function (e) { 
                e.preventDefault();
                
                $('.insert').text('Saving...')

                $.ajax({
                    type: "post",
                    url: "{{ route('sub-category.store') }}",
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function (response) {
                        if (response.status == 200) {
                            // console.log(response); 
                            $('.modal').modal('hide')
                            $('#table').DataTable().ajax.reload(); // refresh data table
                            $('#insert')[0].reset();
                            $('.insert').text('Save')
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            })
                        } else {
                            $('.insert').text('Save')
                            $('#validation_error').html("");
                            $('#validation_error').addClass('alert alert-danger ps-4');

                            $.each(response.error, function(key, err_value) {
                                $('#validation_error').append('<li>' + err_value +
                                    '</li>');
                            });
                        }
                    }
                });
            });


            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'print',
                        text: 'Print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'XML',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }

                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('sub-category-data') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'sub_cat_name',
                        name: 'sub_cat_name'
                    },
                    {
                        data: 'sub_cat_name_slug',
                        name: 'sub_cat_name_slug'
                    },
                    {
                        data: 'category.cat_name',
                        name: 'category_id'
                    },
                    // {
                    //     data: 'image',
                    //     name: 'image',
                    //     orderable: false,
                    //     searchable: false,
                    //     render: function(data, type, row) {
                    //         return '<img src="{{ asset('images') }}' + '/' + data +
                    //             '" width="80" height="80">';
                    //     }
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });
    </script>
@endsection
