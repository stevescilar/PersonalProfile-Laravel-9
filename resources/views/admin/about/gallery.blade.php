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
                           Gallery Page (My Tools of Work)
                        </h4> <br> <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{-- {{ route('update.about') }} --}}
                            @csrf          
                            {{-- image profile --}}
                            <div class="row mb-3">   
                                <label for="input" class="col-sm-2 col-form-label">Portfolio</label>
                                <div class="col-sm-10">
                                    <input name="about_img" type="file" class="form-control" id="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{url('upload/no_image.jpg') }}" alt=""  class="rounded avatar-lg">
                                </div>
                                
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio">
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