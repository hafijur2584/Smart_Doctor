<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/' . Auth::user()->images) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.hospitals.index') }}">
                    <i class="fa fa-files-o"></i> <span>Hospitals</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.disease.index') }}">
                    <i class="fa fa-files-o"></i> <span>Disease</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.medicine.index') }}">
                    <i class="fa fa-files-o"></i> <span>Medicine</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.symptom.index') }}">
                    <i class="fa fa-files-o"></i> <span>Symptom</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.team.index') }}">
                    <i class="fa fa-files-o"></i> <span>We Are</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.doctor.index') }}">
                    <i class="fa fa-files-o"></i> <span>Doctors</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.appointment.index') }}">
                    <i class="fa fa-files-o"></i> <span>Doctor Appointment</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.work.index') }}">
                    <i class="fa fa-files-o"></i> <span>How it Work</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            {{--<li class="treeview">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-files-o"></i>--}}
                    {{--<span>Home Page</span>--}}
                    {{--<span class="pull-right-container">--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> About GV</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>