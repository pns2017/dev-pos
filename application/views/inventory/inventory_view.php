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
                    <li class="active">Products List</li>
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
                            <h3 class="panel-title">Products Information Table</h3>
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-success" onclick="add_product()"><i class="fa fa-plus-square"></i> &nbsp;Add Product</button>
                            <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i> &nbsp;Reload</button>
                            <br><br>
                            <table id="inventory-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th class="min-tablet">Price</th>
                                        <th class="min-desktop">Cost</th>
                                        <th class="min-desktop">InStock</th>
                                        <th class="min-desktop">Sold</th>
                                        <th class="min-desktop">Dmgd</th>
                                        <th class="min-desktop">Lost</th>
                                        <th class="min-desktop">Reorder</th>
                                        <th style="width:130px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Striped Table -->
                    <span>&nbsp; <i style = "color: #666666;" class="fa fa-square"></i> - Empty stock (zero In Stock value) &nbsp; | &nbsp; <i style = "color: #ff6666;" class="fa fa-square"></i> - Stock below reorder point level value &nbsp; | &nbsp; <i style = "color: #ffff00;" class="fa fa-square"></i> - Stock equal to reorder point level value</span>
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
                            <h3 class="modal-title">Product Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" name="sku"/> 
                                <input type="hidden" value="" name="current_name"/>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name :</label>
                                        <div class="col-md-9">
                                            <input name="name" placeholder="Product Name" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description :</label>
                                        <div class="col-md-9">
                                            <input name="description" placeholder="Description" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Category :</label>
                                        <div class="col-md-9">
                                            <input name="category" placeholder="Category" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Price :</label>
                                        <div class="col-md-9">
                                            <textarea name="unit_price" placeholder="Unit Price" class="form-control"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Cost :</label>
                                        <div class="col-md-9">
                                            <input name="unit_cost" placeholder="Unit Cost" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Reorder Point :</label>
                                        <div class="col-md-9">
                                            <input name="reorder_point" placeholder="Reorder Point" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="fa fa-floppy-o"></i> &nbsp;Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> &nbsp;Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- End Bootstrap modal -->

            <!-- Bootstrap modal for ADDING STOCK -->
            <div class="modal fade" id="modal_form_add_stock" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Add Stock Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form_add_stock" class="form-horizontal">
                                <input type="hidden" value="" name="sku"/>
                                <input type="hidden" value="" name="cost"/>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <input name="name" placeholder="Product Name" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Cost</label>
                                        <div class="col-md-9">
                                            <input name="unit_cost" placeholder="Unit Cost" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">In Stock</label>
                                        <div class="col-md-9">
                                            <input name="in_stock" placeholder="In Stock" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Reorder Point</label>
                                        <div class="col-md-9">
                                            <input name="reorder_point" placeholder="Reorder Point" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Supplier</label>
                                        <div class="col-md-9">
                                            <select name="supplier_id" class="form-control">
                                                <option value="">--Select Supplier--</option>
                                                <?php 
                                                    foreach($suppliers as $row)
                                                    { 
                                                      echo '<option value="'.$row->supplier_id.'">'.$row->name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Quantity</label>
                                        <div class="col-md-9">
                                            <input name="quantity" placeholder="Quantity" class="form-control" type="text">
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


            <!-- Bootstrap modal for DAMAGED ITEMS -->
            <div class="modal fade" id="modal_form_damaged_items" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Damaged Items Form</h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form_damaged_items" class="form-horizontal">
                                <input type="hidden" value="" name="sku"/>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <input name="name" placeholder="Product Name" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Cost</label>
                                        <div class="col-md-9">
                                            <input name="unit_cost" placeholder="Unit Cost" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">In Stock</label>
                                        <div class="col-md-9">
                                            <input name="in_stock" placeholder="In Stock" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Unit Damaged</label>
                                        <div class="col-md-9">
                                            <input name="unit_damaged" placeholder="Unit Damaged" class="form-control" type="text" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Quantity</label>
                                        <div class="col-md-9">
                                            <input name="quantity" placeholder="Quantity" class="form-control" type="text">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Remarks</label>
                                        <div class="col-md-9">
                                            <textarea name="remarks" placeholder="Remarks" class="form-control"></textarea>
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