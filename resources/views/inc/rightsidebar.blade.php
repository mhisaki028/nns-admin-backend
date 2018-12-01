 <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> ACCOUNT <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="m-t-20 chatonline">
                               
                               
                                <li><img src="plugins/images/user.png" alt="user-img" class="img-circle"> <span> {{ Auth::user()->name }}<br><small class="text-success">online</small></span></a>
                                </li>
                                
                                        <li class="devider"></li>
                                       
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> <span class="hide-menu">Logout</span></a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                  
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->