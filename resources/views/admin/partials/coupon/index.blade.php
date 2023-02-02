@extends('admin.master.master')
@section('main')
    <div class="col-md-12" style="padding-left: 45px;padding-right:45px">
        <div class="overview-wrap">
            <h2 class="title-1">Coupon Management</h2>
            {{-- <button type="button" class="btn pull-right btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
            <i class="zmdi zmdi-plus"></i>   Add New
        </button> --}}
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                <i class="zmdi zmdi-plus"></i> New Coupon
            </button>
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">New Coupon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <ul id="validation_error">

                        </ul>
                        <form id="insert" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="control-label mb-1">Coupon Name</label>
                                            <input name="title" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="code" class="control-label mb-1">Code</label>
                                            <input name="code" type="text" class="form-control" aria-required="true"
                                                aria-invalid="false">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="control-label mb-1">Choose Discount
                                                Type:</label><br>
                                            Percent : <input type="checkbox" name="percent" id="percent"
                                                style="display: "><br>
                                            Money : <input type="checkbox" name="money" id="money" style="display: ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <input style="display: none" type="number" class="form-control percent"
                                                name="percent_discount_value" placeholder="percent_discount_value">
                                            <input style="display: none" type="number" class="form-control money"
                                                name="money_discount_value" placeholder="money_discount_value">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="expiration_date" class="control-label mb-1">Expiration Date</label>
                                    <input name="expiration_date" type="date" class="form-control" aria-required="true"
                                        aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Coupon</h5>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Coupon Name</label>
                                    <input name="title" id="title" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                    <input name="coupon_id" id="coupon_id" type="hidden" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code" class="control-label mb-1">Code</label>
                                    <input name="code" id="code" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Choose Discount Type:</label><br>
                                    Percent : <input type="checkbox" class="editPercentCheckbox" name="percent"
                                        id="percent" style="display: "><br>
                                    Money : <input type="checkbox" class="editMoneyCheckbox" name="money"
                                        id="money" style="display: ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <input style="display: none" type="number" class="form-control percent"
                                        name="percent_discount_value" id="percent_discount_value"
                                        placeholder="percent_discount_value">
                                    <input style="display: none" type="number" class="form-control money"
                                        name="money_discount_value" id="money_discount_value"
                                        placeholder="money_discount_value">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="expiration_date" class="control-label mb-1">Expiration Date</label>
                            <input name="expiration_date" id="expiration_date" type="date" class="form-control"
                                aria-required="true" aria-invalid="false">
                        </div>

                        <div class="form-group">
                            <label for="status" class="control-label mb-1">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
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
                                            <th>#ID</th>
                                            <th>Title</th>
                                            <th>Code</th>
                                            <th>percent</th>
                                            <th>Money</th>
                                            <th>Status</th>
                                            <th>Expire Date</th>
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
        $(document).ready(function() {

            $(document).on('click', '.editButton', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                // alert(id);
                var url = "{{ route('coupon-management.edit', ':id') }}"
                url = url.replace(':id', id);
                // console.log(url);
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        console.log(response);

                        if (response.percent_discount_value != null) {
                            $('.editPercentCheckbox').attr('checked', true); //checkbox appear
                            $('#percent_discount_value').show();
                            $('#percent_discount_value').val(response.percent_discount_value);

                            $('.editMoneyCheckbox').hide(); //checkbox hide
                            $('#money_discount_value').hide();
                        } else {
                            $('#money_discount_value').show();
                            $('.editMoneyCheckbox').attr('checked', true); //checkbox appear
                            // $('#money_discount_value').show();
                            $('#money_discount_value').val(response.money_discount_value);

                            $('.editPercentCheckbox').hide(); //checkbox hide
                            $('#percent_discount_value').hide();
                        }


                        $('#title').val(response.title);
                        $('#coupon_id').val(response.id);
                        $('#code').val(response.code);
                        $('#status').val(response.status);

                        dateValue = response.expiration_date
                        dateValue = dateValue.slice(0, 10)
                        $('#expiration_date').val(dateValue);
                    }
                });
            });

            $(document).on('submit', '#update', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $('#coupon_id').val();
                var url = "{{ route('coupon-management.update', ':id') }}"
                url = url.replace(':id', id);
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
                            $('#table').DataTable().ajax.reload(function() {
                                $('.toggle').bootstrapToggle(
                                'destroy'); // remove existing toggle functionality
                                $('.toggle').bootstrapToggle();
                            }); // refresh data table
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

            $(document).on('submit', '#insert', function(e) {
                e.preventDefault();

                $('.insert').text('Saving...')

                $.ajax({
                    type: "post",
                    url: "{{ route('coupon-management.store') }}",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            // console.log(response); 
                            $('.modal').modal('hide')
                            // $('#table').DataTable().ajax.reload(); // refresh data table
                            $('#table').DataTable().ajax.reload(function() {
                                $('.toggle').bootstrapToggle(
                                'destroy'); // remove existing toggle functionality
                                $('.toggle').bootstrapToggle();
                            }); // refresh data table
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


                    },

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
                ajax: '{{ route('coupon-data') }}',

                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'percent_discount_value',
                        name: 'percent_discount_value',
                        render: function(data, type, row) {
                            return '<h5>' + data + ' %</h5>';
                        }
                    },
                    {
                        data: 'money_discount_value',
                        name: 'money_discount_value',
                        render: function(data, type, row) {
                            return '<h5>BDT: ' + data + '</h5>';
                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            var checked = (row.status == 'active') ? 'checked' : '';
                            return '<input type="checkbox" value="' + row.id + '" ' +
                                checked +
                                '  name="toogle" class="toggle" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" >';
                        }
                    },
                    {
                        data: 'expiration_date',
                        name: 'expiration_date',
                        render: function(data, type, row) {
                            var dateValue = data;
                            dateValue = dateValue.slice(0, 10); // slice the time value
                            return dateValue;
                        }
                        
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],

                initComplete: function() {
                    // initialize toggle after table is loaded
                    // Status Toggle after initializing toggle button
                    // $('.toggle').bootstrapToggle();

                    $('input[name=toogle]').change(function() {
                        var mode = $(this).prop('checked');
                        var id = $(this).val();
                        // console.log(id);
                        $.ajax({
                            type: "post",
                            url: "{{ route('coupon-data-status') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                mode: mode,
                                id: id
                            },
                            success: function(response) {
                                // console.log(response);
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
                            },
                            error: function(xhr, status,
                                error) {
                                console.log(xhr
                                    .responseText);
                            }
                        });

                    });
                },
                drawCallback: function() {
                    $('.toggle').bootstrapToggle('destroy'); // remove existing toggle functionality
                    $('.toggle').bootstrapToggle(); // initialize toggle again
                    $('input[name=toogle]').change(function() {
                        var mode = $(this).prop('checked');
                        var id = $(this).val();
                        // console.log(id);
                        $.ajax({
                            type: "post",
                            url: "{{ route('coupon-data-status') }}",
                            data: {
                                _token: '{{ csrf_token() }}',
                                mode: mode,
                                id: id
                            },
                            success: function(response) {
                                // console.log(response);
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
                            },
                            error: function(xhr, status,
                                error) {
                                console.log(xhr
                                    .responseText);
                            }
                        });

                    });
                }

            });





            $(document).on('change', '#percent', function(e) {
                e.preventDefault();
                // alert('ok')
                if (this.checked) {
                    $('#money').hide()
                    $('.percent').show()
                } else {
                    $('#money').show()

                    $('.money').hide()
                    $('.percent').hide()
                }
            });

            $(document).on('change', '#money', function(e) {
                e.preventDefault();
                // alert('ok')
                if (this.checked) {
                    $('#percent').hide()
                    $('.money').show()
                } else {
                    $('#percent').show()

                    $('.percent').hide()
                    $('.money').hide()
                }
            });

            $(document).on('click', '.deleteButton', function(e) {
                e.preventDefault();
                // alert('ok')
                var id = $(this).attr('href');
                var url = "{{ route('coupon-management.destroy', ':id') }}"
                url = url.replace(':id', id)
                console.log(url);
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
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                swalWithBootstrapButtons.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                )
                                $('#table').DataTable().ajax.reload(function() {
                                    $('.toggle').bootstrapToggle(
                                    'destroy'); // remove existing toggle functionality
                                    $('.toggle').bootstrapToggle();
                                }); // refresh data table
                            }
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your file is safe :)',
                            'error'
                        )
                    }
                })
            });

        });
    </script>
@endsection
