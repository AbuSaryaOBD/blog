<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
    </div>
    <!-- /.navbar-header -->



    <ul class="nav navbar-top-links navbar-right">


        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li class="dropdown-item"><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li class="dropdown-item"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-item"><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->


    </ul>


    {{-- <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/profile"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                    </li>




                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="navbar nav-second-level">
                            <li class="nav-item">
                                <a class="nav-link" href="">All Posts</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="">Create Post</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>





                </ul>

            </div>

        </div>
    <!-- Page Content --> --}}

    
</nav>
