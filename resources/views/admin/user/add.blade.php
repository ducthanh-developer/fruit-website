@extends('admin.layouts.main-layout')

@push('style')
<!-- dropzonejs -->
<link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
@endpush

@push('script')
<!-- dropzonejs -->
<script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
<script>
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
@endpush

@section('page-title')
Th??m ng?????i d??ng
@endsection

@section('content')
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {!! $error !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
@if(Session::has('alert_success'))
<div class="alert alert-success">
    {!! Session::get('alert_success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(Session::has('alert_error'))
<div class="alert alert-danger">
    {!! Session::get('alert_error') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Th??m ng?????i d??ng</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="form-group col-6">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="fullName">T??n ng?????i d??ng</label>
                    <input type="text" id="fullName" name="fullName" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="address">?????a ch???</label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="phoneNumber">S??T</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="dateOfBirth">Ng??y sinh</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="password">M???t kh???u</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="idRole">Quy???n</label>
                    <select id="idRole" class="form-control custom-select" name="idRole">
                        <option selected="" disabled="">Quy???n</option>
                        @foreach ($roleList as $role)
                        <option value="{{$role->idRole}}">{{$role->level}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- <button type="reset" class="btn btn-secondary mr-2">H???y</button> -->
                    <input type="submit" value="Th??m" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
