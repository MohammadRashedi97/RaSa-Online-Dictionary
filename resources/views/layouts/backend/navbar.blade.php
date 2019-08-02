<!-- Main Header -->
<header class="main-header">

     <!-- Logo -->
     <a href="{{route('dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
     </a>

     <!-- Header Navbar -->
     <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="{{route('dashboard')}}" class="sidebar-toggle" data-toggle="push-menu" role="button">
               <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                         <!-- Menu Toggle Button -->
                         <?php $currentUser = Auth::user() ?>
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <!-- The user image in the navbar-->
                              <img src="{{ asset("img/avatar.png") }}" class="user-image" alt="{{$currentUser->name}}">
                              <!-- hidden-xs hides the username on small devices so only the image appears. -->
                              <span class="hidden-xs">{{$currentUser->name}}</span>
                         </a>
                         <ul class="dropdown-menu">
                              <!-- The user image in the menu -->
                              <li class="user-header">
                                   <img src="{{ asset("img/avatar.png") }}" class="img-circle" alt="">
                              </li>
                              <!-- Menu Footer-->
                              <li class="user-footer">
                                   <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                   </div>
                                   <div class="text-center">
                                        <a href="{{route('index')}}" class="btn btn-default btn-flat" style="margin-left: -60px;">Dictionary</a>
                                   </div>
                                   <div class="pull-right" style="position: relative;top: -33px;">
                                        <!-- Logout needs a POST header -->
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                             style="display: none;">
                                             {{ csrf_field() }}
                                        </form>
                                   </div>
                              </li>
                         </ul>
                    </li>
               </ul>
          </div>
     </nav>
</header>