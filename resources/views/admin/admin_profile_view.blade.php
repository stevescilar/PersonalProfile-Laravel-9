@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                        <div class="card-body center">
                            <h4 class="card-title">User Profile</h4> <hr>

                            <h4 class="card-title">Name: {{ $adminData->name }}</h4> <hr>
                            <h4 class="card-title">User Name: {{ $adminData->username }}</h4>
                            <h4 class="card-title">User Email: {{ $adminData->email }}</h4>
                            
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile </a>
                        </div>
                </div>
            </div>
        </div>  
    </div>
</div>



@endsection