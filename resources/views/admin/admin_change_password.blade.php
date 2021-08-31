@extends('admin.admin_master')

@section('admin')
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Change Password</h4>
                <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="">official website </a></h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('update.change.password') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">
                                            <h5>Current Password<span class="text-danger">*</span></h5>
                                        </label>
                                        <input type="password" class="form-control"
                                               name="oldpassword" id="current_password">
                                        @error('oldpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlPassword3">
                                            <h5>New Password<span class="text-danger">*</span></h5>
                                        </label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlPassword3">
                                            <h5>Confirm Password<span class="text-danger">*</span></h5>
                                        </label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                               id="password_confirmation">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
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
@endsection
