@include('inc/main')
@include('inc/leftsidebar')
@include('inc/rightsidebar')
@include('inc/footer')

   <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper" style="font-size: 14px;">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">
                                    <span href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></span>
                            </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0)">Medical Lab Accounts</a></li>
                            <li class="active">myMDLab</li>
                        </ol>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h1>Medical Laboratories </h1> 
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                         <h3>Total Available Labs: <span class="label label-success m-r-10">{{ $c_lab }}</span></h3>
                            <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                           
                              </div>
                            <div class="table-responsive">
                               <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(count($labs)>0)
                                                @foreach($labs as $lab)
                                            <tr>
                                                <td>{{$lab->id}}</td>
                                                <td>{{$lab->name}}</td>
                                                <td>{{$lab->email}}</td>
                                                <td>

                                                     <a class="btn btn-default btn-outline m-r-5" 
                                                    id="edit-admin"
                                                    data-toggle="modal"
                                                    data-target="#modal-editL"
                                                    data-lid="{{ $lab->id }}"
                                                    data-lname="{{ $lab->name }}"
                                                    data-lemail="{{ $lab->email }}"
                                                    ><i class="ti-pencil-alt text-warning m-r-5"></i>Edit</a>
                                                    
                                                        <a href='{{ url("/deleteLab/{$lab->id}") }}' class="btn btn-default btn-outline m-r-5"
                                                        ><i class="icon-trash text-danger m-r-5"></i>Delete</a>
                                                    
                                                </td>
                                             
                                            </tr>
                                                @endforeach
                                            @endif
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <button id="add-lab" type="button" class="btn btn-success">Add New Lab</button>

                                                    <script>
                                                        $('#add-lab').click(function(){
                                                            openRedirect();
                                                        });

                                                        function openRedirect(){
                                                            sweetAlert({
                                                                title: "Leave this page?", 
                                                                text: "If you click 'OK', you will be redirected to the registration page", 
                                                                type: "warning",
                                                                showCancelButton: true
                                                            }, function(){
                                                                window.location.href = '{{ url('/logoutR') }}'
                                                            });
                                                        }

                                                        
                                                    </script>
                                                </td>
                                              
                                            
                                                     <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        
          <div id="modal-editL" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Lab</h4> </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ url('/editLab') }}">
                                                                  
                                                                  {{csrf_field()}}
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="id" id="id" value="">
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"> 
                                                                    </div>
                                                                     <div class="form-group">
                                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email"> 
                                                                    </div>
                                                                    

                                                                     <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success">Save</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                       
                                                                    </div>
                                                                </form>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
            