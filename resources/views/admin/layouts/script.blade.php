<!-- Jquery JS-->
<script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS -->
<script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
{{-- DataTables CDN --}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js">
</script>
{{-- Sweet Alert 2 --}}
<script src="{{ asset('admin/js/sweet-alert-2.js') }}"></script>
{{-- bootstrap 4 toggle --}}
<script src="{{ asset('admin/js/bootstrap4-toggle.min.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    $(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    });
</script>


<!-- include summernote css/js -->

<script src="{{ asset('admin/vendor/summernote/summernote.min.js') }}"></script>
{{-- <script src="{{ asset('admin/vendor/summernote/summernote.min.js.map') }}"></script> --}}

<script src="{{ asset('admin/js/jquery.multifield.min.js') }}"></script>
<script>
  $('#example-1').multifield();
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernotetwo').summernote();
    });
</script>

<script>
    $("#fileInput").change(function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#thumbnail").attr("src", e.target.result);
        $("#thumbnail").show();
      };
      reader.readAsDataURL(this.files[0]);
    });
  </script>
  <script>
    $("#fileInputEdit").change(function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#thumbnailEdit").attr("src", e.target.result);
        $("#thumbnailEdit").show();
      };
      reader.readAsDataURL(this.files[0]);
    });
  </script>
@yield('script')
