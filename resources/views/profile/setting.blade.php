@extends('layouts.app',['activePage' => 'addservices', 'titlePage' => __('addservices')])


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

   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
        @include('layouts.flash-messages')
        @yield('content')
    

<div class="card">
        <div class="card-body">
          <h4 class="card-title">Setting</h4>
            <form class="services'" action="{{url('profile/updatesetting')}}" method="post">
                @csrf
                <input type="hidden" name="userid" value="{{$setting->user_id ?? ''}}">
                <div class="row">
                    <div class="col-md-12">
                        <label>body_bg_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value"  name="body_bg_color" value="{{$setting->body_bg_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color:{{$setting->body_bg_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>body_font_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="body_font_color" value="{{$setting->body_font_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->body_font_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>section_bg</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="section_bg" value="{{$setting->section_bg ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->section_bg ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>section_title_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="section_title_color" value="{{$setting->section_title_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->section_title_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>form_bg_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="form_bg_color" value="{{$setting->form_bg_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->form_bg_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>info_bg_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="info_bg_color" value="{{$setting->info_bg_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->info_bg_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>banner_title_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="banner_title_color" value="{{$setting->banner_title_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->banner_title_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>Services_icon_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="Services_icon_color" value="{{$setting->Services_icon_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->Services_icon_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>Services_icon_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="Services_icon_hover" value="{{$setting->Services_icon_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->Services_icon_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>Services_title_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="Services_title_color" value="{{$setting->Services_title_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->Services_title_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <label>Services_title_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="Services_title_hover" value="{{$setting->Services_title_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->Services_title_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>social_bg</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="social_bg" value="{{$setting->social_bg ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->social_bg ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>social_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="social_color" value="{{$setting->social_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->social_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>social_bg_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="social_bg_hover" value="{{$setting->social_bg_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->social_bg_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>social_color_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="social_color_hover" value="{{$setting->social_color_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->social_color_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>nav_icon_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="nav_icon_color" value="{{$setting->nav_icon_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->nav_icon_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>nav_icon_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="nav_icon_hover" value="{{$setting->nav_icon_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->nav_icon_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>nav_a_color</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="nav_a_color" value="{{$setting->nav_a_color ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->nav_a_color ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>nav_a_hover</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="nav_a_hover" value="{{$setting->nav_a_hover ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->nav_a_hover ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>nav_bg</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="nav_bg" value="{{$setting->nav_bg ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->nav_bg ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <label>footer_bg</label>
                        <div class="input-group color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zwicon-brush"></i></span>
                            </div>
                            <input type="text" class="form-control color-picker__value" name="footer_bg" value="{{$setting->footer_bg ?? ''}}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="color-picker__preview" style="background-color: {{$setting->footer_bg ?? ''}}"></i>
                                </span>
                            </div>
                        </div>
                    </div>


                   
                    <div class="col-md-12" style="margin-top:20px;">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection



