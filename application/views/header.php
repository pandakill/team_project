<?php
if (! defined ( 'BASEPATH' ))
  exit ( 'No direct script access allowed' );
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>SXOA - 穗鑫管理系统</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo resources_url();?>/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo resources_url();?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/index.css"/>
    </head>
    <body>
    
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span><strong>退出</strong> ?</div>
                    <div class="mb-content">
                        <p> 您 确 定 要 退 出 吗 ？ </p>                    
                        <p> 如 果 你 想 继 续 操 作 ， 请 点 击 取 消 。 点 击 确 定 将 退 出 当 前 账 号 。</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="http://<?php echo my_base_url();?>/employee_login/logout" class="btn btn-success btn-lg">确定</a>
                            <button class="btn btn-default btn-lg mb-control-close">退出</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="http://<?php echo my_base_url();?>">S X O A</a>
                        <a href="http://<?php echo my_base_url();?>" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo resources_url();?>/assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?php echo resources_url();?>/assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo $logined['name']?></div>
                                <div class="profile-data-title"><?php echo $logined['job']?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li <?php echo ((strpos ( $category,'index'  ) !== false)?'class="active"':null);?>>
                        <a href="http://<?php echo my_base_url();?>">
                            <span class="fa fa-desktop"></span> 
                            <span class="xn-text">控制台</span>
                        </a>                        
                    </li>
                    <?php 
                        if(!(strpos ( $logined['power'],'普通'  ) !== false))
                        {
                            ?>
                    <li class="xn-openable <?php echo ((strpos ( $category,'manage' ) !== false)?'active':null);?>">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">管理</span></a>
                        <ul>
                            <li <?php echo ((strpos ( $category,'employee'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/employee"><span class="fa fa-users"></span>用户管理</a>
                            </li>

                            <?php 
                                if(!(strpos ( $logined['power'],'部门'  ) !== false))
                                {
                                    ?>
                            <li <?php echo ((strpos ( $category,'resume'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/resume"><span class="fa fa-users"></span>简历管理</a>
                            </li>
                            <li <?php echo ((strpos ( $category,'department'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/department"><span class="fa fa-users"></span>部门管理</a>
                            </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </li>
                            <?php
                        }
                    ?>
                    <li class="xn-openable <?php echo (((strpos ( $category,'info'  ) !== false) ||(strpos ( $category,'clocking'  ) !== false) )?'active':null);?>">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">信息</span></a>
                        <ul>
                            <li <?php echo ((strpos ( $category,'pinfo'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/personal">个人信息</a>
                            </li>

                    <?php 
                        if(!(strpos ( $logined['power'],'超级'  ) !== false))
                        {
                            ?>
                            <li <?php echo ((strpos ( $category,'personal'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/clocking/personal_clocking">个人考勤查看</a>
                            </li>
                            <?php
                        }
                    ?>
                    <?php 
                        if(!(strpos ( $logined['power'],'普通'  ) !== false))
                        {
                            ?>
                            <li <?php echo ((strpos ( $category,'all'  ) !== false)?'class="active"':null);?>><a href="http://<?php echo my_base_url();?>/clocking/all_clocking">员工考勤查看</a></li>
                            <!--<li><a href="">员工任务情况查看</a></li>-->
                            <?php
                        }
                    ?>
                        </ul>
                    </li>
                    <li class="xn-openable <?php echo ((strpos ( $category,'project'  ) !== false)?'active':null);?>">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">项目</span></a>
                        <ul>
                            <li <?php echo (((strpos ( $category,'tree'  )||(strpos ( $category,'projects'  ) !== false)) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/project"><span class="fa fa-square-o"></span>项目看板</a>
                            </li>
                            <li <?php echo ((strpos ( $category,'mytask'  ) !== false)?'class="active"':null);?>>
                                <a href="http://<?php echo my_base_url();?>/mission/my_task"><span class="fa fa-square-o"></span>任务中心</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="请输入搜索内容..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div id="new_message" class="informer informer-danger"></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span>新消息提醒</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger" id="new_message_count_new"></span>
                                </div>
                            </div>
                            <div id="new_message_content" class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <!--
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    -->
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->