<style>

    .profileimageinnav{
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        margin-right: .8rem;
        background-position-x: center;
        background-position-y: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .sub{
        text-align: center;
        background: white;
        color: black;
        border-radius: 5px;
    margin-top: 30px;
    padding: 10px;
    }
</style>
<aside class="sidebar ">
                <div class="scrollbar">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                         @php  $data=auth()->user()->profile;  @endphp
                         @if($data == null)
                         <img class="user__img" src="{{asset('demo/img/profile-pics/8.jpg')}}" alt="">
                         @else
                         <div class="profileimageinnav" style="background-image:url({{asset('userprofile/')}}/{{$data}});"></div>
                         @endif

                            <!--  -->
                            <div>
                            <div class="user__name">{{auth()->user()->name}} </div>
                                <div class="user__email">{{auth()->user()->email}}</div>
                             
                              
                            </div>
                        </div>
                        
                        <div class="dropdown-menu dropdown-menu--invert">
                            <a class="dropdown-item" href="{{url('profile')}}">View Profile</a>
                            <a class="dropdown-item" href="{{url('profile/editpassword')}}">Change Password</a>
                            <a class="dropdown-item" href="{{url('profile/setting')}}">Settings</a>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                           <!--   <a class="dropdown-item" href="#">Logout</a> -->
                        </div>
                    </div>
                    @if(auth()->user()->usertype == '2')
                    <ul class="navigation">
                        <li class="{{ Request::segment(1) === 'home' ? 'navigation__active' : null }}"><a href="{{url('/home')}}"><i class="zwicon-home"></i> Home</a></li>
             
                        <li class="navigation__sub {{ Request::is(['productadd','product']) ? 'navigation__active' : null }}">
                            <a href="#"> <i class="zwicon-package"></i></i> Product</a>

                            <ul> 
                            @php
                                $data= auth()->user()->permissions;
                                $permission=explode(',',$data);   

                            @endphp
                               @if(!in_array('addproduct',$permission)) 
                                <li class="{{ Request::segment(1) === 'productadd' ? 'navigation__active' : null }}">
                                    <a href="{{url('/productadd')}}">Product Add</a>
                                </li>
                             @endif 
                                <li class="{{ Request::segment(1) === 'product' ? 'navigation__active' : null }}">
                                    <a href="{{url('/product')}}"> <i class="zwicon-content-right"></i> Product List</a>
                                </li>
                            </ul>
                        </li>
                        <li class="navigation__sub {{ Request::is(['addcategory','maincategorylist','subcategorylist']) ? 'navigation__active' : null }}">
                            <a href="#">  <i class="zwicon-git-merge"></i>Category</a>

                            <ul>   
                                
                                <li class="{{ Request::segment(1) === 'addcategory' ? 'navigation__active' : null }}">
                                    <a href="{{url('/addcategory')}}">Add category</a>
                                </li>
                           
                                <li class="{{ Request::segment(1) === 'maincategorylist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/maincategorylist')}}"> <i class="zwicon-content-right"></i> Maincategory</a>
                                </li>
                              <!--  <li class="{{ Request::segment(1) === 'subcategorylist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/subcategorylist')}}">Subcategory</a>
                                </li> -->
                            </ul>
                        </li>

                        <li class="navigation__sub {{ Request::is(['addtestimonials','testimonialslist']) ? 'navigation__active' : null }}">
                            <a href="#"><i class="zwicon-edit-square-feather"></i>Testimonials</a>

                            <ul>
                               @if(!in_array('addtestimonials',$permission)) 
                                <li class="{{ Request::segment(1) === 'addtestimonials' ? 'navigation__active' : null }}">
                                    <a href="{{url('addtestimonials')}}">Add Testimonials</a>
                                </li>
                              @endif
                                <li class="{{ Request::segment(1) === 'testimonialslist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/testimonialslist')}}"> <i class="zwicon-content-right"></i> Testimonials List </a>
                                </li>
                             
                            </ul>
                        </li>

                        <li class="navigation__sub {{ Request::is(['addservices','serviceslist']) ? 'navigation__active' : null }}">
                            <a href="#"> <i class="zwicon-headphone"></i>Services</a>

                            <ul>
                                @if(!in_array('addservices',$permission))
                                <li class="{{ Request::segment(1) === 'addservices' ? 'navigation__active' : null }}">
                                    <a href="{{url('addservices')}}">Add Services</a>
                                </li>
                                @endif
                                <li class="{{ Request::segment(1) === 'serviceslist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/serviceslist')}}"> <i class="zwicon-content-right"></i> Services List </a>
                                </li>
                             
                            </ul>
                        </li>

                        <li class="navigation__sub {{ Request::is(['addabouts','aboutslist']) ? 'navigation__active' : null }}">
                            <a href="#"> <i class="zwicon-book-alt"></i>Abouts</a>

                            <ul>
                                @if(!in_array('addabout',$permission)) 
                                <li class="{{ Request::segment(1) === 'addabouts' ? 'navigation__active' : null }}">
                                    <a href="{{url('addabouts')}}">Add Abouts</a>
                                </li>
                                @endif
                                <li class="{{ Request::segment(1) === 'aboutslist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/aboutslist')}}"><i class="zwicon-content-right"></i> Abouts List </a>
                                </li>
                             
                            </ul>
                        </li>

                        <li class="navigation__sub {{ Request::is(['addskill','skill_list','editskill/*']) ? 'navigation__active' : null }}">
                            <a href="#"><svg aria-hidden="true" focusable="false" width="16"  height="16" data-prefix="fas" data-icon="brain" class="svg-inline--fa fa-brain fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M208 0c-29.9 0-54.7 20.5-61.8 48.2-.8 0-1.4-.2-2.2-.2-35.3 0-64 28.7-64 64 0 4.8.6 9.5 1.7 14C52.5 138 32 166.6 32 200c0 12.6 3.2 24.3 8.3 34.9C16.3 248.7 0 274.3 0 304c0 33.3 20.4 61.9 49.4 73.9-.9 4.6-1.4 9.3-1.4 14.1 0 39.8 32.2 72 72 72 4.1 0 8.1-.5 12-1.2 9.6 28.5 36.2 49.2 68 49.2 39.8 0 72-32.2 72-72V64c0-35.3-28.7-64-64-64zm368 304c0-29.7-16.3-55.3-40.3-69.1 5.2-10.6 8.3-22.3 8.3-34.9 0-33.4-20.5-62-49.7-74 1-4.5 1.7-9.2 1.7-14 0-35.3-28.7-64-64-64-.8 0-1.5.2-2.2.2C422.7 20.5 397.9 0 368 0c-35.3 0-64 28.6-64 64v376c0 39.8 32.2 72 72 72 31.8 0 58.4-20.7 68-49.2 3.9.7 7.9 1.2 12 1.2 39.8 0 72-32.2 72-72 0-4.8-.5-9.5-1.4-14.1 29-12 49.4-40.6 49.4-73.9z"></path></svg>  &nbsp;&nbsp;&nbsp;Skills</a>
                            
                            <ul>
                                @if(!in_array('addabout',$permission)) 
                                <li class="{{ Request::segment(1) === 'addskill' ? 'navigation__active' : null }}">
                                    <a href="{{url('addskill')}}">Add Skill</a>
                                </li>
                             @endif 
                                <li class="{{ Request::segment(1) === 'skill_list' ? 'navigation__active' : null }}">
                                    <a href="{{url('/skill_list')}}"> Skill List </a>
                                </li>
                             
                            </ul>
                        </li>
                        <li class="navigation__sub {{ Request::is(['addsociallink','sociallinklist']) ? 'navigation__active' : null }}">
                            <a href="#"><i class="zwicon-web"></i> Social</a>
                            
                            <ul>
                               @if(!in_array('addabout',$permission)) 
                                <li class="{{ Request::segment(1) === 'addsociallink' ? 'navigation__active' : null }}">
                                    <a href="{{url('addsociallink')}}">Add Social link</a>
                                </li>
                                @endif 
                                <li class="{{ Request::segment(1) === 'sociallinklist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/sociallinklist')}}">Social link list</a>
                                </li>
                             
                            </ul>
                        </li>
                      
                   </ul>
                   
                    @elseif(auth()->user()->usertype == '1')
                        <ul class="navigation">
                        <li class="{{ Request::segment(1) === 'home' ? 'navigation__active' : null }}"><a href="{{url('/home')}}"><i class="zwicon-home"></i> Home</a></li>
                        <li class="navigation__sub {{ Request::is(['user','Userlist']) ? 'navigation__active' : null }}">
                            <a href="#"> <i class="zwicon-book-alt"></i>Users</a>

                            <ul>
                               
                                <li class="{{ Request::segment(1) === 'user' ? 'navigation__active' : null }}">
                                    <a href="{{ url('user')}}">User list  </a>
                                </li>
                             
                            </ul>
                        </li>
                        <li class="navigation__sub {{ Request::is(['Subscription_plan','planlist']) ? 'navigation__active' : null }}">
                            <a href="#">    <i class="zwicon-price-tag"></i>Subscription plan</a>

                            <ul>   
                                
                                <li class="{{ Request::segment(1) === 'Subscription_plan' ? 'navigation__active' : null }}">
                                    <a href="{{url('/Subscription_plan')}}">Add Plan</a>
                                </li>
                           
                                <li class="{{ Request::segment(1) === 'planlist' ? 'navigation__active' : null }}">
                                    <a href="{{url('/planlist')}}">Plan List</a>
                                </li>
                            
                            </ul>
                        </li>
                        </ul>
                    @endif

                   
                </div>
              
            </aside>