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
                            Change Home Slide
                        </h4> <br> <br>
                        <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data">
                            {{-- {{ route('store.home_slide') }} --}}
                            @csrf
                            <input type="hidden" name="id" value="{{ $homeslide->id }}">
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control"  value="{{ $homeslide->title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" type="text" class="form-control" value="{{ $homeslide->short_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Brief Intro</label>
                                <div class="col-sm-10">
                                    <input name="brief" type="text" class="form-control" value="{{ $homeslide->brief}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input name="video_url" type="text" class="form-control"  value="{{  $homeslide->video_url }}">
                                </div>
                            </div>
                            {{-- image profile --}}
                            <div class="row mb-3">   
                                <label for="input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input name="home_slide" type="file" class="form-control" id="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{ (!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg') }}" alt=""  class="rounded avatar-lg">
                                </div>
                                
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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