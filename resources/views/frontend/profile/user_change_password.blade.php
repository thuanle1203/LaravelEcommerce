@extends('frontend.main_master')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi ... </span><strong>{{ Auth::user()->name }}</strong>
                            Welcom to Online Shop
                        </h3>
                        <h3 class="text-center">User Password Update</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.store') }}">
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
                </div>
            </div>

            @include('frontend.body.brands')
        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>

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
