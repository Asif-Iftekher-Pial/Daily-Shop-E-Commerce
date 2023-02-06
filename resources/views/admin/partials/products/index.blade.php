@extends('admin.master.master')
@section('main')
    <div class="col-md-12" style="padding-left: 45px;padding-right:45px">
        <div class="overview-wrap">
            <h2 class="title-1">Product Management</h2>
            {{-- <button type="button" class="btn pull-right btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                <i class="zmdi zmdi-plus"></i>   Add New
            </button> --}}
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                <i class="zmdi zmdi-plus"></i> New Product
            </button>
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">New Product</h5>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category" class="control-label mb-1">Select Category</label>
                                            <select class="form-control" name="category_id" id="parent_category">
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_category_id" class="control-label mb-1">Select Child
                                                category</label>
                                            <select class="form-control" name="sub_category_id" id="child_category"
                                                disabled>
                                                <option value="">Select an option</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title" class="control-label mb-1">Product Name</label>
                                            <input name="title" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input name="price" type="number" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="offer_price" class="control-label mb-1">Offer Price</label>
                                            <input name="offer_price" type="number" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="total_stock" class="control-label mb-1">Total Stock</label>
                                            <input name="total_stock" type="number" class="form-control"
                                                aria-required="true" aria-invalid="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="summary" class="control-label mb-1">Summery</label>
                                            <input name="summary" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="choice" class="control-label mb-1">Choice</label>
                                            <select class="form-control" name="choice">
                                                <option value="popular">Popular</option>
                                                <option value="feature">Feature</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="conditions" class="control-label mb-1">Condition</label>
                                            <select class="form-control" name="conditions">
                                                <option value="sale">Sale</option>
                                                <option value="hot">Hot</option>
                                            </select>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <textarea name="description" id="summernote" class="form-control" cols="10" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image" class="control-label mb-1">Image</label>
                                            <input type="file" name="image" id="fileInput"
                                                class="form-control-file">
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
                    <h5 class="modal-title" id="mediumModalLabel">Edit Product</h5>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Select Category</label>
                                    <select class="form-control" name="category_id" id="category_edit">
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_category_id" class="control-label mb-1">Select Child
                                        category</label>
                                    <select class="form-control sub_category_id" name="sub_category_id"
                                        id="sub_category_id" disabled>
                                        <option value="">Select an option</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" name="product_id" id="product_id">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Product Name</label>
                                    <input name="title" type="text" class="title form-control" aria-required="true"
                                        aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price" class="control-label mb-1">Price</label>
                                    <input name="price" type="number" class="price form-control" aria-required="true"
                                        aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="offer_price" class="control-label mb-1">Offer Price</label>
                                    <input name="offer_price" type="number" class="offer_price form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="total_stock" class="control-label mb-1">Total Stock</label>
                                    <input name="total_stock" type="number" class=" total_stock form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="summary" class="control-label mb-1">Summery</label>
                                    <input name="summary" type="text" class=" summary form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="choice" class="control-label mb-1">Choice</label>
                                    <select class="choice form-control" name="choice">
                                        <option value="popular">Popular</option>
                                        <option value="feature">Feature</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="conditions" class="control-label mb-1">Condition</label>
                                    <select class="conditions form-control" name="conditions">
                                        <option value="sale">Sale</option>
                                        <option value="hot">Hot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Description</label>
                                    <textarea name="description" id="summernotetwo" class="form-control summernotetwo" cols="10" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
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





    <div class="animate__animated animate__fadeInRightBig animate__delay-1s">
        <div class="section__content section__content--p30" style="padding: 15px">
            <div class="card" id="refresh">
                <div class="row py-4">
                    @foreach ($products as $item)
                        <div class="col-md-3">
                            <div class="card" style="box-shadow: 0px 0px 10px 0px #0e6cf8;">
                                <img src="{{ asset('admin/images/products/' . $item->image) }}"
                                    alt="..."style="height: 100px">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <span>৳{{ $item->offer_price }}</span> ৳<del
                                            class="text-danger">{{ $item->price }}</del>
                                    </div>

                                    <h5 class="card-title">{{ minimize_title($item->title) }}</h5>

                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <label for="">condition</label>
                                            <label class="switch switch-text switch-primary switch-pill">
                                                <input type="checkbox" id="condition_statusToggle"
                                                    {{ $item->conditions == 'sale' ? 'checked' : '' }}
                                                    value="{{ $item->id }}" class="switch-input">
                                                <span data-on="Sale" data-off="Hot" class="switch-label"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="">choice</label>
                                            <input type="checkbox" data-size="xs" id="choice_statusToggle"
                                                {{ $item->choice == 'popular' ? 'checked' : '' }}
                                                value="{{ $item->id }}" data-toggle="toggle" class="toggle"
                                                data-on="Popular" data-off="Feature" data-onstyle="outline-warning"
                                                data-offstyle="info">

                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <a href="{{ $item->id }}" data-toggle="modal" data-target="#editModal"
                                            class="btn editButton btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                                            <input type="checkbox" data-size="sm" id="statusToggle"
                                            {{ $item->status == 'active' ? 'checked' : '' }} value="{{ $item->id }}"
                                            data-toggle="toggle" class="toggle" data-on="Active" data-off="Deactive"
                                            data-onstyle="success" data-offstyle="danger">


                                        <a href="{{ $item->id }}" class="btn btn-sm deleteButton btn-danger"><i
                                                class="fa fa-trash"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 pb-5">
                    <div class="float-right">
                        {{ $products->links() }}
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {


            // delete products
            $(document).on('click', '.deleteButton', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                var url = "{{ route('product-management.destroy', ':id') }}"
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
                                $('#refresh').load(location.href + ' #refresh',
                                    function() {
                                        $('.toggle').bootstrapToggle(
                                            'destroy'
                                            ); // remove existing toggle functionality
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

            // insert
            $(document).on('submit', '#insert', function(e) {
                e.preventDefault();

                $('.insert').text('Saving...')

                $.ajax({
                    type: "post",
                    url: "{{ route('product-management.store') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 200) {
                            // console.log(response); 
                            $('.modal').modal('hide')
                            $('#table').DataTable().ajax.reload(); // refresh data table
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
            // edit
            $(document).on('click', '.editButton', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                // alert(id);
                var url = "{{ route('product-management.edit', ':id') }}"
                url = url.replace(':id', id);
                // console.log(url);

                var attrurl = "{{ route('product-attributes',':id') }}"
                attrurl = attrurl.replace(':id', id);
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        // console.log(response);
                        $('.title').val(response.title)
                        $('#product_id').val(response.id)
                        $('.price').val(response.price)
                        $('.offer_price').val(response.offer_price)
                        $('.total_stock').val(response.total_stock)
                        $('.summary').val(response.summary)
                        $('.choice').val(response.choice)
                        $('.status').val(response.status)
                        $('.conditions').val(response.conditions)
                        $('#category_edit').val(response.category_id)
                        $('.sub_category_id').prop('disabled', false);
                        $('.summernotetwo').summernote('code', response.description);
                        $('#previous_image').html(
                            '<img src="{{ asset('admin/images/products/') }}' + '/' + response.image + '" width="80" height="80">');
                        $('#location').html('<a href="'+attrurl+'" class="btn btn-sm btn-success float-right mr-3 mt-3"><i class="fa fa-plus-circle"></i></a>')

                    }
                });
            });
            // update
            $(document).on('submit', '#update', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $('#product_id').val();
                var url = "{{ route('product-management.update', ':id') }}"
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
            // child category
            $('#parent_category').on('change', function() {
                // alert('changed')
                var category_id = $(this).val();
                var url = "{{ route('getChildCategory', ':category_id') }}",
                    url = url.replace(':category_id', category_id);

                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        // console.log(response);
                        $('#child_category').prop('disabled', false);
                        $('#child_category').empty();
                        $.each(response, function(index, item) {
                            $("#child_category").append("<option value='" + item.id +
                                "'>" + item.sub_cat_name + "</option>");
                        });
                    }
                });
            })

            // Edit child category
            $('#category_edit').on('change', function() {
                // alert('changed')
                var category_id = $(this).val();
                var url = "{{ route('getChildCategoryEdit', ':category_id') }}",
                    url = url.replace(':category_id', category_id);

                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        // console.log(response);
                        $('.sub_category_id').prop('disabled', false);
                        $('.sub_category_id').empty();
                        $.each(response, function(index, item) {
                            $(".sub_category_id").append("<option value='" + item.id +
                                "'>" + item.sub_cat_name + "</option>");
                        });
                    }
                });
            })
            $(document).on('change', '#statusToggle', function(e) {
                e.preventDefault();
                var mode = $(this).prop('checked')
                // console.log(mode);
                var id = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('product-status') }}",
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

            // choice status
            $(document).on('change', '#choice_statusToggle', function(e) {
                e.preventDefault();
                var mode = $(this).prop('checked')
                // console.log(mode);
                var id = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('product-choice-status') }}",
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
            // choice status
            $(document).on('change', '#condition_statusToggle', function(e) {
                e.preventDefault();
                var mode = $(this).prop('checked')
                //  console.log(mode);
                var id = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{ route('product-condition-status') }}",
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

        });
    </script>
@endsection
