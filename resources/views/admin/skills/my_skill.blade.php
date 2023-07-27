@extends('admin.admin_master')
@section('admin')

@php
    $skills = App\Models\Skill::all();
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" >
                          Skills Page
                        </h4> <br> <br>
                        <form action="{{ route('update.skill') }}" method="POST" enctype="multipart/form-data">
                            {{-- {{ route('update.skills') }} --}}
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{ $skillPage->id }}"> --}}
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Skill Name</label>
                                <div class="col-sm-10">
                                    <input name="skill_name" type="text" class="form-control">
                                </div>
                            </div>
                                       
                            {{-- image profile --}}
                            <div class="row mb-3">   
                                <label for="input" class="col-sm-2 col-form-label">Skill Image</label>
                                <div class="col-sm-10">
                                    <input name="skill_img" type="file" class="form-control" id="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{ (!empty($skillPage->skill_img))? url($skillPage->skill_img):url('upload/no_image.jpg') }}" alt=""  class="rounded avatar-lg">
                                </div>
                                
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Your Skills">
                        </form>
                    </div>
                </div>
            </div>
             <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" >
                         My Skills

                        </h4> 

                        @foreach ( $skills as $skill)
                        <div class="card" style="width: 18rem;">
                        <img class="card-img-top" id="showImage" src="{{ $skill -> skill_img }}"  class="rounded avatar-lg">
                            <div class="card-body">
                                {{-- <p class="card-text">{{ $skills->skill_name }}/</p> --}}
                            </div>
                        </div>
                        @endforeach
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