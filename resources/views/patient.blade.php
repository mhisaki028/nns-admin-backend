@if(count($all_patient)>0)

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
                            <li><a href="javascript:void(0)">Registered Patients</a></li>
                            <li class="active">myMDLab</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm 12">
                        <div class="white-box">

                            <form method="POST" action="{{ url('/addPatient') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Contact Number" required> </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="emailaddress@gmail.com" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required> </div>
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list color-table success-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Email Address</th>
                                                <th>Password</th>
                                              
                                            
                                            </tr>
                                        </thead>
                                        <div class="form-inline padding-bottom-15">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right m-b-20">
                                            <div class="form-group">
                                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off"> </div>
                                        </div>
                                    </div>
                                </div>
                                        <tbody>
                                            @if(count($all_patient)>0)
                                                @foreach($all_patient as $patient)


                                            
                                            <tr>
                                                <td> {{ $patient['name'] }}</td>
                                                <td> {{ $patient['phone'] }}</td>
                                                <td> {{ $patient['email'] }}</td>
                                                <td> {{ $patient['password'] }}</td>
                                   
                                            
                                            </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            
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
                                    
               
            </div>
            <!-- /.container-fluid -->

            @else

            @include('inc/main')
        
                    
                    <section id="wrapper" class="error-page">
                      <div class="error-box">
                        <div class="error-body text-center">
                          <h1 class="text-danger">Error</h1>
                          <h3 class="text-uppercase">No Records Found in Patient's Table !</h3>
                          <p class="text-muted m-t-30 m-b-30">DO YOU WANT TO ADD A NEW PATIENT RECORD?</p>
                          <button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">YES</a> </div>
                        
                      </div>
                    </section>       

                    <div id="modal-add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Add Patient</h4> </div>
                                                            <div class="modal-body">
                
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ url('/addPatient') }}">
                                         <div class="form-group">
                                            @csrf
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="+639" required> </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="mymdlab.services@gmail.com" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required> </div>
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                  

                
@endif
            