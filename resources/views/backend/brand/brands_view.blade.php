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

                <div class="col-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Brand List <span class="badge badge-pill badge-danger"> {{ count($brands) }} </span></h3>                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Vi</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $item)
                                        <tr>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_vi }}</td>
                                            <td><img src="{{ asset($item->brand_img) }}" alt=""
                                                style="width: 70px; height: 40px"></td>
                                            <td>
                                                <a title="Edit Data" href="{{ route('brand.edit',$item->id) }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a title="Delete Data" href="{{ route('brand.delete',$item->id) }}" id="delete"
                                                   class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Brand -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">
                                        <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" class="form-control"
                                           name="brand_name_en" id="brand_name_en">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Brand Name VietNamese<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="brand_name_vi" class="form-control" id="brand_name_vi">
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
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Add Brand">
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
