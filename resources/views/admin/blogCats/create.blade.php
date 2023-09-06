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
                           Add New Blog Category
                        </h4> <br> <br>
                        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Blog Category</label>
                                <div class="col-sm-10">
                                    <input name="blog_category" type="text" class="form-control">
                                   @error('blog_category')
                                        <span class="text-danger">  {{ $message}} </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- script of image loading and preview --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

 
@endsection