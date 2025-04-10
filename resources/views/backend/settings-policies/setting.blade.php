@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
         <form action="{{url('/admin/site-settings/update')}}" method="POST" enctype="multipart/form-data" class="form-control">
          @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Site Settings</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Phone*</label>
                            <input type="text" name="phone" value="{{$siteSettings->phone}}" class="form-control" required
                                placeholder="Enter Phone Number*">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Email*</label>
                          <input type="email" name="email" value="{{$siteSettings->email}}" class="form-control" required
                              placeholder="Enter Email Address*">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12">
                      <div class="form-group">
                          <label>Address</label>
                          <textarea id="summernote" name="address" required>{{$siteSettings->address}}</textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Facebook*</label>
                          <input type="text" name="facebook" value="{{$siteSettings->facebook}}" class="form-control" 
                              placeholder="Enter facebook url*">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Twitter*</label>
                          <input type="text" name="twitter" value="{{$siteSettings->twitter}}" class="form-control" 
                              placeholder="Enter twitter url*">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Instagram*</label>
                          <input type="text" name="instagram" value="{{$siteSettings->instagram}}" class="form-control" 
                              placeholder="Enter instagram url*">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>YouTube*</label>
                          <input type="text" name="youtube" value="{{$siteSettings->youtube}}" class="form-control" 
                              placeholder="Enter youtube url*">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Home Banner</label>
                          <input type="file" accept="image/*" name="banner" class="form-control">
                      </div>
                      <img src="{{ asset('backend/images/settings/'.$siteSettings->banner) }}" height="200" width="300">
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Home logo</label>
                          <input type="file" accept="image/*" name="logo" class="form-control">
                      </div>
                      <img src="{{ asset('backend/images/settings/'.$siteSettings->logo) }}" height="100" width="150">
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <input type="submit" value="Update" class="form-control btn btn-success">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('js')
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>

    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
