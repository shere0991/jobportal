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
        <li class="active"><a href="{{ url('admin/add-company') }}" class="text-red"><i class="fa fa-plus text-red"></i><span>Company</span></a></li> 
        <li><a href="{{ route('job-post.store') }}" class="text-green"><i class="fa fa-send text-green"></i><span>Post Job</span></a></li> 
        <li><a href="{{ url('admin/job-list') }}" class="text-aqua"><i class="fa fa-medium text-aqua"></i><span>Published Job</span></a></li> 
        <li><a href="{{ url('admin/archive-job') }}" class="text-yellow"><i class="fa fa-archive" aria-hidden="true"></i><span>Archived Job</span></a></li> 
        <li><a href="{{ url('admin/create-user') }}" class="text-red"><i class="fa fa-user"></i> <span>Create User</span></a></li>
        <li><a href="{{ url('admin/add-role') }}" class="text-aqua"><i class="fa fa-plus"></i> <span>Add Role</span></a></li>
        {{-- <li><a href="{{ url('interview') }}"><i class="fa fa-phone text-yellow"></i><span>Interview Call</span></a></li> 
        <li><a href="{{ url('confirmation') }}"><i class="fa fa-check text-red"></i><span>Confirmation</span></a></li> --}} 
        <li><a href="{{ url('admin/register-user') }}"><i class="fa fa-users text-green"></i><span>Register User</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>