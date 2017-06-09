            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Dashboard</h1>

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
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                
                    <!--Tiles - Bright Version-->
                    <!--===================================================-->
                   <div class="col-lg-12">
                    <div class="row">
                        <!--Network Line Chart-->
                            <!--===================================================-->
                            <div id="demo-panel-network" class="panel">
                                <div class="panel-heading">
                                    <div class="panel-control">
                                        <button id="demo-panel-network-refresh" data-toggle="panel-overlay" data-target="#demo-panel-network" class="btn"><i class="fa fa-rotate-right"></i></button>
                                        <div class="btn-group">
                                            <button class="dropdown-toggle btn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h3 class="panel-title">Network</h3>
                                </div>
                    
                                <!--Morris line chart placeholder-->
                                <div id="morris-chart-network" class="morris-full-content"></div>
                    
                                <!--Chart information-->
                                <div class="panel-body bg-primary" style="position:relative;z-index:2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-8">
                    
                                                    <!--Server load stat-->
                                                    <div class="pad-ver media">
                                                        <div class="media-left">
                                                            <span class="icon-wrap icon-wrap-xs">
                                                                <i class="fa fa-cloud fa-2x"></i>
                                                            </span>
                                                        </div>
                    
                                                        <div class="media-body">
                                                            <p class="h3 text-thin media-heading">30%</p>
                                                            <small class="text-uppercase">Server Load</small>
                                                        </div>
                                                    </div>
                    
                                                    <!--Progress bar-->
                                                    <div class="progress progress-xs progress-dark-base mar-no">
                                                        <div class="progress-bar progress-bar-light" style="width: 30%"></div>
                                                    </div>
                    
                                                </div>
                                                <div class="col-xs-4">
                                                    <!-- User Online -->
                                                    <div class="text-center">
                                                        <span class="text-3x text-thin">43</span>
                                                        <p>User Online</p>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <!--Additional text-->
                                            <div class="mar-ver">
                                                <small class="pad-btm"><em>* Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</em></small>
                                            </div>
                    
                                        </div>
                                        <div class="col-lg-6">
                    
                                            <!-- List Group -->
                                            <ul class="list-group bg-trans mar-no">
                                                <li class="list-group-item">
                                                    <!-- Sparkline chart -->
                                                    <div id="demo-chart-visitors" class="pull-right"></div> Visitors
                                                </li>
                                                <li class="list-group-item">
                                                    <!-- Sparkline chart -->
                                                    <div id="demo-chart-bounce-rate" class="pull-right"></div> Bounce rate
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-success">11</span>
                                                    Today sales
                                                </li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-warning">20</span>
                                                    Broken links found
                                                </li>
                                            </ul>
                    
                                        </div>
                                    </div>
                                </div>
                    
                    
                            </div>
                            <!--===================================================-->
                            <!--End network line chart-->
                    </div>
                    </div>
                    <!--===================================================-->
                    <!--End Tiles - Bright Version-->               
                    <div class="row">
                        <div class="col-lg-12">                  
                            <div class="row">
                            <!--Large tile (Visit Today)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="col-sm-6 col-md-3">
                                    <div class="panel panel-dark panel-colorful">
                                        <div class="panel-body text-center">
                                            <p class="text-uppercase mar-btm text-sm">Visit Today</p>
                                            <i class="fa fa-users fa-5x"></i>
                                            <hr>
                                            <p class="h2 text-thin">254,487</p>
                                            <small><span class="text-semibold">7%</span> Higher than yesterday</small>
                                        </div>
                                    </div>
                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--End large tile (Visit Today)-->
                    
                    
                                <!--Large tile (Comments)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="col-sm-6 col-md-3">
                                    <div class="panel panel-danger panel-colorful">
                                        <div class="panel-body text-center">
                                            <p class="text-uppercase mar-btm text-sm">Comments</p>
                                            <i class="fa fa-comment fa-5x"></i>
                                            <hr>
                                            <p class="h2 text-thin">873</p>
                                            <small><span class="text-semibold"><i class="fa fa-unlock-alt fa-fw"></i> 154</span> Unapproved comments</small>
                                        </div>
                                    </div>
                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--Large tile (Comments)-->
                    
                    
                                <!--Large tile (New orders)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="col-sm-6 col-md-3">
                                    <div class="panel panel-success panel-colorful">
                                        <div class="panel-body text-center">
                                            <p class="text-uppercase mar-btm text-sm">New Orders</p>
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                            <hr>
                                            <p class="h2 text-thin">2,423</p>
                                            <small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small>
                                        </div>
                                    </div>
                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--End Large tile (New orders)-->

                                                    
                                <!--Large tile (New orders)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="col-sm-6 col-md-3">
                                    <div class="panel panel-primary panel-colorful">
                                        <div class="panel-body text-center">
                                            <p class="text-uppercase mar-btm text-sm">New Orders</p>
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                            <hr>
                                            <p class="h2 text-thin">2,423</p>
                                            <small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small>
                                        </div>
                                    </div>
                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--End Large tile (New orders)-->
                            </div>                
                        </div>
                    </div>
                    
                    
                    
                </div>
                <!--===================================================-->
                <!--End page content-->


            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
        