<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            
            <li>
                <a href="{{ url('admin/post') }}"><i class="fa fa-edit fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/post') }}">All Posts</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/post/create') }}">Add New</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/category') }}">Categories</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/tag') }}">Tags</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="{{ url('admin/page') }}"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('admin/page') }}">All Pages</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/page/create') }}">Add New</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->