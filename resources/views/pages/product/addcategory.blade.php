@extends('layouts.app',['activePage' => 'addcategory', 'titlePage' => __('addcategory')])


@section('content')
<style>
         option{
            color:black;
        } 
    </style>
<section class="content">
@include('layouts.flash-messages')
		@yield('content')
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Form controls</h4>
            <form class="row maincategory" action="{{url('addmaincategory')}}" method="post" >
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Maincategory</label>
                        <input type="text" class="form-control  {{ $errors->has('maincategory') ? ' is-invalid' :''}}" name="maincategory" placeholder="Maincategory">
                        <div class="invalid-feedback">@error('maincategory') {{$message}}@enderror</div>
                    </div>
                    <button type="submit" class="btn btn-theme">Add Maincategory</button>
                </div>
                    
            </form><hr>
            <form class="row subcategory" action="{{url('addsubcategory')}}" method="post">
            @csrf
                <div class= col-md-6>
                <div class="form-group">
                        <label>Maincategory</label>
                        <select class="form-control  {{ $errors->has('selectmaincategory') ? ' is-invalid' :''}}" name="selectmaincategory">
                            <option value="">select</option>
                            @foreach($data as $k=>$v)
                                <option value="{{$v->id}}">{{$v->maincategoryname}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('selectmaincategory') {{$message}}@enderror</div>
                    </div>
                    <div class="form-group ">
                        <label>Subcategory</label>
                        <input type="text" class="form-control {{ $errors->has('subcategory') ? ' is-invalid' :''}}" placeholder="Subcategory" name="subcategory">
                        <div class="invalid-feedback">@error('subcategory') {{$message}}@enderror</div>
                    </div>
                    <button type="submit" class="btn btn-theme">Add subcategory</button>
                
                </div>    
                
            </form>    
        </div>
    </div>
</section>
@endsection


