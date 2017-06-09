         <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow"><?php echo $title; ?></h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->

                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url().'dashboard';?>">Dashboard</a></li>
                    <li><a>Transaction</a></li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">  <!--Searchbox-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="search">
                                    <div class="input-group">
                                      <input class="form-control" placeholder="Search" id="srch-term" type="text">
                                      <div class="input-group-btn">
                                        <button id="btn_search" class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                      </div>
                                    </div>
                                </form>
             
                                <!--Condensed Table-->
                                <!--===================================================-->
                                <div class="panel-body tran_container">
                                    <table class="table  table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Invoice</th>
                                                    <th>User</th>
                                                    <th>Quantity</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="#fakelink" class="btn-link">Order #53451</a></td>
                                                    <td>Scott S. Calabrese</td>
                                                    <td>5d</td>
                                                    <td>$24.98</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-xs btn-success add-tooltip"  data-toggle="tooltip" href="#" data-original-title="Delete" data-container="body"><i class="fa fa-check"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </div><!--===================================================--><!--End Condensed Table-->
                        </div> <!-- end of col-md-7 -->
                        <div class="col-md-5">
                            <!--Bordered Table-->
                                <!--===================================================-->
                                <div class="panel-body">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Items in Cart</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SKU</th>
                                                    <th class="text-center">Item Name</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Discount(%)</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center"><a href="#" class="btn-link">Sample</a></td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center"><select class="1-100"></select></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-xs btn-danger add-tooltip"  data-toggle="tooltip" href="#" data-original-title="Delete" data-container="body"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="panel media pad-all">
                                            <div class="media-left">
                                                <span class="icon-wrap icon-wrap-sm icon-circle bg-info">
                                                <i class="fa fa-shopping-cart fa-2x"></i>
                                                </span>
                                            </div>
                                
                                            <div class="media-body">
                                                <p class="text-muted mar-no">Number of Items</p>
                                                <p class="text-2x mar-no text-thin">543</p> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel media pad-all">
                                            <div class="media-left">
                                                <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
                                                <i class="fa fa-dollar fa-2x"></i>
                                                </span>
                                            </div>
                                
                                            <div class="media-body">
                                                <p class="text-muted mar-no">Total Payable</p>
                                                <p class="text-2x mar-no text-thin">654</p>
                                            </div>
                                        </div>
                                    </div>
                            <div class="btn-group btn-group-justified">
                                <a href="javascript:void(0)" class="btn btn-lg btn-mint">Cancel</a>
                                <a href="javascript:void(0)" class="btn btn-lg btn-danger">Payment</a>
                            </div>
                        </div>
                    </div>
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

            