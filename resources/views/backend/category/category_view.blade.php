@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>                    <div class="d-inline-block align-items-center">
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
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Category En</th>
                                        <th>Category Vi</th>
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr>
                                            <td>{{ $item->category_name_en }}</td>
                                            <td>{{ $item->category_name_vi }}</td>
                                            <td><i class="{{ $item->category_icon }}"></i></td>
                                            <td>
                                                <a title="Edit Data" href="{{ route('category.edit',$item->id) }}"
                                                   class="btn btn-primary">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a title="Delete Data" href="{{ route('category.delete',$item->id) }}" id="delete"
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
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" class="form-control"
                                           name="category_name_en" id="category_name_en">
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Category Name VietNamese<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="category_name_vi" class="form-control" id="category_name_vi">
                                    @error('category_name_vi')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlPassword3">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                    </label>
                                    <input type="text" name="category_icon" class="form-control"
                                           id="category_icon">
                                    @error('category_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary btn-rounded mb-5" value="Add New">
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
