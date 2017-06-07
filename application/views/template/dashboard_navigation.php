
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--Shortcut buttons-->
                    <!--================================-->
                    <div id="mainnav-shortcut">
                        <ul class="list-unstyled">
                            <li class="col-xs-4" data-content="Additional Sidebar">
                                <a id="demo-toggle-aside" class="shortcut-grid" href="#">
                                    <i class="fa fa-magic"></i>
                                </a>
                            </li>
                            <li class="col-xs-4" data-content="Notification">
                                <a id="demo-alert" class="shortcut-grid" href="#">
                                    <i class="fa fa-bullhorn"></i>
                                </a>
                            </li>
                            <li class="col-xs-4" data-content="Page Alerts">
                                <a id="demo-page-alert" class="shortcut-grid" href="#">
                                    <i class="fa fa-bell"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End shortcut buttons-->


                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">
                        
                                    <!--Category name-->
                                    <li class="list-header">Navigation</li>
                        
                                    <!--Menu list item-->
                                    <li class="active-link">
                                        <a href="<?php echo base_url();?>">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="menu-title">
                                                <strong>Dashboard</strong>
                                                <span class="label label-success pull-right">Top</span>
                                            </span>
                                        </a>
                                    </li>
                        
                                    <li class="list-divider"></li>
                        
                                    <!--Category name-->
                                    <li class="list-header">Transactions</li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="menu-title">Cashier</span>
                                        </a>
                                    </li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-book"></i>
                                            <span class="menu-title">Inventory</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?php echo base_url();?>inventory-page">Products List</a></li>
                                            <li><a href="<?php echo base_url();?>supply-logs-page">Supply Logs</a></li>       
                                            <li><a href="<?php echo base_url();?>damaged-items-page">Damaged Items</a></li>
                                        </ul>
                                    </li>
                        
                                    <li class="list-divider"></li>
                        
                                    <!--Category name-->
                                    <li class="list-header">Miscellaneous</li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cubes"></i>
                                            <span class="menu-title">Suppliers</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?php echo base_url();?>suppliers-page">Show List</a></li>            
                                        </ul>
                                    </li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            <span class="menu-title">Customers</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?php echo base_url();?>customers-page">Show List</a></li>
                                        </ul>
                                    </li>
                        
                                    <!--Menu list item-->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users"></i>
                                            <span class="menu-title">Users</span>
                                            <i class="arrow"></i>
                                        </a>
                        
                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="<?php echo base_url();?>users-page">Show List</a></li>
                                        </ul>
                                    </li>

                                    <li class="list-divider"></li>
                                    <!--Category name-->
                                    <li class="list-header">Reporting</li>
                                    <!--Menu list item-->

                                    <li>
                                        <a href="#">
                                            <i class="fa fa-area-chart"></i>
                                            <span class="menu-title">Reports</span>
                                            <i class="arrow"></i>
                                        </a>

                                        <!--Submenu-->
                                        <ul class="collapse">
                                            <li><a href="#">Sales</a></li>
                                            <li><a href="#">Inventory</a></li>
                                        </ul>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>
