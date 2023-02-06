@extends('admin.master.master')
@section('main')
    <div class="col-md-12" style="padding-left: 45px;padding-right:45px">
        <div class="overview-wrap">
            <h2 class="title-1">Promo Management</h2>
            {{-- <button type="button" class="btn pull-right btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
            <i class="zmdi zmdi-plus"></i>   Add New
        </button> --}}
        @php
            $d = app\Models\Promo::count();
         @endphp
         {{-- @dd($d); --}}
        @if (($d > 3))
        
        @else
        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
            <i class="zmdi zmdi-plus"></i> New Promo
        </button>
        @endif
            
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">New Promo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <ul id="validation_error">

                        </ul>
                        <form id="insert" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title" class="control-label mb-1">Title</label>
                                            <input name="title" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="summary" class="control-label mb-1">Summary</label>
                                            <input name="summary" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status" class="control-label mb-1">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="active">Active</option>
                                                <option value="deactive">Deactive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input type="file" name="image" id="fileInput" class="form-control-file">
                                            <img id="thumbnail" style="display: none;" height="250" width="250">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Cancel</button>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Promo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="col-md-12 m-0 p-0">
                    <div id="location">

                    </div>

                </div>

                <ul id="validation_error_update">

                </ul>
                <form id="update" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="modal-body pt-0">

                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="promo_id" id="promo_id">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title</label>
                                    <input name="title" type="text" class="title form-control" aria-required="true"
                                        aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="summary" class="control-label mb-1">Summary</label>
                                    <input name="summary" type="text" class="summary form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <select class="status form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1">Image</label>
                                    <input type="file" name="image" id="fileInputEdit" class="form-control-file">
                                    <img id="thumbnailEdit" class="my-2" style="display: none;" height="250"
                                        width="250">

                                    <label for="" class="form-control">Previous Image</label>
                                    <span id="previous_image">

                                    </span>
                                </div>
                            </div>

                        </div>

                        {{-- <input type="checkbox" data-width="100"  checked data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger"> --}}
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

    {{-- Table --}}
    <div class="animate__animated animate__fadeInRightBig animate__delay-1s">
        <div class="section__content section__content--p30" style="padding: 15px">
            <div class="card">
                <div class="row py-4">
                    <div class="container">
                        <table class="table table-hover" id="refresh">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data) > 0)
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>
                                                <img style="width: 200px"
                                                    src="{{ asset('admin/images/promo/' . $item->image) }}" alt=""
                                                    srcset="">
                                            </td>

                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->summary }}</td>
                                            <td>
                                                <input type="checkbox" data-size="sm" id="statusToggle"
                                                    {{ $item->status == 'active' ? 'checked' : '' }}
                                                    value="{{ $item->id }}" data-toggle="toggle" class="toggle"
                                                    data-on="Active" data-off="Deactive" data-onstyle="success"
                                                    data-offstyle="danger">
                                            </td>
                                            <td class="row">
                                                <a href="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#editModal"
                                                    class="btn editButton btn-sm btn-outline-warning"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ $item->id }}"
                                                    class="deleteButton btn btn-sm btn-outline-danger"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger py-1">No promo found</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 pb-5">
                    <div class="float-right">
                        {{ $data->links() }}
                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        // insert
        $(document).ready(function() {
            // insert
            $(document).on('submit', '#insert', function(e) {
                e.preventDefault();

                $('.insert').text('Saving...')

                $.ajax({
                    type: "post",
                    url: "{{ route('promo-management.store') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 200) {
                            // console.log(response); 
                            $('.modal').modal('hide')
                            $('#insert')[0].reset();
                            $('.insert').text('Save')
                            $('#refresh').load(location.href + ' #refresh', function() {
                                $('.toggle').bootstrapToggle(
                                    'destroy'); // remove existing toggle functionality
                                $('.toggle')
                                    .bootstrapToggle(); // initialize toggle again
                            });

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
        });


        // edit
        $(document).on('click', '.editButton', function(e) {
            e.preventDefault();
            // alert('ok')
            var id = $(this).attr('href');
            // alert(id);
            var url = "{{ route('promo-management.edit', ':id') }}"
            url = url.replace(':id', id);
            // console.log(url);

            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('.title').val(response.title)
                    $('#promo_id').val(response.id)
                    $('.summary').val(response.summary)
                    $('.status').val(response.status)
                    $('#previous_image').html(
                        '<img src="{{ asset('admin/images/promo/') }}' + '/' +
                        response.image + '" width="80" height="80">');

                }
            });
        });

        //update
        $(document).on('submit', '#update', function(e) {
            e.preventDefault();
            // alert('ok')
            var id = $('#promo_id').val();
            var url = "{{ route('promo-management.update', ':id') }}"
            url = url.replace(':id', id);
            // console.log(url);
            $('.update').text('Updating...');
            $.ajax({
                type: "post",
                url: url,
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        // console.log(response); 
                        $('.modal').modal('hide')
                        // $('#table').DataTable().ajax.reload(); // refresh data table
                        $('#refresh').load(location.href + ' #refresh', function() {
                            $('.toggle').bootstrapToggle(
                                'destroy'); // remove existing toggle functionality
                            $('.toggle')
                                .bootstrapToggle(); // initialize toggle again
                        });
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
                            $('#validation_error_update').append('<li>' +
                                err_value +
                                '</li>');
                        });
                    }
                }
            });
        });

        // delete
        $(document).on('click', '.deleteButton', function(e) {
            e.preventDefault();
            // alert('ok')
            var id = $(this).attr('href');
            var url = "{{ route('promo-management.destroy', ':id') }}"
            url = url.replace(':id', id);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-3',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "delete",
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#refresh').load(location.href + ' #refresh', function() {
                                $('.toggle').bootstrapToggle(
                                    'destroy'); // remove existing toggle functionality
                                $('.toggle')
                                    .bootstrapToggle(); // initialize toggle again
                            });
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            )
                        }
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your product is safe',
                        'error'
                    )
                }
            })
        })
        // status
        $(document).on('change', '#statusToggle', function(e) {
            e.preventDefault();
            var mode = $(this).prop('checked')
            // console.log(mode);
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "{{ route('promo-status') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function(response) {
                    if (response.status ==
                        200) {
                        const Toast = Swal
                            .mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (
                                    toast
                                ) => {
                                    toast
                                        .addEventListener(
                                            'mouseenter',
                                            Swal
                                            .stopTimer
                                        )
                                    toast
                                        .addEventListener(
                                            'mouseleave',
                                            Swal
                                            .resumeTimer
                                        )
                                }
                            })

                        Toast.fire({
                            icon: 'success',
                            title: response
                                .message
                        })
                    } else {
                        console.log(response
                            .message);
                    }
                }
            });
        });
    </script>
@endsection
