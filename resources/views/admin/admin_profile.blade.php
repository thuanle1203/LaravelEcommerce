@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Profile</h4>
                <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="">official website </a></h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.profile.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Admin Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required=""
                                                   data-validation-required-message="This field is required"
                                                   value="{{ $editData->email }}">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Admin Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required=""
                                                   data-validation-required-message="This field is required"
                                                    value="{{ $editData->name }}">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Profile Image: <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="profile_photo_path" class="form-control">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img id="showImage" src="{{ (!empty($editData->profile_photo_path))
                                                 ? url('uploads/admin_images/'.$editData->profile_photo_path)
                                                 : url('uploads/no_image.jpg') }}" alt="" style="width: 150px; height: 100px;">
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Update">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
