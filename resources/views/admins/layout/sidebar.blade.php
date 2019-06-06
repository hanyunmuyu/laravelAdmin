<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{$admin->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$admin->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
            <li class="header">主导航</li>
            @foreach($permissionList as $permission)
                @if(!isset($permission['subList'])))
                <li><a href="{{$permission['url']}}"><i class="fa fa-book"></i>
                        <span>{{$permission['permission_name']}}</span></a></li>
                @else
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            <span>{{$permission['permission_name']}}</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        @if(isset($permission['subList']))
                            <ul class="treeview-menu">
                                @foreach($permission['subList'] as $sub)
                                    <li>
                                        <a href="{{$sub['url']}}">
                                            <i class="fa fa-circle-o"></i>{{$sub['permission_name']}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
