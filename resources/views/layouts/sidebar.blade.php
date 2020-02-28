<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{displayImage(Auth::user()->image)}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p> @if(Auth::check()){{ Auth::user()->name }} @endif</p>

            </div>
        </div> <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ (Request::segment(1) === 'home') ? 'active' : '' }} ">
                <a href="{{ url('admin/home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a>
            </li>

            <!-- User Management -->
            <li class="treeview {{ (Request::segment(1) === 'user') ? 'active' : '' }}">
                <a href="{{ url('admin/user')}}"> <i class="fa fa-users"></i> <span>User Management</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit "></i> <span>Add Packages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/addpackage')}}"><i class="fa fa-building nav_icon"></i> Add Packages</a></li>
                    <li><a href="{{url('admin/addhotel')}}"><i class="fa fa-bed nav_icon"></i> Add Hotels</a></li>
                    <li><a href="{{url('admin/viewpackage')}}"><i class="fa fa-indent nav_icon"></i> <span>View Packages</span></a></li>
                    <li><a href="{{url('admin/viewhotel')}}"><i class="fa fa-hotel nav_icon"></i> <span>View Hotels</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit "></i> <span>Add Custom Packages</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/customplaces')}}"><i class="fa fa-building nav_icon"></i> Add Places</a></li>
                    <li><a href="{{url('admin/customhotel')}}"><i class="fa fa-bed nav_icon"></i> Add Custom Hotels</a></li>
                    <li><a href="{{url('admin/viewcustomplaces')}}"><i class="fa fa-indent nav_icon"></i> <span>View Custom Places</span></a></li>
                    <li><a href="{{url('admin/viewcustomhotel')}}"><i class="fa fa-hotel nav_icon"></i> <span>View Custom Hotels</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book nav_icon"></i> <span>View Booking</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/viewbooking')}}"><i class="fa fa-building nav_icon"></i> Booking</a></li>
                    <li><a href="{{url('admin/viewcustombooking')}}"><i class="fa fa-bed nav_icon"></i> Custom Booking</a></li>                    
                </ul>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/bookingreport')}}"><i class="fa fa-building nav_icon"></i>Booking Report</a></li>
                    <li><a href="{{url('admin/custombookingreport')}}"><i class="fa fa-building nav_icon"></i>Custom Booking Report</a></li>
                    <li><a href="{{url('admin/packagereport')}}"><i class="fa fa-bed nav_icon"></i> Package Report</a></li>                    
                </ul>
            </li>

        </ul>
    </section> <!-- /.sidebar -->
</aside>