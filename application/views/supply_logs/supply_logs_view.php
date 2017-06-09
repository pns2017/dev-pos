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
                    <li><a href="<?php echo base_url().'dashboard';?>">Dashboard</a></li>
                    <li class="active">Supply Logs</li>
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
                            <h3 class="panel-title">Supply Logs Information Table</h3>
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> &nbsp;Reload</button>
                            <br><br>
                            <table id="supply-logs-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SupplyNo.</th>
                                        <th>Supplier</th>
                                        <th>SKU</th>
                                        <th>ProductName</th>
                                        <th>Quantity</th>
                                        <th>Expense</th>
                                        <th>DateTime</th>
                                        <th style="width:50px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Striped Table -->
                    <span>&nbsp; <i style = "color: white;" class="fa fa-square"></i> - In Stock value has been added &nbsp; | &nbsp; <i style = "color: #ff6666;" class="fa fa-square"></i> - In Stock value has been removed (due to corrections / modifications)</span>
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

        <!-- Bootstrap modal -->
            <div class="modal fade" id="modal_form" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Product Details</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">SKU :</label>
                                        <div class="col-md-9">
                                            <input name="sku" placeholder="SKU" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Product Name :</label>
                                        <div class="col-md-9">
                                            <input name="name" placeholder="Product Name" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description :</label>
                                        <div class="col-md-9">
                                            <input name="description" placeholder="Description" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Category :</label>
                                        <div class="col-md-9">
                                            <input name="category" placeholder="Category" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Price :</label>
                                        <div class="col-md-9">
                                            <input name="unit_price" placeholder="Unit Price" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Cost :</label>
                                        <div class="col-md-9">
                                            <input name="unit_cost" placeholder="Unit Cost" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">In Stock :</label>
                                        <div class="col-md-9">
                                            <input name="in_stock" placeholder="In Stock" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Sold :</label>
                                        <div class="col-md-9">
                                            <input name="unit_sold" placeholder="Unit Sold" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Damaged :</label>
                                        <div class="col-md-9">
                                            <input name="unit_damaged" placeholder="Unit Damaged" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Lost :</label>
                                        <div class="col-md-9">
                                            <input name="unit_lost" placeholder="Unit Lost" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Reorder Point :</label>
                                        <div class="col-md-9">
                                            <input name="reorder_point" placeholder="Reorder Point" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp;Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->
