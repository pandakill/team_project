<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

                <link rel="stylesheet" type="text/css" href="css/select2/select2_2.css"/>
        <link rel="stylesheet" type="text/css" href="css/user_manage.css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li class="active">个人信息</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-body profile" style="background: url('img/backgrounds/wall_1.jpg') 100% 100% / 100% 100%">
                                    <div class="profile-image">
                                        <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg" alt="Nadia Ali"/>
                                    </div>
                                    <div class="profile-data">
                                        <div class="profile-data-name"><?php echo $emp->name;?></div>
                                        <div class="profile-data-title" style="color: #FFF;">Fechon</div>
                                    </div>                                
                                </div>                                
                                <div class="panel-body">                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-info btn-rounded btn-block"><span class="fa fa-check"></span> 关注</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary btn-rounded btn-block"><span class="fa fa-comments"></span> 私聊</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body list-group border-bottom">
                                    <a class="list-group-item"><span class="fa fa-tasks"></span> 任务 <span class="badge badge-default"> +2</span></a>
                                    <a class="list-group-item"><span class="fa fa-frown-o"></span> 总缺勤天数 <span class="badge badge-danger"> 10</span></a>
                                    <a class="list-group-item"><span class="fa fa-lightbulb-o"></span> 入职天数 <span class="badge badge-info"> 248</span></a>
                                    <a class="list-group-item"><span class="fa fa-cog"></span> 职务 <span class="badge badge-info"> 经理</span></a>
                                    <a class="list-group-item"><span class="fa fa-money"></span> 薪金 <span class="badge badge-info"> 12500</span></a>
                                </div>
                                <div class="panel-body">
                                    <h4 class="text-title">朋友圈</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>方赞潘</span>
                                            </a>                                            
                                        </div>
                                        <div class="col-md-4 col-xs-4">                                            
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>林德欣</span>
                                            </a>                                            
                                        </div>
                                        <div class="col-md-4 col-xs-4">                                            
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>陈俊杰</span>
                                            </a>                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-4">                                            
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>湛耀</span>
                                            </a>                                            
                                        </div>
                                        <div class="col-md-4 col-xs-4">                                            
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>陈俊杰2</span>
                                            </a>                                            
                                        </div>
                                        <div class="col-md-4 col-xs-4">                                            
                                            <a href="#" class="friend">
                                                <img src="<?php echo resources_url();?>/assets/images/users/no-image.jpg"/>
                                                <span>陈俊杰3</span>
                                            </a>                                            
                                        </div>
                                    </div>
                                
                                    <h4 class="text-title">广告</h4>
                                    <div class="gallery" id="links">                                                
                                        <a href="assets/images/gallery/music-1.jpg" title="Music Image 1" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/music-1.jpg" alt="Music Image 1"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/music-2.jpg" title="Music Image 2" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/music-2.jpg" alt="Music Image 2"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/music-3.jpg" title="Music Image 3" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/music-3.jpg" alt="Music Image 3"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/nature-1.jpg" title="Nature Image 1" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/nature-1.jpg" alt="Nature Image 1"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/nature-2.jpg" title="Nature Image 2" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/nature-2.jpg" alt="Nature Image 2"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/nature-3.jpg" title="Nature Image 3" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/nature-3.jpg" alt="Nature Image 3"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/nature-4.jpg" title="Nature Image 4" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/nature-4.jpg" alt="Nature Image 4"/>
                                            </div>                                            
                                        </a>
                                        <a href="assets/images/gallery/nature-5.jpg" title="Nature Image 5" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="<?php echo resources_url();?>/assets/images/gallery/nature-5.jpg" alt="Nature Image 5"/>
                                            </div>                                            
                                        </a>                                        
                                    </div>
                                </div>
                            </div>                            
                            
                        </div>
                        
                        <div class="col-md-9">

                            <!-- 个人信息开始 -->
                            <div class="row">
                                <!-- START PANEL WITH CONTROL CLASSES -->
                                <div class="panel panel-warning panel-hidden-controls">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">个人信息</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <form action="#" method="POST" class="form-horizontal" role="form" id="form">
                                        <div class="panel-body">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo (isset($emp->wordId)?$emp->wordId:'');?>" id="id">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">姓名</label>
                                                <div class="col-md-7">          
                                                    <div class="input-group">
                                                        <input class="form-control" name="name" placeholder="请输入姓名" type="text" id="name" value="<?php echo (isset($emp->name)?$emp->name:'');?>">
                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">手机号码</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="tel" placeholder="请输入手机号码" id="tel"  value="<?php echo (isset($emp->tel)?$emp->tel:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">政治面貌</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="political_status" placeholder="请输入政治面貌" id="political_status"  value="<?php echo (isset($emp->politicalStatus)?$emp->politicalStatus:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-group"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">籍贯</label>
                                                <div class="col-md-7">          
                                                    <div class="input-group">
                                                        <input class="form-control" name="native_place" placeholder="请输入籍贯" type="text" id="native_place" value="<?php echo (isset($emp->nativePlace)?$emp->nativePlace:'');?>">
                                                        <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="sex">
                                                <label class="col-md-3 control-label">性别</label>
                                                <div class="col-md-5">
                                                    
                                                    <label class="radio-inline">
                                                        <input name="sex[]" type="radio" value="0" <?php echo(0 == $emp->sex ?'checked="checked"':'');?>>
                                                        <span>男</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="sex[]" type="radio" value="1" <?php echo(0 == $emp->sex ?'':'checked="checked"');?>>
                                                        <span>女</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">毕业院校</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="school" placeholder="请输入毕业院校" id="school"  value="<?php echo (isset($emp->school)?$emp->school:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="education">
                                                <label class="col-md-3 control-label">学历</label>
                                                <div class="col-md-9">
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="博士" <?php echo('博士' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>博士</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="硕士" <?php echo('硕士' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>硕士</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="本科"  <?php echo('本科' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>本科</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="专科" <?php echo('专科' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>专科</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="高中" <?php echo('高中' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>高中</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="初中" <?php echo('初中' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>初中</span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input name="education[]" type="radio" value="小学" <?php echo('小学' == $emp->education ?'checked="checked"':'');?>>
                                                        <span>小学</span>
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">邮箱</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="email" placeholder="请输入邮箱" id="email"  value="<?php echo (isset($emp->email)?$emp->email:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-laptop"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">住址</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="address" placeholder="请输入住址" id="address"  value="<?php echo (isset($emp->address)?$emp->address:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">            
                                                <label class="col-md-3 control-label">出生日期</label>
                                                <div class="col-md-7">       
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker" value="<?php echo (isset($emp->birthday)?$emp->birthday:'');?>" name="birthday" placeholder="请输入出生日期" id="birthday" >
                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">兴趣爱好</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="habbit" placeholder="请输入兴趣爱好" id="habbit"  value="<?php echo (isset($emp->habbit)?$emp->habbit:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-heart"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">身份证</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="identification" placeholder="请输入身份证" id="identification"  value="<?php echo (isset($emp->identification)?$emp->identification:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">个人经历</label>
                                                <div class="col-md-7">
                                                    <textarea rows="5" class="form-control" id="experience" name="experience" ><?php echo (isset($emp->experience)?$emp->experience:'');?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">技能证书</label>
                                                <div class="col-md-7">
                                                    <textarea rows="5" class="form-control" id="certificate" name="certificate" ><?php echo (isset($emp->certificate)?$emp->certificate:'');?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">部门</label>
                                                <label class="col-xs-5 control-label text-left" id="department"><?php echo (isset($emp->department)?$emp->department:'');?></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">职务</label>
                                                <label class="col-xs-5 control-label text-left"><?php echo (isset($emp->job)?$emp->job:'');?></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">QQ号</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="qq" placeholder="请输入QQ号" id="qq"  value="<?php echo (isset($emp->qq)?$emp->qq:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-linux"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">微信号</label>
                                                <div class="col-md-7 col-xs-12">             
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="weixin" placeholder="请输入微信号" id="weixin"  value="<?php echo (isset($emp->weixin)?$emp->weixin:'');?>"/>
                                                        <span class="input-group-addon"><span class="fa fa-thumbs-o-up"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <?php 
                                                    $status = '';
                                                    switch((isset($emp->status)?$emp->status:0))
                                                    {
                                                        case 0:$status = '实习';break;
                                                        case 1:$status = '正式';break;
                                                        case 2:$status = '离职';break;
                                                    }
                                                ?>
                                                <label class="col-xs-3 control-label">状态</label>
                                                <label class="col-xs-5 control-label text-left" id="status"><?php echo $status;?></label>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">权限</label>
                                                <label class="col-xs-5 control-label text-left" id="authority"><?php echo (isset($emp->authority)?$emp->authority:'');?></label>
                                            </div>
                                        </div>  
                                        <div class="panel-footer">                                
                                            <button class="btn btn-primary pull-right" type="submit">保存</button>
                                        </div>   
                                    </form>
                                </div>
                                <!-- END PANEL WITH CONTROL CLASSES -->
                            </div>
                            <!-- 个人信息结束 -->

                            <!-- 修改密码开始 -->
                            <div class="row">
                                <!-- START PANEL WITH CONTROL CLASSES -->
                                <div class="panel panel-warning panel-hidden-controls">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">修改密码</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <form action="#" method="POST" class="form-horizontal" role="form" id="password_form">
                                        <div class="panel-body">
                                            <input type="hidden" name="id" class="form-control" value="">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">原密码</label>
                                                <div class="col-md-7">          
                                                    <div class="input-group">
                                                        <input class="form-control" name="password" placeholder="请输入原密码" type="password">
                                                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">新密码</label>
                                                <div class="col-md-7">          
                                                    <div class="input-group">
                                                        <input class="form-control" name="new_password" placeholder="请输入新密码" type="password">
                                                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">确认密码</label>
                                                <div class="col-md-7">          
                                                    <div class="input-group">
                                                        <input class="form-control" name="confirm_password" placeholder="请输入确认密码" type="password">
                                                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                        <div class="panel-footer">                                
                                            <button class="btn btn-primary pull-right">保存</button>
                                        </div>       
                                    </form>                     
                                </div>
                                <!-- END PANEL WITH CONTROL CLASSES -->
                            </div>
                            <!-- 修改密码结束 -->
                            
                        </div>
                        
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                 
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>      
        <!-- END BLUEIMP GALLERY -->        
        
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

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/select2/select2_2.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-datepicker.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery-validation/jquery.validate.js"></script> 

        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

        <!-- <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/morris/morris.min.js"></script> -->
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/Blob.js"></script>
    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/FileSaver.js"></script>
    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/tableExport.js"></script>        
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement,
                    link = target.src ? target.parentNode : target,
                    options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }},
                    links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };

            $(function(){

                // 密码的验证 
                jQuery.validator.addMethod("password", function(value, element) { 
                var password = /(?!^[0-9]+$)(?!^[a-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/; 
                return this.optional(element) || (password.test(value)); 
                }, "密码必须为6-16个字母加数字或符号的组合密码"); 
                // 身份证的验证 
                jQuery.validator.addMethod("idcard", function(value, element) { 
                var idcard = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/; 
                return this.optional(element) || (idcard.test(value)); 
                }, "身份证不符合格式"); 
                // 中文的验证 
                jQuery.validator.addMethod("chinese", function(value, element) { 
                var chinese = /^[\u4e00-\u9fa5]+$/; 
                return this.optional(element) || (chinese.test(value)); 
                }, "只能输入中文"); 
                // QQ号码验证 
                jQuery.validator.addMethod("qq", function(value, element) { 
                var tel = /^[1-9]\d{4,9}$/; 
                return this.optional(element) || (tel.test(value)); 
                }, "qq号码格式错误"); 
                // 手机号码验证 
                jQuery.validator.addMethod("mobile", function(value, element) { 
                var length = value.length; 
                var mobile = /^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/ 
                return this.optional(element) || (length == 11 && mobile.test(value)); 
                }, "手机号码格式错误"); 
                $("#form").validate({
                    rules: {
                        name: {
                            required : true,
                            chinese : true
                        },
                        tel: {
                            required : true,
                            mobile : true
                        },
                        political_status: {
                            required : true,
                            chinese : true
                        },
                        native_place: {
                            required : true,
                            chinese : true
                        },
                        school: {
                            required : true
                        },
                        major: {
                            required : true
                        },
                        email: {
                            required : true,
                            email : true
                        },
                        address: {
                            required : true
                        },
                        habbit: {
                            required : true
                        },
                        identification: {
                            required : true,
                            idcard : true
                        },
                        experience: {
                            required : true
                        },
                        certificate: {
                            required : true
                        },
                        department: {
                            required : true
                        },
                        job: {
                            required : true
                        },
                        qq: {
                            required : true,
                            qq : true
                        },
                        weixin: {
                            required : true
                        }
                    },
                    messages: {
                        name: {
                            required : '请您填写姓名',
                            chinese : '姓名必须为中文'
                        },
                        tel: {
                            required : '请您填写手机号码'
                        },
                        political_status: {
                            required : '请您填写政治面貌',
                            chinese : '政治面貌必须为中文 '
                        },
                        native_place: {
                            required : '请您填写籍贯',
                            chinese : '籍贯必须为中文'
                        },
                        school: {
                            required : '请您填写毕业院校'
                        },
                        major: {
                            required : '请您填写专业'
                        },
                        email: {
                            required : '请您填写email',
                            email : 'email格式不正确'
                        },
                        address: {
                            required : '请您填写地址'
                        },
                        habbit: {
                            required : '请您填写兴趣爱好'
                        },
                        identification: {
                            required : '请您填写身份证'
                        },
                        experience: {
                            required : '请您填写个人经历'
                        },
                        certificate: {
                            required : '请您填写技能证书'
                        },
                        department: {
                            required : '请您选择部门'
                        },
                        job: {
                            required : '请您填写职务'
                        },
                        qq: {
                            required : '请您填写qq'
                        },
                        weixin: {
                            required : '请您填写微信号'
                        }
                    },
                    errorPlacement: function(error, element) {  
                        if ( typeof(element.attr("rows")) == "undefined" ) {
                            error.appendTo ( element.parent().parent() );
                        }else 
                            error.appendTo ( element.parent() );  
                      error.addClass ("checkbox-inline");
                    },
                    submitHandler:function(form){
                        
                        // alert("表单要提交了。");
                        $(form).attr('action', 'http://<?php echo my_base_url();?>/personal/updateEmployee');
                        $(form).submit();

                    }
                });

                $("#password_form").validate({
                    rules: {
                        password : {
                            required : true,
                            password : true
                        },
                        new_password : {
                            required : true,
                            password : true
                        },
                        confirm_password : {
                            required : true,
                            equalTo: 'input[name="new_password"]',
                            password : true
                        }
                    },
                    messages: {
                        password : {
                            required : '请您填写密码'
                        },
                        new_password : {
                            required : '请您填写新密码'
                        },
                        confirm_password : {
                            required : '请您填写确认密码',
                            equalTo: '确认密码与新密码要保持一致'
                        }
                    },
                    errorPlacement: function(error, element) {  
                      error.appendTo ( element.parent().parent() );  
                      error.addClass ("checkbox-inline");
                    },
                    submitHandler:function(form){
                        
                        $(form).attr('action', 'http://<?php echo my_base_url();?>/personal/changePassword');
                        $(form).submit();
                    }
                });


            })
        </script>        
        
    <!-- END SCRIPTS -->    