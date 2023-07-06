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
                            Edit Your Personal Profile
                        </h4> <br> <br>
                        <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control"  value="{{ $editData->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" value="{{ $editData->email}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input name="username" type="text" class="form-control"  value="{{ $editData->username}}">
                                </div>
                            </div>
                            {{-- image profile --}}
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input name="profile_image" type="file" class="form-control" id="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt=""  class="rounded avatar-lg">
                                </div>
                                
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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