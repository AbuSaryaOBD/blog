<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    @yield('styles') 

</head>

<body id="admin-page">

<div id="wrapper">

    @include('includes.admin_nav')

</div>

{{-- this div I created --}}
<div>
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
                            <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
    
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('users.index') }}">All Users</a>
                                </li>
    
                                <li>
                                    <a href="{{ route('users.create') }}">Create User</a>
                                </li>
    
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
    
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('posts.index') }}">All Posts</a>
                                </li>
    
                                <li>
                                    <a href="{{ route('posts.create') }}">Create Post</a>
                                </li>

                                <li>
                                    <a href="{{ route('comments.index') }}">All Comments</a>
                                </li>
    
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
    
    
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('categories.index') }}">All Categories</a>
                                </li>
    
                                <li>
                                    <a href="{{ route('categories.create') }}">Create Category</a>
                                </li>
    
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
    
    
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('media.index') }}">All Media</a>
                                </li>
    
                                <li>
                                    <a href="{{ route('media.create') }}">Upload Media</a>
                                </li>
    
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


    
                     
                    </ul>
    
    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

    
            <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>

                    @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->


</div>
<!-- /#i have created -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>



@yield('scripts')





</body>

</html>

