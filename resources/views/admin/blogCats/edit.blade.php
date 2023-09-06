@extends('admin.admin_master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" >
                           Edit Blog Category
                        </h4> <br> <br>
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            {{-- updateing using specific id --}}
                            <input type="hidden" name="id" value="{{ $blogCats->id }}"> 

                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Blog Category</label>
                                <div class="col-sm-10">
                                    <input name="blog_category" type="text" class="form-control" value="{{ $blogCats->blog_category }}">
                                   
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection