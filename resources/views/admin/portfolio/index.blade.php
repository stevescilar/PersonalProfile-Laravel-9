@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">My Portfolio | <a href="{{ route('add.portfolio') }}"> Add to Portfolio </a></h4> 

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                            <li class="breadcrumb-item active">All</li>
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
                                                <th>Portfolio Name</th>
                                                <th>Portfolio Title</th>
                                                <th>Portfolio Image</th>
                                                {{-- <th>Portfolio Description</th> --}}

                                                <th>Action</th>
                                                
                                            </thead>
        
        
                                            <tbody>
                                                @php($i = 1)
                                                @foreach ( $portfolios  as $portfolio )
                                                    
                                               
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td>{{ $portfolio->portfolio_name }}</td>
                                                <td>{{ $portfolio->portfolio_title }}</td>
                                                <td> <img src="{{ asset($portfolio->portfolio_image ) }}"  style="width: 60px; height: 60px;">  </td>
                                                {{-- <td>{{ $portfolio->portfolio_desc }}</td> --}}

                                                <td>
                                                    <a href="{{ route('edit.portfolio',$portfolio->id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('delete.portfolio',$portfolio->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i></a>
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