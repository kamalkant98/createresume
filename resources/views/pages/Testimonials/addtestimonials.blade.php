@extends('layouts.app',['activePage' => 'addtestimonials', 'titlePage' => __('addtestimonials')])


@section('content')
<style>
        option{
        color:black;
    } 
    .testimonialimage{
        width:70px;
        height:70px;
    }
</style>
@php
    if(isset($testimonial)){
        
        $id= $testimonial->id;
        $title= $testimonial->title;
        $image= $testimonial->image;
        $Description= $testimonial->description;
    } else{
         $id='';
        $title='';
        $image= '';
        $Description='';
    }
   @endphp   
   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
        @include('layouts.flash-messages')
        @yield('content')
    

<div class="card">
        <div class="card-body">
            @if(!empty($id))
            <h4 class="card-title">Update Testimonial</h4><hr>
            <form class="row testimonials'" action="{{url('update_testimonials')}}" method="post"  enctype="multipart/form-data">
            @else
            <h4 class="card-title">Add Testimonial</h4>
            <hr>
            <form class="row testimonials'" action="{{url('create_testimonials')}}" method="post"  enctype="multipart/form-data">
            @endif 
            @csrf
                <input type="hidden" name="testimonialid" value="{{$id}}">
                <input type="hidden" name="oldimg" value="{{$image}}">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control  {{ $errors->has('title') ? ' is-invalid' :''}}" name="title" placeholder="Title" value='{{$title}}'>
                        <div class="invalid-feedback">@error('title') {{$message}}@enderror</div>
                    </div>
                    <div class="form-group">
                             <div class="custom-file">
                                <input type="file" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' :''}}" id="customFile" name="image" value="{{$image}}">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <div class="invalid-feedback">@error('image') {{$message}}@enderror</div>
                            </div>
                        <!--<label>Image</label>
                        <input type="file" class="form-control  {{ $errors->has('image') ? ' is-invalid' :''}}" name="image" value="{{$image}}">
                        <div class="invalid-feedback">@error('image') {{$message}}@enderror</div>-->
                    </div>
                    @if(!empty($image))
                    <div class=" imagepreview align-bottom">
                        <img src="{{asset('files/'.$image)}}" class="figure-img img-fluid rounded testimonialimage">
                    </div>
                    @endif
                </div>
                   
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea class="form-control {{ $errors->has('Description') ? 'is-invalid' :''}}" id="summary-ckeditor" name="Description">{{$Description}}</textarea>
                        <div class="invalid-feedback">@error('Description') {{$message}}@enderror</div>
                        <br>
                        @if(!empty($id))
                        <button type="submit" class="btn btn-theme">Update Testimonials</button>
                        @else
                        <button type="submit" class="btn btn-theme">Add Testimonials</button>
                        @endif
                    </div>
            </form>
               
        </div>
    </div>
</section>
<script>
CKEDITOR.replace('summary-ckeditor');
</script>
@endsection



