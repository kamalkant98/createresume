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
            <h4 class="card-title">ADD Social</h4>
            <form class="row maincategory" action="{{url('addsocial')}}" method="post" >
                @csrf
                <div class="col-md-6">
                <div class="form-group">
                        <label>Social</label>
                        <select class="form-control  {{ $errors->has('socialname') ? ' is-invalid' :''}}" name="socialname">
                            <option value="">select</option>
                            <option value="facebook">facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Skype">Skype</option>
                            <option value="Linkdin">Linkdin</option>
                          
                           
                        </select>
                        <div class="invalid-feedback">@error('socialname') {{$message}}@enderror</div>
                    </div>
                    <div class="form-group">
                    <label>social http</label>
                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">https://example.com/users/</span>
                        </div>
                        <input type="text" class="form-control {{ $errors->has('link') ? ' is-invalid' :''}}" placeholder="http link" name="link">
                    </div>
                    <div class="invalid-feedback">@error('link') {{$message}}@enderror</div> 
                </div>
                    <button type="submit" class="btn btn-theme">Add Social</button>
                </div>
                    
            </form>
            
        </div>
    </div>
</section>
@endsection


