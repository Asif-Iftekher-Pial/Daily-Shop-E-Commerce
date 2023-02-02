@extends('admin.master.master')
@section('main')
    <div class="animate__animated animate__fadeInRightBig animate__delay-1s">
        <div class="section__content section__content--p30" style="padding: 15px">
            <div class="card" id="refresh">
                <div class="container">
                    <div class="row py-4">
                        <div class="container">
                            <h3 class="mb-3 text-center">{{ $data->title }}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="insertTwo" method="post">
                                        @csrf
                                        <div id="example-1" class="content"
                                            data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                            <div class="row">
                                                <div class="col-md-12"><button type="button" id="btnAdd-1"
                                                        class="btn btn-sm mb-3 btn-primary"><i
                                                            class="fa fa-plus-circle"></i></button></div>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                                            <div class="row group">
                                                <div class="col-md-3">
                                                    <label for="size" class="control-label mb-1">Size</label>
                                                    <select class="size form-control" name="size[]">
                                                        <option value="s">S</option>
                                                        <option value="m">M</option>
                                                        <option value="l">L</option>
                                                        <option value="xl">XL</option>
                                                    </select>
                                                    {{-- <input class="form-control" type="text" name="size[]"
                                                        placeholder="eg. S"> --}}
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="stock" class="control-label mb-1">Stock</label>
                                                    <input class="form-control" type="number" name="stock[]"
                                                        placeholder="stock">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="color" class="control-label mb-1">Color</label>
                                                    <input type="color" class="form-control" id="color-field"
                                                        name="color[]">
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="mt-4 btn btn-danger btn-sm btnRemove"><i
                                                            class="fa fa-trash-alt"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class=" my-3 btn attributeInsert btn-sm btn-outline-success">Update</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-hover" id="tableRefresh">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">size</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col">Color</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($attributes) > 0)
                                                @foreach ($attributes as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{ $key + 1 }}</th>
                                                        <td>{{ $item->attribute_size }}</td>
                                                        <td>{{ $item->attribute_stock }}</td>
                                                        <td>{{ $item->attribute_color }}</td>
                                                        <td><a href="{{ $item->id }}"
                                                                class="attributedelete btn btn-sm btn-outline-danger"><i
                                                                    class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <p class="text-danger py-1">No atrribute found for this product</p>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h3 class="mb-3 text-center">Product Images</h3>
                    <div class="row ml-1 my-4">
                        <div class="col-md-6">
                            <form id="insert" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $data->id }}">
                                <label for="image" class="control-label mb-1">Upload multiple Image</label>
                                <input type="file" name="image[]" multiple id="fileInputEdit" class="form-control-file">
                                <button type="submit" class="btn saveButton btn-sm btn-primary mt-2">Upload</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row" id="refresh">
                            @foreach ($data->imageAttribute as $item)
                                <div class="col-md-4">
                                    <div class="card border border-primary"
                                        style="box-shadow: 0 0 10px rgb(132, 177, 255);">
                                        <div><a href="{{ $item->id }}"
                                                class="btn deleteButton btn-sm btn-danger pull-right"><i
                                                    class="fa fa-trash-alt"></i></a></div>
                                        <img src="{{ asset('admin/images/products/attributes/' . $item->attribute_image) }}"
                                            alt="images" srcset="" style="height: 150px;width:317px">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#insert', function(e) {
                e.preventDefault();
                // alert('ok')
                $('.saveButton').html('Uploading...')
                $.ajax({
                    type: "post",
                    url: "{{ route('multipleImage') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);

                        if (response.status == 200) {
                            $('#refresh').load(location.href + ' #refresh');
                            $('.saveButton').text('Upload')
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
                            $('.saveButton').text('Upload')

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
                                icon: 'error',
                                title: response.error
                            })
                        }
                    }
                });
            });

            $(document).on('submit', '#insertTwo', function(e) {
                e.preventDefault();
                // alert('ok')
                $('.attributeInsert').html('Updating...')
                $.ajax({
                    type: "post",
                    url: "{{ route('attribute-management.store') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);

                        if (response.status == 200) {
                            $('#tableRefresh').load(location.href + ' #tableRefresh');
                            $('.attributeInsert').text('Update')
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
                            $('.saveButton').text('Upload')

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
                                icon: 'error',
                                title: response.error
                            })
                        }
                    }
                });
            });



            $(document).on('click', '.deleteButton', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                var url = "{{ route('multipleImageDelete', ':id') }}"
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
                            type: "get",
                            url: url,
                            success: function(response) {
                                $('#refresh').load(location.href + ' #refresh')
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
                            'Your product image is safe',
                            'error'
                        )
                    }
                })

            });

            // attribute delete
            $(document).on('click', '.attributedelete', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                var url = "{{ route('attribute-management.destroy', ':id') }}"
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
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            url: url,
                            success: function(response) {
                                $('#tableRefresh').load(location.href +
                                    ' #tableRefresh');
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
                            'Your attribute is safe',
                            'error'
                        )
                    }
                })

            });
        });
    </script>
@endsection
