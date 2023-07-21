@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
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
        
                                        <h4 class="card-title">All Images for skills</h4>
                                        <p class="card-title-desc">Icons of the skills i got</p>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                                
                                            </thead>
        
        
                                            <tbody>
                                                @php($i = 1)
                                                @foreach ( $images as $image)
                                                    
                                               
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td> <img src="{{ asset($image -> multi_img) }}"  style="width: 60px; height: 60px;">  </td>

                                                <td>
                                                    <a href="" class="btn btn-info sm" title="Edit Image"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger sm" title="Delete Image"><i class="fas fa-trash-alt"></i></a>
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