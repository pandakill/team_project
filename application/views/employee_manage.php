<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/select2/select2_2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/user_manage.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/datepicker.css"/>


                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">管理</a></li>
                    <li class="active">员工管理</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Basic Tables</h2>
                </div> -->
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">用户管理<?php echo $power;?></h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> 导出数据</button>
                                        <?php
                                            if( (strpos ( $power,'人力'  ) !== false) ){
                                                echo '<a class="btn btn-info ml20" data-toggle="modal" href="#modal-id" id="add_btn">增加用户 <i class="fa fa-users"></i></a>';
                                            }
                                        ?>
                                        <ul class="dropdown-menu" id="export_ul">
                                            <li><a data-type="json" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a data-type="csv" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a data-type="txt" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a data-type="xls" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a data-type="doc" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/word.png' width="24"/> Word</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">用户信息</h4>
                                            </div>
                                            <form action="#" method="POST" class="form-horizontal" role="form" id="modal_form">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" class="form-control" value="" id="modal_id">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">姓名</label>
                                                        <div class="col-md-7">          
                                                            <div class="input-group">
                                                                <input class="form-control" name="name" placeholder="请输入姓名" type="text" id="modal_name">
                                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">手机号码</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="tel" placeholder="请输入手机号码" id="modal_tel" />
                                                                <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">政治面貌</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="political_status" placeholder="请输入政治面貌" id="modal_political_status" />
                                                                <span class="input-group-addon"><span class="fa fa-group"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">籍贯</label>
                                                        <div class="col-md-7">          
                                                            <div class="input-group">
                                                                <input class="form-control" name="native_place" placeholder="请输入籍贯" type="text" id="modal_native_place">
                                                                <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="modal_sex">
                                                        <label class="col-md-3 control-label">性别</label>
                                                        <div class="col-md-5">
                                                            <label class="radio-inline">
                                                                <input name="sex[]" type="radio" value="0" checked="">
                                                                <span>男</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="sex[]" type="radio" value="1">
                                                                <span>女</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">毕业院校</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="school" placeholder="请输入毕业院校" id="modal_school" />
                                                                <span class="input-group-addon"><span class="fa fa-book"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="modal_education">
                                                        <label class="col-md-3 control-label">学历</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="博士">
                                                                <span>博士</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="硕士">
                                                                <span>硕士</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="本科" checked="">
                                                                <span>本科</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="专科">
                                                                <span>专科</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="高中">
                                                                <span>高中</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="初中">
                                                                <span>初中</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="education[]" type="radio" value="小学">
                                                                <span>小学</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">专业</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="major" placeholder="请输入专业" id="modal_major" />
                                                                <span class="input-group-addon"><span class="fa fa-fire"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    -->
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">邮箱</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="email" placeholder="请输入邮箱" id="modal_email" />
                                                                <span class="input-group-addon"><span class="fa fa-laptop"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">住址</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="address" placeholder="请输入住址" id="modal_address" />
                                                                <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">            
                                                        <label class="col-md-3 control-label">出生日期</label>
                                                        <div class="col-md-7">       
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker" value="1994-01-21" name="birthday" placeholder="请选择出生日期" id="modal_birthday">
                                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">兴趣爱好</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="habbit" placeholder="请输入兴趣爱好" id="modal_habbit" />
                                                                <span class="input-group-addon"><span class="fa fa-heart"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">身份证</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="identification" placeholder="请输入身份证" id="modal_identification" />
                                                                <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">个人经历</label>
                                                        <div class="col-md-7">
                                                            <textarea rows="5" class="form-control" id="modal_experience" name="experience"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">技能证书</label>
                                                        <div class="col-md-7">
                                                            <textarea rows="5" class="form-control" id="modal_certificate" name="certificate"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-3">部门</label>
                                                        <div class="col-xs-7">
                                                            <div class="input-group" style="width: 100%;">
                                                                <select id="modal_department" name="department" style="width: 100%">
                                                                <?php
                                                                    if(isset($departments) && is_array($departments))
                                                                        foreach($departments as $dep)
                                                                        {
                                                                            echo'<option value="'.$dep->name.'">'.$dep->name.'</option>';
                                                                        }
                                                                ?>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">职务</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="job" placeholder="请输入职务" id="modal_job" />
                                                                <span class="input-group-addon"><span class="fa fa-sun-o"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">QQ号</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="qq" placeholder="请输入QQ号" id="modal_qq" />
                                                                <span class="input-group-addon"><span class="fa fa-linux"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 col-xs-12 control-label">微信号</label>
                                                        <div class="col-md-7 col-xs-12">             
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="weixin" placeholder="请输入微信号" id="modal_weixin" />
                                                                <span class="input-group-addon"><span class="fa fa-thumbs-o-up"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="modal_status">
                                                        <label class="col-md-3 control-label">状态</label>
                                                        <div class="col-md-5">
                                                            <label class="radio-inline">
                                                                <input name="status[]" type="radio" value="实习" checked="">
                                                                <span>实习</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="status[]" type="radio" value="正式">
                                                                <span>正式</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="status[]" type="radio" value="离职">
                                                                <span>离职</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="modal_authority">
                                                        <label class="col-md-3 control-label">权限</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input name="authority[]" type="radio" value="超级管理员" checked="">
                                                                <span>超级管理员</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="authority[]" type="radio" value="部门经理">
                                                                <span>部门经理</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="authority[]" type="radio" value="普通员工">
                                                                <span>普通员工</span>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input name="authority[]" type="radio" value="人力资源">
                                                                <span>人力资源</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                    <button type="submit" class="btn btn-primary" id="submit_btn">保存</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <div class="panel-body">
                                    <table id="customers2" class="table">
                                        <thead>
                                            <tr>
                                                <th>姓名</th>
                                                <th>手机</th>
                                                <th>职务</th>
                                                <th>学历</th>
                                                <th>部门</th>
                                                <th>毕业院校</th>
                                                <th>邮箱地址</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(isset($emps) && is_array($emps))
                                            foreach($emps as $emp)
                                            {
                                                echo'
                                            <tr>
                                                <td class="name">'.(isset($emp->name)?$emp->name:'').'</td>
                                                <td class="tel">'.(isset($emp->tel)?$emp->tel:'').'</td>
                                                <td class="job">'.(isset($emp->job)?$emp->job:'').'</td>
                                                <td class="education">'.(isset($emp->education)?$emp->education:'').'</td>
                                                <td class="department">'.(isset($emp->department)?$emp->department:'').'</td>
                                                <td class="school">'.(isset($emp->school)?$emp->school:'').'</td>
                                                <td class="email">'.(isset($emp->email)?$emp->email:'').'</td>
                                                ';
                                                $status = '';
                                                switch((isset($emp->status)?$emp->status:0))
                                                {
                                                    case 0:$status = '实习';break;
                                                    case 1:$status = '正式';break;
                                                    case 2:$status = '离职';break;
                                                }
                                                echo'
                                                <td class="status">'.$status.'</td>
                                                <td class="operate">
                                                    <a class="icon_edit" data-toggle="modal" href="#modal-id" >编辑</a>
                                                    <a class="icon_view" data-toggle="modal" href="#modal-id" >查看</a>
                                                    <div class="hide_info hidden">
                                                        <div class="id">'.$emp->id.'</div>
                                                        <div class="political_status">'.(isset($emp->politicalStatus)?$emp->politicalStatus:'').'</div>
                                                        <div class="native_place">'.(isset($emp->nativePlace)?$emp->nativePlace:'').'</div>
                                                        <div class="sex">'.(isset($emp->sex)?$emp->sex:'').'</div>
                                                        <div class="email">'.(isset($emp->email)?$emp->email:'').'</div>
                                                        <div class="address">'.(isset($emp->address)?$emp->address:'').'</div>
                                                        <div class="birthday">'.(isset($emp->birthday)?$emp->birthday:'').'</div>
                                                        <div class="habbit">'.(isset($emp->habbit)?$emp->habbit:'').'</div>
                                                        <div class="identification">'.(isset($emp->identification)?$emp->identification:'').'</div>
                                                        <div class="experience">'.(isset($emp->experience)?$emp->experience:'').'</div>
                                                        <div class="certificate">'.(isset($emp->certificate)?$emp->certificate:'').'</div>
                                                        <div class="qq">'.(isset($emp->qq)?$emp->qq:'').'</div>
                                                        <div class="weixin">'.(isset($emp->weixin)?$emp->weixin:'').'</div>
                                                        <div class="authority">'.(isset($emp->authority)?$emp->authority:'').'</div>
                                                        <div class="password">'.(isset($emp->password)?$emp->password:'').'</div>
                                                    </div>
                                                </td>
                                            </tr>
                                                ';
                                            }
                                        ?>
                                        </tbody>
                                    </table>                                    
                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to remove this row?</p>                    
                        <p>Press Yes if you sure.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">Yes</button>
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
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/select2/select2_2.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-datepicker.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/Blob.js"></script>
    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/FileSaver.js"></script>
    <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/tableExport.js"></script>
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->     
        <script>

            $(function(){

                var oTable = $("#customers2").dataTable({
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [-1]
                    }]
                  });


                $("#modal_department").select2({
                    placeholder:"请您选择部门"
                });

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
                $("#modal_form").validate({
                    rules: {
                        name: {
                            required : true
                            // ,
                            // chinese : true
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
                        //major: {
                            // required : true
                        //},
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
                            // required : true
                        },
                        department: {
                            required : true
                        },
                        job: {
                            required : true
                        },
                        qq: {
                            // required : true,
                            qq : true
                        },
                        weixin: {
                            // required : true
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
                        //major: {
                            //required : '请您填写专业'
                        //},
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
                        // qq: {
                        //     required : '请您填写qq'
                        // },
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
                        
                        if (control_form == "add") {

                            //alert("表单添加动作。");
                            $("#modal_form").attr('action', 'http://<?php echo my_base_url();?>/employee/addEmployee');
                            $(form).submit();

                        }else if (control_form == "edit"){

                            //alert("表单编辑动作。");
                            $("#modal_form").attr('action', 'http://<?php echo my_base_url();?>/employee/updateEmployee');
                            $(form).submit();

                        };

                    }
                });

            })

        //导出数据
            var $exportLink = document.getElementById('export_ul');
            $exportLink.addEventListener('click', function(e){
                e.preventDefault();
                if(e.target.nodeName === "A"){
                    tableExport('customers2', '数据', e.target.getAttribute('data-type'));
                }
                
            }, false);

            var control_form = null;    //控制表单提交

        //添加按钮
            $("#add_btn").click(function(){

                $("#modal-id label.error").remove();
                $("#modal-id .error").removeClass('error');

                control_form = "add";

                $("#submit_btn").removeAttr('disabled');

                //清空数据
                $("#modal_id").val(null);
                $("#modal_name").val(null);
                $("#modal_tel").val(null);
                $("#modal_job").val(null);
                //$("#modal_major").val(null);
                $("#modal_school").val(null);
                $("#modal_political_status").val(null);
                $("#modal_native_place").val(null);
                $("#modal_email").val(null);
                $("#modal_address").val(null);
                // $("#modal_birthday").val(null);
                $("#modal_habbit").val(null);
                $("#modal_identification").val(null);
                $("#modal_experience").val(null);
                $("#modal_certificate").val(null);
                // $("#modal_department").select2("val", null);
                $("#modal_qq").val(null);
                $("#modal_weixin").val(null);
            })

        //查看按钮
            $(".icon_view").click(function(){
                // $("#modal_name").attr("disabled","true");
                // $("#modal_tel").attr("disabled","true");
                // $("#modal_job").attr("disabled","true");
                // $("#modal_major").attr("disabled","true");
                // $("#modal_school").attr("disabled","true");
                // $("#modal_political_status").attr("disabled","true");
                // $("#modal_native_place").attr("disabled","true");
                // $("#modal_email").attr("disabled","true");
                // $("#modal_address").attr("disabled","true");
                // $("#modal_birthday").attr("disabled","true");
                // $("#modal_habbit").attr("disabled","true");
                // $("#modal_identification").attr("disabled","true");
                // $("#modal_experience").attr("disabled","true");
                // $("#modal_certificate").attr("disabled","true");
                // $("#modal_department").attr("disabled","true");
                // $("#modal_qq").attr("disabled","true");
                // $("#modal_weixin").attr("disabled","true");
                
                $("#modal-id label.error").remove();
                $("#modal-id .error").removeClass('error');

            /*
                **  获取表格数据
             */
            
                //获取表格名字
                var name = $(this).parents("tr").find('.name').text();
                //获取表格手机
                var tel = $(this).parents("tr").find('.tel').text();
                //获取表格职务
                var job = $(this).parents("tr").find('.job').text();
                //获取表格教育背景
                var education = $(this).parents("tr").find('.education').text();
                //获取表格部门值
                var department = $(this).parents("tr").find('.department').text();
                //获取表格专业
                //var major = $(this).parents("tr").find('.major').text();
                //获取表格学校
                var school = $(this).parents("tr").find('.school').text();
                //获取表格状态
                var status = $(this).parents("tr").find('.status').text();

            /*
                **  获取表格隐藏数据
             */
                
                //获取表格id
                var id = $(this).siblings('.hide_info').find('.id').text();
                //获取表格政治面貌
                var political_status = $(this).siblings('.hide_info').find('.political_status').text();
                //获取表格籍贯
                var native_place = $(this).siblings('.hide_info').find('.native_place').text();
                //获取表格性别
                var sex = $(this).siblings('.hide_info').find('.sex').text();
                //获取表格email
                var email = $(this).siblings('.hide_info').find('.email').text();
                //获取表格地址
                var address = $(this).siblings('.hide_info').find('.address').text();
                //获取表格出生日期
                var birthday = $(this).siblings('.hide_info').find('.birthday').text();
                //获取表格兴趣爱好
                var habbit = $(this).siblings('.hide_info').find('.habbit').text();
                //获取表格身份证
                var identification = $(this).siblings('.hide_info').find('.identification').text();
                //获取表格个人经历
                var experience = $(this).siblings('.hide_info').find('.experience').text();
                //获取表格技能证书
                var certificate = $(this).siblings('.hide_info').find('.certificate').text();
                //获取表格QQ
                var qq = $(this).siblings('.hide_info').find('.qq').text();
                //获取表格微信号
                var weixin = $(this).siblings('.hide_info').find('.weixin').text();
                //获取表格权限
                var authority = $(this).siblings('.hide_info').find('.authority').text();

                //模态框 - 赋值
                $("#modal_id").val(id);
                $("#modal_name").val(name);
                $("#modal_tel").val(tel);
                $("#modal_job").val(job);
                //$("#modal_major").val(major);
                $("#modal_education input[type='radio']").each(function() {
                    if ( $(this).val() == education) {
                        $(this).click();
                    };
                });
                $("#modal_school").val(school);
                $("#modal_political_status").val(political_status);
                $("#modal_native_place").val(native_place);
                $("#modal_sex input[type='radio']").each(function() {
                    if ( $(this).val() == sex) {
                        $(this).click();
                    };
                });
                $("#modal_email").val(email);
                $("#modal_address").val(address);
                $("#modal_birthday").val(birthday);
                $("#modal_habbit").val(habbit);
                $("#modal_identification").val(identification);
                $("#modal_experience").val(experience);
                $("#modal_certificate").val(certificate);
                $("#modal_department").select2("val", department);
                $("#modal_qq").val(qq);
                $("#modal_weixin").val(weixin);
                $("#modal_status input[type='radio']").each(function() {
                    if ( $(this).val() == status) {
                        $(this).click();
                    };
                });
                $("#modal_authority input[type='radio']").each(function() {
                    if ( $(this).val() == authority) {
                        $(this).click();
                    };
                });

                $("#submit_btn").attr("disabled","true");
            })

        //编辑按钮
            $(".icon_edit").click(function() {

                control_form = "edit";

                $("#modal-id label.error").remove();
                $("#modal-id .error").removeClass('error');

                $("#submit_btn").removeAttr('disabled');
            /*
                **  获取表格数据
             */
            
                //获取表格名字
                var name = $(this).parents("tr").find('.name').text();
                //获取表格手机
                var tel = $(this).parents("tr").find('.tel').text();
                //获取表格职务
                var job = $(this).parents("tr").find('.job').text();
                //获取表格教育背景
                var education = $(this).parents("tr").find('.education').text();
                //获取表格部门值
                var department = $(this).parents("tr").find('.department').text();
                //获取表格专业
                //var major = $(this).parents("tr").find('.major').text();
                //获取表格学校
                var school = $(this).parents("tr").find('.school').text();
                //获取表格状态
                var status = $(this).parents("tr").find('.status').text();

            /*
                **  获取表格隐藏数据
             */
                
                //获取表格id
                var id = $(this).siblings('.hide_info').find('.id').text();
                //获取表格政治面貌
                var political_status = $(this).siblings('.hide_info').find('.political_status').text();
                //获取表格籍贯
                var native_place = $(this).siblings('.hide_info').find('.native_place').text();
                //获取表格性别
                var sex = $(this).siblings('.hide_info').find('.sex').text();
                //获取表格email
                var email = $(this).siblings('.hide_info').find('.email').text();
                //获取表格地址
                var address = $(this).siblings('.hide_info').find('.address').text();
                //获取表格出生日期
                var birthday = $(this).siblings('.hide_info').find('.birthday').text();
                //获取表格兴趣爱好
                var habbit = $(this).siblings('.hide_info').find('.habbit').text();
                //获取表格身份证
                var identification = $(this).siblings('.hide_info').find('.identification').text();
                //获取表格个人经历
                var experience = $(this).siblings('.hide_info').find('.experience').text();
                //获取表格技能证书
                var certificate = $(this).siblings('.hide_info').find('.certificate').text();
                //获取表格QQ
                var qq = $(this).siblings('.hide_info').find('.qq').text();
                //获取表格微信号
                var weixin = $(this).siblings('.hide_info').find('.weixin').text();
                //获取表格权限
                var authority = $(this).siblings('.hide_info').find('.authority').text();



                //模态框 - 赋值
                $("#modal_id").val(id);
                $("#modal_name").val(name);
                $("#modal_tel").val(tel);
                $("#modal_job").val(job);
                //$("#modal_major").val(major);
                $("#modal_education input[type='radio']").each(function() {
                    if ( $(this).val() == education) {
                        $(this).click();
                    };
                });
                $("#modal_school").val(school);
                $("#modal_political_status").val(political_status);
                $("#modal_native_place").val(native_place);
                $("#modal_sex input[type='radio']").each(function() {
                    if ( $(this).val() == sex) {
                        $(this).click();
                    };
                });
                $("#modal_email").val(email);
                $("#modal_address").val(address);
                $("#modal_birthday").val(birthday);
                $("#modal_habbit").val(habbit);
                $("#modal_identification").val(identification);
                $("#modal_experience").val(experience);
                $("#modal_certificate").val(certificate);
                $("#modal_department").select2("val", department);
                $("#modal_qq").val(qq);
                $("#modal_weixin").val(weixin);
                $("#modal_status input[type='radio']").each(function() {
                    if ( $(this).val() == status) {
                        $(this).click();
                    };
                });
                $("#modal_authority input[type='radio']").each(function() {
                    if ( $(this).val() == authority) {
                        $(this).click();
                    };
                });
     

            });

            </script>