@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <style>
    	.error{
        height:1px;
      }
      .profileimage{
        width: 100px;
        margin-bottom: 30px;
        margin-left: 10px;
        margin-top: -55px;
        height: 100px;
        background-position-x: center;
        background-position-y: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 50%;
        border: 5px #081f1e solid;
        box-shadow: 0px 0px 8px #ffffff52;
      }
      .backcover{
        width: 100%;
        height: 260px;
        background-position-x: center;
        background-position-y: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #ffffff52;
      }
  </style>


  <div class="content">
 
      <div class="container-fluid">
      @include('layouts.flash-messages')
		@yield('content')
        <div class="row">
          <div class="col-md-12">
            <form method="post" action="{{route('profile.update')}}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
              @csrf
              @method('put')
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Profile') }}</h4>
                    <p class="card-category">{{ __('User information') }}</p>
                  </div>
                  <div class="card-body ">
                  @if($user->background ==null)
                  <div class="backcover" style="background-image:url('https://i.pinimg.com/originals/b5/ff/2c/b5ff2c1429e1d5c7c3fc4b135432eaec.jpg')"></div>
                  @else
                  <div class="backcover" style="background-image:url({{asset('usercoverfile/')}}/{{$user->background}});"></div>
                  @endif
                  @if($user->profile == null)
                  <div class="profileimage" style="background-image:url('https://uploads.disquscdn.com/images/dc368ebd907dfb3c40406ed0c842b10023f20651969cbd4bf77e524b3bf29ce7.jpg')"></div>
                  @else
                  <div class="profileimage" style="background-image:url({{asset('userprofile/')}}/{{$user->profile}});"></div>
                  @endif
                  <div class="row">
                    <div class="form-group{{ $errors->has('profile') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            profile
                            </span>
                          </div>
                          <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profile" name="profile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        @if ($errors->has('profile'))
                          <div id="name-error" class="error text-danger pl-3" for="profile" style="display: block;">
                            <strong>{{ $errors->first('profile') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('coverfile') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              Coverfile
                            </span>
                          </div>
                          <div class="custom-file">
                                <input type="file" class="custom-file-input" id="File" name="coverfile">
                                <label class="custom-file-label" for="File">Choose file</label>
                            </div>
                        </div>
                        @if ($errors->has('coverfile'))
                          <div id="name-error" class="error text-danger pl-3" for="coverfile" style="display: block;">
                            <strong>{{ $errors->first('coverfile') }}</strong>
                          </div>
                        @endif
                      </div>
                          
                      <div class="form-group{{ $errors->has('name') ? 'is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Username
                            </span>
                          </div>
                          <input type="text" name="username" class="form-control" placeholder="{{ __('Username...') }}" value="{{ $user->username ?? ''}}">
                        </div>
                        @if ($errors->has('username'))
                          <div id="name-error" class="error text-danger pl-3" for="username" style="display: block;">
                            <strong>{{ $errors->first('username') }}</strong>
                          </div>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('name') ? 'is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Name
                            </span>
                          </div>
                          <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ $user->name ?? ''}}">
                        </div>
                        @if ($errors->has('name'))
                          <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                            <strong>{{ $errors->first('name') }}</strong>
                          </div>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Email
                            </span>
                          </div>
                          <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{$user->email ?? ''}}">
                        </div>
                        @if ($errors->has('email'))
                          <div id="name-error" class="error text-danger pl-3" for="email" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                          </div>
                        @endif
                      </div>

                      

                      <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Mobile no.
                            </span>
                          </div>
                          <input type="text" name="telephone"  class="form-control input-mask" data-mask="+910000000000" placeholder="+910000000000" value="{{ $user->telephone ?? ''}}">
                        </div>
                        @if ($errors->has('telephone'))
                          <div id="name-error" class="error text-danger pl-3" for="telephone" style="display: block;">
                            <strong>{{ $errors->first('telephone') }}</strong>
                          </div>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('name') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Whatsap Mobile no.
                            </span>
                          </div>
                          <input type="text" name="telephone2"  class="form-control input-mask" data-mask="+910000000000" placeholder="+910000000000" value="{{ $user->telephone2 ?? ''}}">
                        </div>
                        @if ($errors->has('telephone2'))
                          <div id="name-error" class="error text-danger pl-3" for="telephone2" style="display: block;">
                            <strong>{{ $errors->first('telephone2') }}</strong>
                          </div>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('address') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            Address
                            </span>
                          </div>
                          <input type="text" name="address"  class="form-control" placeholder="{{ __('Address...') }}" value="{{$user->address ?? ''}}">
                        </div>
                        @if ($errors->has('address'))
                          <div id="name-error" class="error text-danger pl-3" for="address" style="display: block;">
                            <strong>{{ $errors->first('address') }}</strong>
                          </div>
                        @endif
                      </div>
                     
                      <div class="form-group{{ $errors->has('addresslink') ? ' is-invalid' : '' }} col-md-12">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              Address Map link 
                            </span>
                          </div>
                          <input type="text" name="addresslink"  class="form-control" placeholder="{{ __('Address link...') }}" value="{{$user->maplocation ?? ''}}">
                        </div>
                        @if ($errors->has('addresslink'))
                          <div id="name-error" class="error text-danger pl-3" for="addresslink" style="display: block;">
                            <strong>{{ $errors->first('addresslink') }}</strong>
                          </div>
                        @endif
                      </div>

                  
                   

                    </div>
                    @if($user->maplocation !== null)
                    <iframe src="{{$user->maplocation}}" frameborder="0" style="border:0; width: 100%; height: 200px;" allowfullscreen></iframe>
                    @endif
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                  </div>

                </div>
            </form>

<!-- ===============================social links======= -->

            <form method="post" action="{{route('profile.socialupdate')}}" autocomplete="off" class="form-horizontal">

              @csrf
       
                @php 
                  if(!empty($social)){
                    $permissions = explode(',',$social->permissions);
                    $id=$social->id;
                    $facebook=$social->facebook;
                    $instagram=$social->instagram;
                    $twitter=$social->twitter;
                    $linkdin=$social->linkdin;
                    $skype=$social->skype;
                  }else{
                    $permissions = explode(',','');
                    $id='';
                    $facebook='';
                    $instagram='';
                    $twitter='';
                    $linkdin='';
                    $skype='';
                  }
                
                
                @endphp 
                <input type="hidden" name="socialid" value="{{$id}}">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ __('Social link') }}</h4>
                    
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      
                      <div class="form-group{{ $errors->has('facebook') ? ' is-invalid' : '' }} col-md-11">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                            </span>
                          </div>
                          <input type="text"  class="form-control" placeholder="https://www.facebook" name="facebook" value="{{$facebook}}">
                        </div>
                        @if ($errors->has('facebook'))
                          <div id="name-error" class="error text-danger pl-3" for="facebook" style="display: block;">
                            <strong>{{ $errors->first('facebook') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="col-md-1">
                        <div class="demo-inline-wrapper ">
                            <div class="form-group">
                                <div class="toggle-switch toggle-switch--blue">
                                    @if($facebook == null)
                                    <input type="checkbox" class="toggle-switch__checkbox" disabled value="facebook" name="socialper[]">
                                    @elseif(in_array('facebook',$permissions))
                                    <input type="checkbox" class="toggle-switch__checkbox" checked value="facebook" name="socialper[]">
                                    @else
                                    <input type="checkbox" class="toggle-switch__checkbox" value="facebook" name="socialper[]">
                                    @endif
                                    <i class="toggle-switch__helper"></i>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group{{ $errors->has('instagram') ? ' is-invalid' : '' }} col-md-11">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                            </span>
                          </div>
                          <input type="text"  class="form-control" placeholder="https://www.instagram" name="instagram" value="{{$instagram}}">
                        </div>
                        @if ($errors->has('instagram'))
                          <div id="name-error" class="error text-danger pl-3" for="instagram" style="display: block;">
                            <strong>{{ $errors->first('instagram') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="col-md-1">
                        <div class="demo-inline-wrapper ">
                            <div class="form-group">
                                <div class="toggle-switch toggle-switch--blue">
                                  @if($instagram == null)
                                    <input type="checkbox" class="toggle-switch__checkbox" disabled value="instagram" name="socialper[]">
                                    @elseif(in_array('instagram',$permissions))
                                    <input type="checkbox" class="toggle-switch__checkbox" checked value="instagram" name="socialper[]">
                                    @else
                                    <input type="checkbox" class="toggle-switch__checkbox" value="instagram" name="socialper[]">
                                    @endif
                                    <i class="toggle-switch__helper"></i>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group{{ $errors->has('twitter') ? ' is-invalid' : '' }} col-md-11">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                            </span>
                          </div>
                          <input type="text"  class="form-control" placeholder="https://www.twitter" name="twitter" value="{{$twitter}}">
                          
                        </div>
                        @if ($errors->has('twitter'))
                          <div id="name-error" class="error text-danger pl-3" for="twitter" style="display: block;">
                            <strong>{{ $errors->first('twitter') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="col-md-1">
                        <div class="demo-inline-wrapper ">
                            <div class="form-group">
                                <div class="toggle-switch toggle-switch--blue">
                                   @if($twitter == null)
                                    <input type="checkbox" class="toggle-switch__checkbox" disabled  value="twitter" name="socialper[]">
                                    @elseif(in_array('twitter',$permissions))
                                    <input type="checkbox" class="toggle-switch__checkbox" checked  value="twitter" name="socialper[]">
                                    @else
                                    <input type="checkbox" class="toggle-switch__checkbox"  value="twitter" name="socialper[]">
                                    @endif
                                    <i class="toggle-switch__helper"></i>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group{{ $errors->has('skype') ? ' is-invalid' : '' }} col-md-11">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            
                              <svg aria-hidden="true" width="16" height="16" focusable="false" data-prefix="fab" data-icon="skype" class="svg-inline--fa fa-skype fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M424.7 299.8c2.9-14 4.7-28.9 4.7-43.8 0-113.5-91.9-205.3-205.3-205.3-14.9 0-29.7 1.7-43.8 4.7C161.3 40.7 137.7 32 112 32 50.2 32 0 82.2 0 144c0 25.7 8.7 49.3 23.3 68.2-2.9 14-4.7 28.9-4.7 43.8 0 113.5 91.9 205.3 205.3 205.3 14.9 0 29.7-1.7 43.8-4.7 19 14.6 42.6 23.3 68.2 23.3 61.8 0 112-50.2 112-112 .1-25.6-8.6-49.2-23.2-68.1zm-194.6 91.5c-65.6 0-120.5-29.2-120.5-65 0-16 9-30.6 29.5-30.6 31.2 0 34.1 44.9 88.1 44.9 25.7 0 42.3-11.4 42.3-26.3 0-18.7-16-21.6-42-28-62.5-15.4-117.8-22-117.8-87.2 0-59.2 58.6-81.1 109.1-81.1 55.1 0 110.8 21.9 110.8 55.4 0 16.9-11.4 31.8-30.3 31.8-28.3 0-29.2-33.5-75-33.5-25.7 0-42 7-42 22.5 0 19.8 20.8 21.8 69.1 33 41.4 9.3 90.7 26.8 90.7 77.6 0 59.1-57.1 86.5-112 86.5z"></path></svg>
                            </span>
                          </div>
                          <input type="text"  class="form-control" placeholder="https://www.skype" name="skype" value="{{$skype}}">
                        </div>
                        @if ($errors->has('skype'))
                          <div id="name-error" class="error text-danger pl-3" for="skype" style="display: block;">
                            <strong>{{ $errors->first('skype') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="col-md-1">
                        <div class="demo-inline-wrapper ">
                            <div class="form-group">
                                <div class="toggle-switch toggle-switch--blue">
                                    @if($skype == null)
                                     <input type="checkbox" class="toggle-switch__checkbox" disabled value="skype" name="socialper[]">
                                    @elseif(in_array('skype',$permissions))
                                     <input type="checkbox" class="toggle-switch__checkbox" checked value="skype" name="socialper[]">
                                    @else
                                     <input type="checkbox" class="toggle-switch__checkbox" value="skype" name="socialper[]">
                                    @endif
                                    <i class="toggle-switch__helper"></i>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group{{ $errors->has('linkdin') ? ' is-invalid' : '' }} col-md-11">
                        <div class="input-group ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                            </svg>
                            </span>
                          </div>
                          <input type="text" class="form-control" placeholder="https://www.linkdin" name="linkdin" value="{{$linkdin}}">
                        </div>
                        @if ($errors->has('linkdin'))
                          <div id="name-error" class="error text-danger pl-3" for="vname" style="display: block;">
                            <strong>{{ $errors->first('linkdin') }}</strong>
                          </div>
                        @endif
                      </div>
                      <div class="col-md-1">
                        <div class="demo-inline-wrapper ">
                            <div class="form-group">
                                <div class="toggle-switch toggle-switch--blue">
                                    @if($linkdin == null)
                                     <input type="checkbox" class="toggle-switch__checkbox" disabled value="linkedin" name="socialper[]">
                                    @elseif(in_array('linkedin',$permissions))
                                     <input type="checkbox" class="toggle-switch__checkbox" checked value="linkedin" name="socialper[]">
                                    @else
                                     <input type="checkbox" class="toggle-switch__checkbox" value="linkedin" name="socialper[]">
                                    @endif
                                    <i class="toggle-switch__helper"></i>
                                </div>
                            </div>
                        </div>
                      </div>

                    </div>
                 
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                  </div>
                </div>
            </form>
          </div>
      </div>
     </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
  <script>
     $(document).ready(function(){
        $('.form-control').change(function(){
          if($(this).val() == ""){
            $(this).closest('.row').find('.toggle-switch__checkbox').prop( "disabled",true);
          }else{
            $(this).closest('.row').find('.toggle-switch__checkbox').prop('disabled',false);
          }
           
          
        });
     });

  </script>

@endsection
      <!-- <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
      
      <!-- <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
   