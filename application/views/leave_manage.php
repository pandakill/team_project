<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">操作</a></li>
                    <li class="active">假条管理</li>
                </ul>
                <!-- END BREADCRUMB -->              

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START PANELS WITH CONTROLS -->
                    <div class="row">

                        <!-- 假条开始 -->
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="panel panel-warning panel-hidden-controls panel-toggled">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><b>陈俊杰</b>&nbsp;&nbsp;<small>工程部</small></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-up"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <form action="" method="POST" class="form-horizontal" role="form">
                                    <div class="panel-body">
                                        <div class="row">
                                            <p>请假理由如下：</p>
                                            <p>世界这么大，我想去看看。</p>
                                            <p>请假审批：</p>
                                            <textarea name="examination" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>      
                                    <div class="panel-footer">                                
                                        <button class="btn btn-info pull-right approve_btn">批准</button>
                                        <button class="btn btn-primary pull-left refuse_btn">拒绝</button>
                                    </div>   
                                </form>
                            </div>
                        </div>
                        <!-- 假条结束 -->

                        <div class="col-md-4">
                            
                        </div>
                        
                    </div>
                    <!-- END PANELS WITH CONTROLS --> 

                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo resources_url();?>/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo resources_url();?>/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END PAGE PLUGINS -->        
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>        
        <!-- END TEMPLATE -->
        
        <script>
            $("#pc_refresh").click(function(){                                        
                function p_refresh_shown(){
                    alert("shown");
                    panel_refresh($("#pc_refresh").parents(".panel"),"hidden",function(){alert("hidden")});
                }
                panel_refresh($("#pc_refresh").parents(".panel"),"shown",p_refresh_shown);

            });                         
            
            $("#pc_collapse").click(function(){                                        
                function p_collapse_hidden(){                                            
                    alert("hidden");                                            
                    panel_collapse($("#pc_collapse").parents(".panel"),"shown",function(){alert('shown')});
                }
                panel_collapse($("#pc_collapse").parents(".panel"),"hidden",p_collapse_hidden);
            });           
            
            $("#pc_remove").click(function(){                                        
                function p_remove_before(){
                    alert("before");
                    panel_remove($("#pc_remove").parents(".panel"),"after",function(){alert("after")});
                }
                panel_remove($("#pc_remove").parents(".panel"),"before",p_remove_before);

            });        


            //批准按钮
            $(".approve_btn").click(function(){
                var examination = $(this).parents("form").find('textarea').val();
                alert("！！！批准！审批内容为："+examination);
            });
            //拒绝按钮
            $(".refuse_btn").click(function(){
                var examination = $(this).parents("form").find('textarea').val();
                alert("...拒绝。审批内容为："+examination);
            })
        
        </script>       
        
    <!-- END SCRIPTS -->     