@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Blog Categories | <a href="{{ route('add.category') }}"> Add New Category </a></h4> 

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                                            <li class="breadcrumb-item active">New</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
{{--         
                                        <h4 class="card-title">Portfolio</h4>
                                        <p class="card-title-desc">My Projects</p> --}}
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Blog Category</th>

                                                <th>Action</th>
                                                
                                            </thead>
        
        
                                            <tbody>
                                                @php($i = 1)
                                                @foreach ( $blogCats  as $blogCat )
                                                    
                                               
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td>{{ $blogCat->blog_category }}</td>
                                               
                                                <td>
                                                    <a href="{{ route('edit.blogCat',$blogCat->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('delete.blogCat',$blogCat->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                                
                                            </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
         

    </div>
</div>

@endsection