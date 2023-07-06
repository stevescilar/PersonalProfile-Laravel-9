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
                            Update your Password


                        </h4> <br> <br>

                        @if (count($errors))
                            @foreach ( $errors->all() as $error )
                                <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                            @endforeach    
                        @endif
                        <form action="{{ route('update.password') }}" method="POST">
                            {{-- {{ route('update.password') }} --}}
                            @csrf
                            <div class="row mb-4">
                                <label for="input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" type="password" class="form-control" id="oldpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="newpassword" type="password" class="form-control" id="newpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Retype Password</label>
                                <div class="col-sm-10">
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                                </div>
                            </div>
                           
                           
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Password">
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