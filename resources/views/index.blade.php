@extends('layouts.app')

@section('content')
           <section class="content">
           @include('layouts.flash-messages')
		@yield('content')
       
        <header class="content__title">
               
                    <h1>Dashboard <small> Welcome to the unique SuperAdmin web app experience!</small></h1>
                
                    <div class="actions">
                        <a href="#" class="actions__item zwicon-cog"></a>
                        <a href="#" class="actions__item zwicon-refresh-double"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zwicon-more-h"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                <a href="#" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                <h2>987,459</h2>
                                <small>Total Leads Recieved</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">6,4,8,6,5,6,7,8,3,5,9</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                <h2>356,785K</h2>
                                <small>Total Website Clicks</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                <h2>$58,778</h2>
                                <small>Total Sales Orders</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                <h2>214</h2>
                                <small>Total Support Tickets</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
                        </div>
                    </div>
                </div>
             
             <!--   <div class="content__inner content__inner--sm">
                    <header class="content__title">
                        <h1>{{$user->name}}<small>Web/UI Developer, Edinburgh, Scotland</small></h1>

                        <div class="actions">
                            <a href="#" class="actions__item zwicon-cog"></a>
                            <a href="#" class="actions__item zwicon-refresh-double"></a>

                            <div class="dropdown actions__item">
                                <i data-toggle="dropdown" class="zwicon-more-h"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Refresh</a>
                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                    <a href="#" class="dropdown-item">Settings</a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="card profile">
                        <div class="profile__img">
                        <img src="{{asset('sidefiles/Iyv2ZRs1612937842.jpg')}}" alt="">

                            <a href="#" class="zwicon-camera profile__img__edit"></a>
                        </div>

                        <div class="profile__info">
                            <p>Cras mattis consectetur purus sit amet fermentum. Maecenas sed diam eget risus varius blandit sit amet non magnae tiam porta sem malesuada magna mollis euismod.</p>

                            <ul class="icon-list">
                                <li><i class="zwicon-phone"></i>{{$user->telephone}}</li>
                                <li><i class="zwicon-mail"></i> {{$user->email}}</li>
                                <li><i class="zwicon-chat"></i>@malinda-h</li>
                            </ul>
                        </div>
                    </div>

                    <div class="toolbar">
                        <nav class="toolbar__nav">
                            <a class="active" href="profile-about.html">About</a>
                            <a href="profile-photos.html">Photos</a>
                            <a href="profile-contacts.html">Contacts</a>
                        </nav>

                        <div class="actions">
                            <i class="actions__item zwicon-search" data-sa-action="toolbar-search-open"></i>
                        </div>

                        <div class="toolbar__search">
                            <input type="text" placeholder="Search...">

                            <i class="toolbar__search__close zwicon-arrow-left" data-sa-action="toolbar-search-close"></i>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-body__title">About {{$user->name}}</h5>

                            <p>Pellentesque vitae quam quis tellus dignissim faucibus. Suspendisse mattis felis at faucibus lobortis. Sed sit amet tellus dolor. Fusce quis sollicitudin velit. Praesent gravida ullamcorper lectus et tincidunt. Phasellus lectus quam, porta pharetra feugiat in, auctor eget dolor.</p>

                            <p>Vestibulum tincidunt imperdiet egestas. In in nunc vitae elit tincidunt tristique id eu justo. Quisque gravida maximus orci, vulputate pharetra mauris commodo at. Mauris eget fermentum ipsum, quis faucibus neque. Fusce eleifend sapien sit amet convallis rhoncus. Proin commodo lacinia lectus, et tempus turpis.</p>

                            <br>

                            <h5 class="card-body__title">Contact Information</h5>

                            <ul class="icon-list">
                                <li><i class="zwicon-phone"></i>{{$user->telephone}}</li>
                                <li><i class="zwicon-mail"></i>{{$user->email}}</li>
                                <li><i class="zwicon-pin"></i>5470 Madison Street Severna Park, MD 21146</li>
                                <li><i class="zwicon-chat"></i>@malinda-h</li>
                            </ul>
                        </div>
                    </div>
                </div>-->

                
              <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales Statistics</h4>
                                <h6 class="card-subtitle">Vestibulum purus quam scelerisque, mollis nonummy metus</h6>

                                <div class="flot-chart flot-curved-line"></div>
                                <div class="flot-chart-legends flot-chart-legends--curved"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Growth Rate</h4>
                                <h6 class="card-subtitle">Commodo luctus nisi erat porttitor ligula eget lacinia odio semnec</h6>

                                <div class="flot-chart flot-line"></div>
                                <div class="flot-chart-legends flot-chart-legends--line"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-lists card-columns">
                    <div class="card widget-past-days">
                        <div class="card-body">
                            <h4 class="card-title">For the past 30 days</h4>
                            <h6 class="card-subtitle">Pellentesque ornare sem lacinia quam</h6>
                        </div>

                        <div class="widget-past-days__main">
                            <div class="flot-chart flot-chart--sm flot-past-days"></div>
                        </div>

                        <div class="listview listview--striped">
                            <div class="listview__item">
                                <div class="widget-past-days__info">
                                    <small>Page Views</small>
                                    <h3>47,896,536</h3>
                                </div>

                                <div class="widget-past-days__chart hidden-sm">
                                    <div class="peity-bar">6,9,5,6,3,7,5,4,6,5,6,4,2,5,8,2,6,9</div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="widget-past-days__info">
                                    <small>Site Visitors</small>
                                    <h3>24,456,799</h3>
                                </div>

                                <div class="widget-past-days__chart hidden-sm">
                                    <div class="peity-bar">5,7,2,5,2,8,6,7,6,5,3,1,9,3,5,8,2,4</div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="widget-past-days__info">
                                    <small>Total Clicks</small>
                                    <h3>13,965</h3>
                                </div>

                                <div class="widget-past-days__chart hidden-sm">
                                    <div class="peity-bar">5,7,2,5,2,8,6,7,6,5,3,1,9,3,5,8,2,4</div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="widget-past-days__info">
                                    <small>Total Returns</small>
                                    <h3>198</h3>
                                </div>

                                <div class="widget-past-days__chart hidden-sm">
                                    <div class="peity-bar">3,9,1,3,5,6,7,6,8,2,5,2,7,5,6,7,6,8</div>
                                </div>
                            </div>
                            <div class="listview__item">
                                <div class="widget-past-days__info">
                                    <small>Total Leads</small>
                                    <h3>19821</h3>
                                </div>

                                <div class="widget-past-days__chart hidden-sm">
                                    <div class="peity-bar">4,2,2,2,2,8,1,6,8,2,5,2,7,5,4,2,6,3</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card todo">
                        <div class="card-body">
                            <h4 class="card-title">Todo lists</h4>
                            <h6 class="card-subtitle">Venenatis portauam Inceptos ameteiam</h6>
                        </div>

                        <div class="listview">
                            <div class="listview__item">
                                <div class="checkbox-char todo__item">
                                    <input type="checkbox" id="char-1">
                                    <label for="char-1">F</label>

                                    <div class="listview__content">
                                        <div class="listview__heading">Fivamus sagittis lacus vel augue laoreet rutrum faucibus dolor</div>
                                        <p>Today at 8.30 AM</p>

                                        <div class="listview__attrs">
                                            <span>#Messages</span>
                                            <span>!!!</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions listview__actions">
                                    <div class="dropdown actions__item">
                                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Mark as completed</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="checkbox-char todo__item">
                                    <input type="checkbox" id="char-2">
                                    <label for="char-2">N</label>

                                    <div class="listview__content">
                                        <div class="listview__heading">Nullam id dolor id nibh ultricies vehicula ut id elit</div>
                                        <p>Today at 12.30 PM</small>

                                        <div class="listview__attrs">
                                            <span>#Clients</span>
                                            <span>!!</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions listview__actions">
                                    <div class="dropdown actions__item">
                                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Mark as completed</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="checkbox-char todo__item">
                                    <input type="checkbox" id="char-3">
                                    <label for="char-3">C</label>

                                    <div class="listview__content">
                                        <div class="listview__heading">Cras mattis consectetur purus sit amet fermentum</div>
                                        <p>Tomorrow at 10.30 AM</small>

                                        <div class="listview__attrs">
                                            <span>#Clients</span>
                                            <span>!!</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions listview__actions">
                                    <div class="dropdown actions__item">
                                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Mark as completed</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="checkbox-char todo__item">
                                    <input type="checkbox" id="char-4">
                                    <label for="char-4">I</label>

                                    <div class="listview__content">
                                        <div class="listview__heading">Integer posuere erat a ante venenatis dapibus posuere velit aliquet</div>
                                        <p>05/08/2017 at 08.00 AM</small>
                    
                                        <div class="listview__attrs">
                                            <span>#Server</span>
                                            <span>!</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions listview__actions">
                                    <div class="dropdown actions__item">
                                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Mark as completed</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="checkbox-char todo__item">
                                    <input type="checkbox" id="char-5">
                                    <label for="char-5">P</label>

                                    <div class="listview__content">
                                        <div class="listview__heading">Praesent commodo cursus magnavel scelerisque nisl consectetur</div>
                                        <p>10/08/2016 at 04.00 AM</small>
                    
                                        <div class="listview__attrs">
                                            <span>#Server</span>
                                            <span>!!!</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions listview__actions">
                                    <div class="dropdown actions__item">
                                        <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Mark as completed</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="todos.html" class="view-more">View More</a>
                        </div>
                    </div>

                    <div class="card widget-visitors">
                        <div class="card-body">
                            <h4 class="card-title">Realtime Visitors</h4>
                            <h6 class="card-subtitle">Nullam dolor isnibh ultricies vehicula adipiscing</h6>

                            <div class="widget-visitors__stats">
                                <div>
                                    <strong>23528</strong>
                                    <small>Visitor for last 24 hours</small>
                                </div>
                                <div>
                                    <strong>746</strong>
                                    <small>Visitors last 30 minutes</small>
                                </div>
                            </div>

                            <div class="widget-visitors__map map-visitors"></div>
                        </div>

                        <div class="listview listview--bordered">
                            <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Sunday, September 4, 21:44:02 (2 Mins 56 Seconds)</div>

                                    <div class="listview__attrs">
                                        <span><img class="widget-visitors__country" src="demo/img/flags/United_States_of_America.png" alt=""> United States</span>
                                        <span>Firefox</span>
                                        <span>Mac OSX</span>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Sunday, September 4, 20:21:01 (5 Mins 12 Seconds)</div>

                                    <div class="listview__attrs">
                                        <span><img class="widget-visitors__country" src="demo/img/flags/Australia.png" alt=""> Australia</span>
                                        <span>Chrome</span>
                                        <span>Android</span>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Sunday, September 4, 20:21:10 (10 Mins 43 Seconds)</div>

                                    <div class="listview__attrs">
                                        <span><img class="widget-visitors__country" src="demo/img/flags/Brazil.png" alt=""> Brazil</span>
                                        <span>Edge</span>
                                        <span>Windows</span>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Sunday, September 4, 20:59:04 (1 Min 02 Seconds)</div>

                                    <div class="listview__attrs">
                                        <span><img class="widget-visitors__country" src="demo/img/flags/South_Korea.png" alt=""> South Korea</span>
                                        <span>Chrome</span>
                                        <span>Android</span>
                                    </div>
                                </div>
                            </div>

                            <div class="listview__item">
                                <div class="listview__content">
                                    <div class="listview__heading">Sunday, September 4, 20:58:12 (3 Min 44 Seconds)</div>

                                    <div class="listview__attrs">
                                        <span><img class="widget-visitors__country" src="demo/img/flags/Japan.png" alt=""> Japan</span>
                                        <span>Chrome</span>
                                        <span>Windows</span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3"></div>
                        </div>
                    </div>

                    <div class="card widget-pie">
                        <div class="widget-pie__inner">
                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="50" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">92</span>
                                </div>
                                <div class="widget-pie__title">Email<br> Scheduled</div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="11" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">11</span>
                                </div>
                                <div class="widget-pie__title">Email<br> Bounced</div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="52" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">52</span>
                                </div>
                                <div class="widget-pie__title">Email<br> Opened</div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="44" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">44</span>
                                </div>
                                <div class="widget-pie__title">Storage<br>Remaining</div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="78" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">78</span>
                                </div>
                                <div class="widget-pie__title">Web Page<br> Views</div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-6 col-lg-4 widget-pie__item">
                                <div class="easy-pie-chart" data-percent="32" data-size="80" data-track-color="rgba(0,0,0,0.25)" data-bar-color="#fff">
                                    <span class="easy-pie-chart__value">32</span>
                                </div>
                                <div class="widget-pie__title">Server<br> Processing</div>
                            </div>
                        </div>
                    </div>

                    <div class="card widget-calendar">
                        <div class="actions">
                            <a href="calendar.html" class="actions__item zwicon-plus"></a>
                            <div class="dropdown actions__item">
                                <i class="zwicon-more-h" data-toggle="dropdown"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Refresh</a>
                                    <a class="dropdown-item" href="#">Calendar Settings</a>
                                </div>
                            </div>
                        </div>

                        <div class="widget-calendar__header">
                            <div class="widget-calendar__year"></div>
                            <div class="widget-calendar__day"></div>
                        </div>

                        <div id="widget-calendar-body"></div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Server Process</h4>
                            <h6 class="card-subtitle">Maecenas faucibus mollis interdum porttitor</h6>

                            <div class="flot-chart flot-dynamic"></div>
                            <div class="flot-chart-legends flot-chart-legends--dynamic"></div>
                        </div>
                    </div>
                </div>

              
            </section>
        </main>
         <!-- Older IE warning message -->
        <!--[if IE]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                <div class="ie-warning__downloads">
                    <a href="http://www.google.com/chrome">
                        <img src="img/browsers/chrome.png" alt="">
                    </a>

                    <a href="https://www.mozilla.org/en-US/firefox/new">
                        <img src="img/browsers/firefox.png" alt="">
                    </a>

                    <a href="http://www.opera.com">
                        <img src="img/browsers/opera.png" alt="">
                    </a>

                    <a href="https://support.apple.com/downloads/safari">
                        <img src="img/browsers/safari.png" alt="">
                    </a>

                    <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                        <img src="img/browsers/edge.png" alt="">
                    </a>

                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="img/browsers/ie.png" alt="">
                    </a>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->
@endsection

