<?php
if (! defined ( 'BASEPATH' ))
  exit ( 'No direct script access allowed' );
?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">首页</a></li>
                    <li class="active">任务中心</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">     
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-arrow-circle-o-left"></span> 任务中心</h2>
                        </div>                                                
                        <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>                                
                        <div class="pull-right" style="width: 100px; margin-right: 5px;">
                            <select class="form-control select">
                                <option>今天</option>                                
                                <option>昨天</option>
                                <option>前天</option>
                                <option>当前星期</option>
                            </select>
                        </div>
                        
                    </div>                    
                    <div class="content-frame-left">
                        <!--<div class="form-group">
                            <h4>添加新任务：</h4>
                            <textarea class="form-control push-down-10" id="new_task" rows="4" placeholder="请输入您的任务..."></textarea>                            
                            <button class="btn btn-primary" id="add_new_task"><span class="fa fa-edit"></span> 添加</button>
                        </div>                        
                         <div class="form-group push-up-10">
                            <h4>Searh in tasks:</h4>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="fa fa-search"></span></div>
                                <input type="text" class="form-control" placeholder="keyword..."/>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Task groups:</h4>
                            <div class="list-group border-bottom">
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Project #1</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Personal</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Project #2</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> Meetings</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-info"></span> Work</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>Tags:</h4>
                            <ul class="list-tags">
                                <li><a href="#"><span class="fa fa-tag"></span> amet</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> rutrum</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> nunc</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> tempor</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> eros</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> suspendisse</a></li>
                                <li><a href="#"><span class="fa fa-tag"></span> dolor</a></li>
                            </ul>                            
                        </div> -->
                        
                    </div>       
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                                                
                        <div class="row push-up-10">
                            <div class="col-md-4">
                                
                                <h3>此刻要做的</h3>
                                
                                <div class="tasks" id="tasks">
                                    <?php
                                        if( isset($getMissionsWillDos) ){
                                            foreach ($getMissionsWillDos as $getMissionsWillDo) {
                                                echo '
                                    <div class="task-item task-danger">                                    
                                        <div class="task-text">'.$getMissionsWillDo->descript.'</div>
                                        <div class="task-footer">
                                            <div class="pull-left"><span class="fa fa-clock-o"></span>start-time '. $getMissionsWillDo->startDate .'</div>
                                            <div class="pull-right"><span class="fa fa-pause"></span>end-time '. $getMissionsWillDo->endDate .'</div>
                                        </div>                                    
                                    </div>
                                                ';
                                            }
                                        }
                                    ?>
                                    
                                </div>                            

                            </div>
                            <div class="col-md-4">
                                <h3>将要做的</h3>
                                <div class="tasks" id="tasks_progreess">
                                    <?php
                                        if( isset($getMissionsIsDoings) ){
                                            foreach ($getMissionsIsDoings as $getMissionsIsDoing) {
                                                echo '
                                    <div class="task-item task-info task-complete">                                    
                                        <div class="task-text">'.$getMissionsIsDoing->descript.'</div>
                                        <div class="task-footer">
                                            <div class="pull-left"><span class="fa fa-clock-o"></span>start-time '. $getMissionsIsDoing->startDate .'</div>
                                            <div class="pull-right"><span class="fa fa-pause"></span>end-time '. $getMissionsIsDoing->endDate .'</div>
                                        </div>                                    
                                    </div>
                                                ';
                                            }
                                        }
                                    ?>                       
                                    
                                    <!--<div class="task-drop push-down-10">
                                        <span class="fa fa-cloud"></span>
                                        将任务拖拽至此表示正在进行
                                    </div>-->
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>已经完成的</h3>
                                <div class="tasks" id="tasks_completed">
                                    <?php
                                        if( isset($getMissionsFinisheds) ){
                                            foreach ($getMissionsFinisheds as $getMissionsFinished) {
                                                echo '
                                    <div class="task-item task-info">                                    
                                        <div class="task-text">'.$getMissionsFinished->descript.'</div>
                                        <div class="task-footer">
                                            <div class="pull-left"><span class="fa fa-clock-o"></span>start-time '. $getMissionsFinished->startDate .'</div>
                                            <div class="pull-right"><span class="fa fa-pause"></span>end-time '. $getMissionsFinished->endDate .'</div>
                                        </div>                                    
                                    </div>
                                                ';
                                            }
                                        }
                                    ?>   
                                    <!--<div class="task-drop">
                                        <span class="fa fa-cloud"></span>
                                        将任务拖拽至此表示完成
                                    </div> -->                                   
                                </div>
                            </div>
                        </div>                        
                                                
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                    
                </div>
                <!-- END CONTENT FRAME -->

            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

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

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-select.js"></script> 
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/demo_tasks.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->