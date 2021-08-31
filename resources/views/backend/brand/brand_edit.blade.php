@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Data Tables</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Tables</li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- Edit Brand -->
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('brand.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $brand->id }}" name="id">
                                <input type="hidden" name="old_img" value="{{ $brand->brand_img }}">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" class="form-control" value="{{ $brand->brand_name_en }}"
                                           name="brand_name_en" id="brand_name_en">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Brand Name VietNam<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="brand_name_vi" class="form-control" id="brand_name_vi"
                                           value="{{ $brand->brand_name_vi }}">
                                    @error('brand_name_vi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Brand Image<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="file" name="brand_img" class="form-control"
                                           id="brand_img">
                                    @error('brand_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ asset($brand->brand_img) }}" alt=""
                                         style="width: 300px; height: 200px; margin-top: 20px;">
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Edit  Brand">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
