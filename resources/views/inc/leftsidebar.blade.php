 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li><img src="plugins/images/mdlablogo.png" style="width:150px;height:150px;display:block;margin-left: auto;margin-right: auto;" alt="Home" /></li>
                    </li><br><br>   
                    

                    <li><a href="{{ url('/home')}}" class="waves-effect"><i class="icon-home fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard <span class="fa arrow"></span> <span class="label label-rouded label-inverse pull-right"></span></span></a>
                    </li>


                    <li><a href="{{ url('/patient')}}" class="waves-effect"><i class="icon-people fa-fw" data-icon="v"></i><span class="hide-menu"> Patients <span class="fa arrow"></span><span class="label label-rouded label-info pull-right"></span></span></a>
                    </li>

                    <li><a href="{{ url('/lab') }}" class="waves-effect"><i class="icon-chemistry fa-fw"></i> <span class="hide-menu">Medical Labs<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right"></span></span></a>
                    
                    </li>

                     <li><a href="{{ url('/medtech') }}" class="waves-effect"><i class="icon-user-female fa-fw"></i> <span class="hide-menu">MedTechs<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right"></span></span></a>

                    <li><a href="{{ url('/service') }}" class="waves-effect"><i class="icon-chemistry fa-fw"></i> <span class="hide-menu">Lab Services<span class="fa arrow"></span><span class="label label-rouded label-warning pull-right"></span></span></a>

                    <li> <a href="{{ url('/booking')}}" class="waves-effect"><i class="icon-book-open fa-fw" data-icon="v"></i> <span class="hide-menu"> Booking Request <span class="fa arrow"></span> <span class="label label-rouded label-danger pull-right"></span></span></a>
                    </li>

                
                    <li> <a href="{{ url('/earnings')}}" class="waves-effect"><i class="fa fa-dollar fa-fw" data-icon="v"></i> <span class="hide-menu"> Total Earnings <span class="fa arrow"></span> <span class="label label-rouded label-danger pull-right"></span></span></a>
                    </li>


                    <li class="devider"></li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                    </li>
                    
                    <li><a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="hide-menu">Log out</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    </li>
                   
                


                   
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->