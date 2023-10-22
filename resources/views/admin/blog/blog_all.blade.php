@extends('admin.admin_master')
@section('admin')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Blogs All Data</h4>

                    

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Blogs</h4>
                       
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Blog Title</th>
                                <th>Blog Image</th>
                                <th>Blog Tags</th>
                                <th>Blog Category</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>


                            <tbody>
                                @php($i = 1)
                                @foreach ($blog as $item)
                                    
                               
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->blog_title }}</td>
                                <td><img src="{{ asset($item->blog_image) }}" style="width: 60px"; height="50px"></td>
                                <td>{{ $item->blog_tags }}</td>
                                <td>{{ $item['category']['blog_category'] }}</td>
                                <td>
                                    
                                <a href="{{ route('edit.blog', $item->id) }}" class="btn btn-info sm" title="edit Data"><i class="far fa-edit"></i></a>
                                <a href="{{route('delete.blog', $item->id)}}" class="btn btn-danger sm" title="delete Data" id="delete"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                           
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

       
        
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection



