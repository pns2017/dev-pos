    
         <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow"><?php echo $title; ?></h1>

                    <!--Searchbox-->
                    <div class="searchbox">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->

                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Dashboard</a></li>
                    <li><a href="<?php echo site_url('users-page');?>">Users List</a></li>
                    <li class="active">Basic Information</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <!-- Basic Data Tables -->
                    <!--===================================================-->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">User's Information Table</h3>
                        </div>
                        <div class="panel-body">
                           
                            <button class="btn btn-success" onclick="_password()">Update Password</button>
                            <br><br>
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" name="id" value="<?php echo $users['user_id'] ?>"> 
                                <div class="form-group">
                                    <label class="control-label col-md-3">Username:</label>
                                    <div class="col-md-9">
                                        <input name="username" placeholder="username" class="form-control" type="text" value="<?php echo $users['username'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <!--Basic Info-->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Last Name:</label>
                                    <div class="col-md-9">
                                        <input name="lastname" placeholder="Last Name" class="form-control" type="text" value="<?php echo $users['lastname'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">First Name:</label>
                                    <div class="col-md-9">
                                        <input name="firstname" placeholder="First Name" class="form-control" type="text" value="<?php echo $users['firstname'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Middle Name:</label>
                                    <div class="col-md-9">
                                        <input name="middlename" placeholder="Middle Name" class="form-control" type="text" value="<?php echo $users['middlename'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Contact:</label>
                                    <div class="col-md-9">
                                        <input name="contact" placeholder="Contact Number" class="form-control" type="number" value="<?php echo $users['contact'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email Address:</label>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="Email Address" class="form-control" type="email" value="<?php echo $users['email'] ?>">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address:</label>
                                    <div class="col-md-9">
                                        <textarea name="address" placeholder="Address" class="form-control" value=""><?php echo $users['address'] ?></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div> 
               
                            </div>
                        </form>
                        <div class="panel-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Update</button>
                            
                        </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Striped Table -->
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
   

   

            <!-- Bootstrap modal (Password) -->
            <div class="modal fade" id="modal_form_password" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">User's Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?php echo $users['user_id'] ?>"/> 
                                   <div class="form-group">
                                        <label class="control-label col-md-3">Password:</label>
                                        <div class="col-md-9">
                                            <input name="password" placeholder="Password" class="form-control" type="password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Re-enter Password:</label>
                                        <div class="col-md-9">
                                            <input name="repassword" placeholder="Re-enter Password" class="form-control" type="password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="_save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->

            