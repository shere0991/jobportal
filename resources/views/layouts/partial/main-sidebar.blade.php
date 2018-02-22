 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     {{--  <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p>{{ Auth::user()->FirstName }}&nbsp;{{ Auth::user()->LastName }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}
      <!-- search form -->
     {{--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       {{--  <li class="treeview active">
          <a href="{{ url('profile') }}">
            <i class="fa fa-user text-red"></i>
            <span>Profile</span>
          </a>
        </li> --}}
        <li class="active"><a href="{{ url('profile/'.Auth::user()->Username) }}"><i class="fa fa-user text-red"></i><span>Profile</span></a></li> 
        <li><a href="{{ url(Auth::user()->id.'/'.Auth::user()->Username.'/applied-online') }}"><i class="fa fa-files-o text-aqua"></i><span>Applied Job</span></a></li> 
        {{-- <li><a href="{{ url('interview') }}"><i class="fa fa-phone text-yellow"></i><span>Interview Call</span></a></li> 
        <li><a href="{{ url('confirmation') }}"><i class="fa fa-check text-red"></i><span>Confirmation</span></a></li> --}} 
        <li><a href="{{ url('watchlist') }}"><i class="fa fa-eye text-green"></i><span>Watch List</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>