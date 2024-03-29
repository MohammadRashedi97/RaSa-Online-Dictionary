<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
               <div class="pull-left image">
                    <img src="{{ asset("img/avatar.png") }}" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree" id="sidebar">
               <!-- Optionally, you can add icons to the links -->
               <li id="dashboard"><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
               <li id="dictionary"><a href="/backend/dictionary"><i class="fa fa-book"></i> <span>Dictionary</span></a></li>
               @role(['admin', 'editor'])
                    <li id="categories"><a href="{{route('backend.categories.index')}}"><i class="fa fa-folder"></i>
                         <span>Categories</span></a>
                    </li>
               @endrole
               @role('admin')
                    <li id="users"><a href="{{route('backend.users.index')}}"><i class="fa fa-users"></i>
                         <span>Users</span></a>
                    </li>
               @endrole
          </ul>
          <!-- /.sidebar-menu -->
     </section>
     <!-- /.sidebar -->
</aside>