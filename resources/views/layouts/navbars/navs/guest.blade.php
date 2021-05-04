
<header class="header">
  <div class="navigation-trigger d-xl-none" data-sa-action="aside-open" data-sa-target=".sidebar">
    <i class="zwicon-hamburger-menu"></i>
  </div>

    <div class="logo d-none d-sm-inline-flex">
      <a href="index.html"><img style=" width:40px;" src="{{asset('assest/logo.png')}}"  alt></a>
    </div>
    <ul class="top-nav">

      <li class="nav-item">
      <a href="" class="nav-link"> {{ __(' Dashboard ') }}  </a>
      </li>

      <li class="nav-item">
      <a href="{{ route('register') }}" class="nav-link"> {{ __(' Register ') }}  </a>
      </li>

      <li class="nav-item">
      <a href="{{ route('login') }}" class="nav-link"> {{ __('Login ') }} </a>
      </li>
      
      <li class="nav-item ">
      <a href="{{ route('profile.edit') }}" class="nav-link"> {{ __(' Profile ') }} </a>
      </li> 
    </ul>    
    <div class="clock d-none d-md-inline-block">
      <div class="time">
        <span class="time__hours"></span>
        <span class="time__min"></span>
        <span class="time__sec"></span>
      </div>
  </div>
  
</header>
