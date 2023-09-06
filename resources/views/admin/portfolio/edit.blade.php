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
                           Add to Portfolio 
                        </h4> <br> <br>
                        <form action="{{ route('update.data') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- when updating --}}
                            <input type="hidden" name="id" value="{{ $portfolio->id }}"> 
                            
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_name" type="text" class="form-control" value="{{ $portfolio->portfolio_name }}">
                                    
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_title" type="text" class="form-control" value="{{ $portfolio->portfolio_title }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label">Portfolio description</label>
                                <div class="col-sm-10">
                                    <textarea  name="portfolio_desc" id="elm1">
                                        {{ $portfolio->portfolio_desc }}
                                    </textarea>
                                </div>
                            </div>            
                            {{-- image profile --}}
                            <div class="row mb-3">   
                                <label for="input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_image" type="file" class="form-control" id="image" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                   <img id="showImage" src="{{ asset($portfolio->portfolio_image) }}" alt="no_image"  class="rounded avatar-lg">
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