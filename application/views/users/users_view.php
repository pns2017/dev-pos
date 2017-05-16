    
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
                    <li class="active">Users List</li>
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
                            <button class="btn btn-success" onclick="add_data()">+ Add User</button>
                            <br><br>
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>User Id</th>
                                        <th>User Type</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th class="min-tablet">Contact Number</th>
                                        <th class="min-desktop">Email Address</th>
                                        <th class="min-tablet">Addres</th>
                                        <th class="min-tablet">Date Registered</th>
                                        <th style="width:60px;">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
   

   

            <!-- Bootstrap modal (Data Entry) -->
            <div class="modal fade" id="modal_form_user" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">User's Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" name="id"/> 
                                <div class="form-body">
                                    <div class="form-group">   
                                        <label class="control-label col-md-3">User Type:</label>
                                        <div class="col-md-9">
                                            <select name="user_type" class="form-control" >
                                                <option value="">--Select Type--</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Cashier</option>
                                                <option value="3">Stockman</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Username:</label>
                                        <div class="col-md-9">
                                            <input name="username" placeholder="username" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
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
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Last Name:</label>
                                        <div class="col-md-9">
                                            <input name="lastname" placeholder="Last Name" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">First Name:</label>
                                        <div class="col-md-9">
                                            <input name="firstname" placeholder="First Name" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Middle Name:</label>
                                        <div class="col-md-9">
                                            <input name="middlename" placeholder="Middle Name" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Contact:</label>
                                        <div class="col-md-9">
                                            <input name="contact" placeholder="Contact Number" class="form-control" type="number">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email Address:</label>
                                        <div class="col-md-9">
                                            <input name="email" placeholder="Email Address" class="form-control" type="email">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3">Address:</label>
                                        <div class="col-md-9">
                                            <textarea name="address" placeholder="Address" class="form-control"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->

            <!-- Bootstrap modal (Permission)-->
            <div class="modal fade" id="modal_form_permission" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">User's Permission</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" name="id"/> 
                                <div class="form-body">
                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Inventory Module</label>
                                        <div class="col-md-9">
                                            <select name="inventory" class="form-control" >
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>                                    
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">   
                                        <label class="control-label col-md-3">User Module:</label>
                                        <div class="col-md-9">
                                            <select name="user" class="form-control" >
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Transaction Module:</label>
                                        <div class="col-md-9">
                                            <select name="transaction" class="form-control" >
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>                                    
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">   
                                        <label class="control-label col-md-3">Report Module:</label>
                                        <div class="col-md-9">
                                            <select name="report" class="form-control" >
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>                                    
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->

