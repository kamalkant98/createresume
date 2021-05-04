@extends('layouts.app', ['activePage' => '', 'titlePage' => __('')])

@section('content')

<section class="content ">
    <style>
       
	.error{
		height:1px;
	}
    </style>
@include('layouts.flash-messages')
@yield('content')
<div class="container" style="height: auto; ">
  <div class="row align-items-center">
    <div class="col-lg-12 col-md-8 col-sm-8 ml-auto mr-auto" style="margin-top:40px;">
      <form class="form" method="Post" action="{{url('user/')}}/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH')}}
        <div class="card card-login card-hidden mb-3" style="background-color:#0000004a;">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Update') }}</strong></h4>
            
          </div>
          <div class="card-body ">
          
            <div class="row">
			<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
              
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                      Name
                      </span>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{$user->name}}">
                  </div>
                  @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
				</div>
            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
					          Email
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{$user->email}}">
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">Username</i>
                  </span>
                </div>
                <input type="text" name="username" class="form-control" placeholder="{{ __('username...') }}" value="{{ $user->username}}">
              </div>
              @if ($errors->has('username'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('username') }}</strong>
                </div>
              @endif
            </div>
			<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">Telephone</i>
                  </span>
                </div>
                <input type="text" name="telephone"  class="form-control input-mask" data-mask="+910000000000" placeholder="+910000000000" value="{{$user->telephone}}">
               
              </div>
              @if ($errors->has('telephone'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('telephone') }}</strong>
                </div>
              @endif
            </div>
           <!--
            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    Profile
                  </span>
                </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
              </div>
              @if ($errors->has('telephone'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('telephone') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
              <div class="input-group">
              
                  <span class="input-group-text">
                  Gender
                  </span>
               
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                
                                <label class="btn btn-theme">
                                    <input type="radio" name="gender" id="option2" autocomplete="off" value="Male">Male
                                </label>
                                <label class="btn btn-theme">
                                    <input type="radio" name="gender" id="option3" autocomplete="off" value="Female">Female
                                </label>
                            </div>
              </div>
              @if ($errors->has('telephone'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('telephone') }}</strong>
                </div>
              @endif
            </div> -->
          <div class="footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('update ') }}</button>
          </div>
        </div>
			</div>
          </div>
      </form>
      
	  </div>
    </div>
  </div>
</section>
@endsection