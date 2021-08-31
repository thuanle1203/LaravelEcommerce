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

                <div class="col-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit Category</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" class="form-control" value="{{ $category->category_name_en }}"
                                           name="category_name_en" id="category_name_en">
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Category Name VietNamese<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="category_name_vi" value="{{ $category->category_name_vi }}"
                                           class="form-control" id="category_name_vi">
                                    @error('category_name_vi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="category_icon" value="{{ $category->category_icon }}"
                                           class="form-control" id="category_icon">
                                    @error('category_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Edit">
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
