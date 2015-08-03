<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/select2/select2_2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/daterangepicker.css" />
        
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">管理</a></li>
                    <li class="active">项目管理</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Panels</h2>
                </div> -->
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START PANELS WITH CONTROLS -->
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START PANEL WITH HIDDEN CONTROLS -->
                            <div class="panel panel-success panel-hidden-controls">
                                <div class="panel-heading">
                                    <h3 class="panel-title">项目管理</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div id="infovis" style="height: 500px;"></div>
                                    <div id="log" style="float:right"></div>
                                    <div class="radio">显示方式：
                                        <label>
                                            <input type="radio" name="orientation" id="r-left" value="left" checked="checked">
                                            左边
                                        </label>
                                        <label>
                                            <input type="radio" name="orientation" id="r-top" value="top">
                                            上方
                                        </label>
                                        <label>
                                            <input type="radio" name="orientation" id="r-bottom" value="bottom">
                                            底端
                                        </label>
                                        <label>
                                            <input type="radio" name="orientation" id="r-right" value="right">
                                            右边
                                        </label>
                                    </div>

                                    <hr style="margin: 40px;">

                                    <!-- 编辑子节点开始 -->
                                    <form action="" method="POST" class="form-horizontal" role="form" id="form">
                                        <input type="hidden" name="id" id="id" class="form-control" value="">
                                        <input type="hidden" name="mission_id" id="mission_id" class="form-control" value="">
                                        <input type="hidden" name="parent_id" id="parent_id" class="form-control" value="">
                                        <input type="hidden" name="son" id="son" class="form-control" value="">
                                        <input type="hidden" name="dependented_items" id="dependented_items" class="form-control" value="">
                                        <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id;?>" />
                                        <div class="row">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">名称</label>
                                                    <div class="col-xs-9">          
                                                        <div class="input-group">
                                                            <input class="form-control" name="name" placeholder="请输入名称" type="text" id="name">
                                                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">负责人</label>
                                                    <div class="col-xs-9">
                                                        <div class="input-group" style="width: 100%;">
                                                            <select id="leader" name="leader" style="width: 100%" >
                                                              <?php
                                                                if( isset($all_employee) ){
                                                                    foreach ( $all_employee as $employee ) {
                                                                        echo '<option value="'.$employee->workId.'">'.$employee->name.'</option>';
                                                                    }
                                                                }
                                                              ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">完成情况</label>
                                                    <div class="col-xs-9">
                                                        <div class="radio" id="finished">
                                                            <label>
                                                                <input type="radio" name="finished[]" value="1" id="finish">已完成
                                                            </label>
                                                            <label>
                                                                <input type="radio" name="finished[]" value="0" id="unfinish" checked="checked">未完成
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group hidden" id="finishe_div">            
                                                    <label class="col-xs-3 control-label">完成日期</label>
                                                    <div class="col-xs-9">       
                                                        <div class="input-group">
                                                            <input type="text" class="form-control datepicker" value="2014-11-01" name="finish_time" placeholder="请选择完成日期" id="finish_time">
                                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">经费</label>
                                                    <div class="col-xs-9">          
                                                        <div class="input-group">
                                                            <input class="form-control" name="pay" placeholder="请输入经费" type="text" id="pay">
                                                            <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">添加评价</label>
                                                    <div class="col-xs-9">                                            
                                                        <textarea rows="5" class="form-control" id="evaluation" name="evaluation"></textarea>
                                                        <input type="hidden" id="history_evaluation" name="history_evaluation" value=""/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">历史评价</label>
                                                    <div class="col-xs-9" id="all_evaluation">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">            
                                                    <label class="col-xs-3 control-label">日期范围</label>
                                                    <div class="col-xs-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control datepicker" value="2015/07/23 - 2015/07/24" id="daterange" name="daterange">
                                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            <input type="hidden" name="start_date" id="start_date" class="form-control" value="2015/07/23">
                                                            <input type="hidden" name="end_date" id="end_date" class="form-control" value="2015/07/24">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">描述</label>
                                                    <div class="col-xs-9">                                            
                                                        <textarea rows="5" class="form-control" id="descript" name="descript"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-xs-3 control-label">依赖节点</label>
                                                    <div class="col-xs-9">
                                                        <div class="input-group" style="width: 100%;">
                                                            <select id="dependence" multiple="multiple" name="dependence" style="width: 100%">
                                                              <?php
                                                                if( isset($all_mission) ){
                                                                    foreach ( $all_mission as $mission ) {
                                                                        echo '<option value="'.$mission->id.'">'.$mission->name.'</option>';
                                                                    }
                                                                }
                                                              ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <a class="btn btn-info col-xs-2 col-xs-offset-1" data-toggle="modal" href='#modal-id'>添加子节点</a>
                                                    <a class="btn btn-info col-xs-2 col-xs-offset-1" id="delete_button" href='javascript:void(0);'>删除子节点</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="btn btn-primary">保存</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- 编辑子节点结束 -->

                                    <!-- 添加子节点模态框开始 -->
                                    <div class="modal fade" id="modal-id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">添加子节点</h4>
                                                </div>
                                                <form action="" method="POST" class="form-horizontal" role="form" id="modal_form">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <input type="hidden" name="project_id" value="<?php echo $project_id;?>" />
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">父节点</label>
                                                                <div class="col-xs-9">
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="modal_parent" name="parent" style="width: 100%" disabled="disabled">
                                                                          <?php
                                                                            if( isset($all_mission) ){
                                                                                foreach ( $all_mission as $mission ) {
                                                                                    echo '<option value="'.$mission->id.'">'.$mission->name.'</option>';
                                                                                }
                                                                            }
                                                                          ?>
                                                                        </select>
                                                                        <input type="hidden" id="modal_parent_id" name="parent_id" value=""/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">名称</label>
                                                                <div class="col-xs-9">          
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="name" placeholder="请输入名称" type="text" id="modal_name">
                                                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">负责人</label>
                                                                <div class="col-xs-9">
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="modal_leader" name="leader" style="width: 100%" >
                                                                          <?php
                                                                            if( isset($all_employee) ){
                                                                                foreach ( $all_employee as $employee ) {
                                                                                    echo '<option value="'.$employee->workId.'">'.$employee->name.'</option>';
                                                                                }
                                                                            }
                                                                          ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">经费</label>
                                                                <div class="col-xs-9">          
                                                                    <div class="input-group">
                                                                        <input class="form-control" name="pay" placeholder="请输入经费" type="text" id="modal_pay">
                                                                        <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">            
                                                                <label class="col-xs-3 control-label">日期范围</label>
                                                                <div class="col-xs-9">
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control datepicker" value="2015/07/23 - 2015/07/24" id="modal_daterange" name="daterange">
                                                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                                        <input type="hidden" name="start_date" id="modal_start_date" class="form-control" value="2015/07/23">
                                                                        <input type="hidden" name="end_date" id="modal_end_date" class="form-control" value="2015/07/24">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">描述</label>
                                                                <div class="col-xs-9">                                            
                                                                    <textarea rows="5" class="form-control" id="modal_descript" name="descript"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-xs-3 control-label">依赖节点</label>
                                                                <div class="col-xs-9">
                                                                    <div class="input-group" style="width: 100%;">
                                                                        <select id="modal_dependence" multiple="multiple" name="dependence" style="width: 100%">
                                                                          <?php
                                                                            if( isset($all_mission) ){
                                                                                foreach ( $all_mission as $mission ) {
                                                                                    echo '<option value="'.$mission->id.'">'.$mission->name.'</option>';
                                                                                }
                                                                            }
                                                                          ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                        <button type="submit" class="btn btn-primary">保存</button>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- 添加子节点模态框结束 -->

                                </div>
                                <!-- <div class="panel-footer">                                
                                    <button class="btn btn-primary pull-right" id="aaa">保存项目</button>
                                </div>   -->                          
                            </div>
                            <!-- END PANEL WITH HIDDEN CONTROLS -->

                        </div>  
                    </div>
                    <!-- END PANELS WITH CONTROLS -->            
                
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
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
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>



        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery-validation/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/select2/select2_2.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/moment.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/daterangepicker.js"></script>

        <!--[if IE]><script language="javascript" type="text/javascript" src="<?php echo resources_url();?>/js/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo resources_url();?>/js/jit-yc.js"></script>
<script type="text/javascript">
//已完成与未完成按钮
$("#finish").click(function() {
    $("#finishe_div").removeClass('hidden');
});
$("#unfinish").click(function() {
    $("#finishe_div").addClass('hidden');
});

//日期范围选择
$('#daterange').daterangepicker({
    "timePickerIncrement": 1,
    "autoApply": true,
    "locale": {
        "format": "YYYY/MM/DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "天",
            "一",
            "二",
            "三",
            "四",
            "五",
            "六"
        ],
        "monthNames": [
            "01",
            "02",
            "03",
            "04",
            "05",
            "06",
            "07",
            "08",
            "09",
            "10",
            "11",
            "12"
        ],
        "firstDay": 1
    },
    "startDate": "2015/07/01",
    "endDate": "2015/07/15",
    "opens": "left",
    "drops": "down",
    "buttonClasses": "btn btn-sm",
    "applyClass": "btn-success",
    "cancelClass": "btn-default"
}, function(start, end, label) {

    $("#start_date").val(start.format('YYYY/MM/DD'));   //开始日期赋值
    $("#end_date").val(end.format('YYYY/MM/DD'));       //结束日期赋值

  // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

//添加子节点 - 日期范围选择
$('#modal_daterange').daterangepicker({
    "timePickerIncrement": 1,
    "autoApply": true,
    "locale": {
        "format": "YYYY/MM/DD",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "天",
            "一",
            "二",
            "三",
            "四",
            "五",
            "六"
        ],
        "monthNames": [
            "01",
            "02",
            "03",
            "04",
            "05",
            "06",
            "07",
            "08",
            "09",
            "10",
            "11",
            "12"
        ],
        "firstDay": 1
    },
    "startDate": "2015/07/01",
    "endDate": "2015/07/15",
    "opens": "left",
    "drops": "down",
    "buttonClasses": "btn btn-sm",
    "applyClass": "btn-success",
    "cancelClass": "btn-default"
}, function(start, end, label) {

    $("#modal_start_date").val(start.format('YYYY/MM/DD'));   //开始日期赋值
    $("#modal_end_date").val(end.format('YYYY/MM/DD'));       //结束日期赋值

  // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});

    //初始化的项目数据
    var json = <?php echo $tree_jsonStr;?>;
</script>
<!-- <script type="text/javascript" src="<?php echo resources_url();?>/js/example1.js"></script> -->
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

            $(function(){
                init();

                //编辑节点 - 选择框
                $("#leader").select2({
                    placeholder : "请您选择负责人"
                });
                $("#dependence").select2({
                    placeholder : "请您选择依赖节点"
                });
                $("#parent").select2({
                    placeholder : "请您选择父节点"
                });

                //添加节点 - 选择框
                $("#modal_leader").select2({
                    placeholder : "请您选择负责人"
                });
                $("#modal_dependence").select2({
                    placeholder : "请您选择依赖节点任务"
                });
                //$("#modal_parent").select2({
                //    placeholder : "请您选择父节点任务"
                //});
                $("#modal_parent").select2({
                    placeholder : "请您选择父节点"
                });

                //编辑节点表单 - 验证
                $("#form").validate({
                    ignore: ".hidden input",
                    rules: {
                        name: {
                            required : true
                        },
                        leader: {
                            required : true
                        },
                        finish_time: {
                            required : true,
                            date : true
                        },
                        pay : {
                            required : true,
                            number : true
                        },
                        evaluation: {
                            required : true
                        },
                        start_date: {
                            required : true,
                            date : true
                        },
                        end_date: {
                            required : true,
                            date : true
                        },
                        descript: {
                            required : true
                        }
                    },
                    messages: {
                        name: {
                            required : '请您填写姓名'
                        },
                        leader: {
                            required : '请您选择负责人'
                        },
                        finish_time: {
                            required : '请您选择完成日期',
                            date : '日期不符合格式'
                        },
                        pay : {
                            required : '请您填写经费',
                            number : '经费必须为数字'
                        },
                        evaluation: {
                            required : '请您输入评价'
                        },
                        start_date: {
                            required : '请您选择开始日期',
                            date : '日期不符合格式'
                        },
                        end_date: {
                            required : '请您选择截止日期',
                            date : '日期不符合格式'
                        },
                        descript: {
                            required : '请您填写描述'
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
                        var flag =confirm("确认保存修改信息吗?");
                        if( flag == true ){
                            var form_content = $("#form").serialize();
                            var baseurl = "http://<?php echo my_base_url();?>";
                            $.ajax({
                                type:"POST",
                                url:baseurl+"/project/update_mission",
                                data:form_content,
                                error:function(e){
                                    alert(e+"  ajax错误码是："+e.status);
                                },
                                success:function(data){
                                    if( data == 0 ){
                                        alert("修改成功");
                                    }else if( data == 1 ){
                                        alert("修改失败,开始时间不能迟于结束时间");
                                    }else if( data == 2 ){
                                        alert("修改失败,找不到父节点");
                                    }else if( data == 3 ){
                                        alert("修改失败,节点开始时间不能早于父节点开始时间");
                                    }else if( data == 4 ){
                                        alert("修改失败,节点结束时间不能迟于");
                                    }else if( data == 5 ){
                                        alert("修改失败,节点结束时间不能迟于被依赖项开始时间");
                                    }else if( data == 6 ){
                                        alert("修改失败,节点开始时间不能早于依赖项结束时间");
                                    }else if( data == 7 ){
                                        alert("修改失败,找不到儿子节点");
                                    }else if( data == 8 ){
                                        alert("修改失败,节点开始时间不能迟于儿子节点开始时间");
                                    }else if( data == 9 ){
                                        alert("修改失败,节点结束时间不能早于儿子节点结束时间");
                                    }else if( data == 10 ){
                                        alert("修改失败,日期输入错误");
                                    }else if( data == 11 ){
                                        alert("修改失败,数据库修改失败");
                                    }else if( data == 12 ){
                                        alert("修改失败,没有拥有修改该节点的权限");
                                    }else if( data == -1 ){
                                        alert("修改失败,Json传入节点信息失败");
                                    }else{
                                        alert("修改失败,PHP后台错误,添加失败!");
                                    }
                                }
                            });
                        }
                    }
                });

                //添加节点表单 - 验证
                $("#modal_form").validate({
                    ignore: ".hidden input",
                    rules: {
                        name: {
                            required : true
                        },
                        leader: {
                            required : true
                        },
                        pay : {
                            required : true,
                            number : true
                        },
                        start_date: {
                            required : true,
                            date : true
                        },
                        end_date: {
                            required : true,
                            date : true
                        },
                        descript: {
                            required : true
                        }
                    },
                    messages: {
                        name: {
                            required : '请您填写姓名'
                        },
                        leader: {
                            required : '请您选择负责人'
                        },
                        pay : {
                            required : '请您填写经费',
                            number : '经费必须为数字'
                        },
                        start_date: {
                            required : '请您选择开始日期',
                            date : '日期不符合格式'
                        },
                        end_date: {
                            required : '请您选择截止日期',
                            date : '日期不符合格式'
                        },
                        descript: {
                            required : '请您填写描述'
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
                        var flag =confirm("确认添加任务吗?");
                        if( flag == true ){
                            var form_content = $("#modal_form").serialize();
                            var baseurl = "http://<?php echo my_base_url();?>";
                            $.ajax({
                                type:"POST",
                                url:baseurl+"/project/add_mission",
                                data:form_content,
                                error:function(e){
                                    alert(e+"  ajax错误码是："+e.status);
                                },
                                success:function(data){
                                    if( data == 0 ){
                                        alert("添加成功");
                                    }else if( data == 1 ){
                                        alert("添加失败,开始时间不能迟于结束时间");
                                    }else if( data == 2 ){
                                        alert("添加失败,找不到父节点");
                                    }else if( data == 3 ){
                                        alert("添加失败,节点开始时间不能早于父节点开始时间");
                                    }else if( data == 4 ){
                                        alert("添加失败,节点结束时间不能迟于");
                                    }else if( data == 5 ){
                                        alert("添加失败,节点结束时间不能迟于被依赖项开始时间");
                                    }else if( data == 6 ){
                                        alert("添加失败,节点开始时间不能早于依赖项结束时间");
                                    }else if( data == 7 ){
                                        alert("添加失败,找不到儿子节点");
                                    }else if( data == 8 ){
                                        alert("添加失败,节点开始时间不能迟于儿子节点开始时间");
                                    }else if( data == 9 ){
                                        alert("添加失败,节点结束时间不能早于儿子节点结束时间");
                                    }else if( data == 10 ){
                                        alert("添加失败,日期输入错误");
                                    }else if( data == 11 ){
                                        alert("添加失败,数据库修改失败");
                                    }else if( data == 12 ){
                                        alert("添加失败,根节点已经拥有，不能再创建");
                                    }else if( data == 13 ){
                                        alert("添加失败,你不是项目管理者，没权新建根节点");
                                    }else if( data == 14 ){
                                        alert("添加失败,你没有权限添加该节点");
                                    }else if( data == 15 ){
                                        alert("添加失败,日期没有正确输入");
                                    }else if( data == 16 ){
                                        alert("添加失败,数据库修改失败");
                                    }else if( data == -1 ){
                                        alert("添加失败,Json传入节点信息失败");
                                    }else{
                                        alert("添加失败,PHP后台错误!");
                                    }
                                }
                            });
                        }else{
                            window.location.reload();
                        }
                    }
                });
            })     


/*  
    --------------

        项目图插件

    --------------
 */
var labelType, useGradients, nativeTextSupport, animate;

(function() {
  var ua = navigator.userAgent,
      iStuff = ua.match(/iPhone/i) || ua.match(/iPad/i),
      typeOfCanvas = typeof HTMLCanvasElement,
      nativeCanvasSupport = (typeOfCanvas == 'object' || typeOfCanvas == 'function'),
      textSupport = nativeCanvasSupport 
        && (typeof document.createElement('canvas').getContext('2d').fillText == 'function');
  //I'm setting this based on the fact that ExCanvas provides text support for IE
  //and that as of today iPhone/iPad current text support is lame
  labelType = (!nativeCanvasSupport || (textSupport && !iStuff))? 'Native' : 'HTML';
  nativeTextSupport = labelType == 'Native';
  useGradients = nativeCanvasSupport;
  animate = !(iStuff || !nativeCanvasSupport);
})();

var Log = {
  elem: false,
  write: function(text){
    if (!this.elem) 
      this.elem = document.getElementById('log');
    this.elem.innerHTML = text;
    this.elem.style.left = (500 - this.elem.offsetWidth / 2) + 'px';
  }
};


function init(){
    
    //init Spacetree 初始化Spacetree
    //Create a new ST instance 创建一个新的ST实例
    var st = new $jit.ST({
        'injectInto': 'infovis',
        //set duration for the animation 为动画设置时间
        duration: 200,
        //set animation transition type 设置动画过渡类型
        transition: $jit.Trans.Quart.easeInOut,
        //set distance between node and its children 设置节点及其子节点之间的最大距离
        levelDistance: 50,
        //set max levels to show. Useful when used with 设置显示的最大的树的层级
        //the request method for requesting trees of specific depth 在请求的特定深度的树时十分有用
        levelsToShow: 2,
        //set node and edge styles 设置节点和边缘样式
        //set overridable=true for styling individual 为个别样式设置重写覆盖
        //nodes or edges 节点或边
        Node: {
            height: 20,
            width: 60,
            //use a custom 使用自定义
            //node rendering function 节点渲染函数
            type: 'rectangle',
            color:'#23A4FF',
            lineWidth: 2,
            align:"center",
            overridable: true
        },
        
        Edge: {
            type: 'bezier',
            lineWidth: 2,
            color:'#23A4FF',
            overridable: true
        },

        //Add a request method for requesting on-demand json trees. 
        //This method gets called when a node
        //is clicked and its subtree has a smaller depth
        //than the one specified by the levelsToShow parameter.
        //In that case a subtree is requested and is added to the dataset.
        //This method is asynchronous, so you can make an Ajax request for that
        //subtree and then handle it to the onComplete callback.
        //Here we just use a client-side tree generator (the getTree function).
        //添加一个请求方法，按需请求json树。
        //此方法被调用当一个节点被点击时且其子树中具有比levelsToShow参数所指定的更小的深度。
        //在这种情况下，一个子树被请求，并添加到数据集。
        //这种方法是异步的，这样就可以使一个Ajax请求的子树，然后使用onComplete回调函数进行处理。
        //这里我们只使用一个客户端树生成器（getTree功能）。
        // request: function(nodeId, level, onComplete) {
        //   var ans = getTree(nodeId, level);
        //   onComplete.onComplete(nodeId, ans);  
        // },

        onBeforeCompute: function(node){
            Log.write("loading " + node.name);//点击时展示文本
        },
        
        onAfterCompute: function(){
            Log.write("done");//点击节点展开完成后展示文本
        },
        
        //This method is called on DOM label creation.
        //Use this method to add event handlers and styles to
        //your node.
        ////调用此方法为DOM创建标签。使用此方法将事件处理程序和样式添加到您的节点。
        onCreateLabel: function(label, node){
            label.id = node.id;            
            label.innerHTML = node.name;
            label.onclick = function(){
                // if(normal.checked) {
                st.onClick(node.id);
                // } else {
                // st.setRoot(node.id, 'animate');
                // }
                
                $("#id").val(node.data.id);
                $("#mission_id").val(node.data.missionId);
                $("#parent_id").val(node.data.parentId);
                if( node.data.son != null ){
                    $("#son").val(node.data.son);
                }else{
                    $("#son").val(null);
                }
                if( node.data.dependentedItems != null ){
                    $("#dependented_items").val(node.data.dependentedItems);
                }else{
                    $("#dependented_items").val(null);
                }
                $("#name").val(node.data.name);
                $("#leader").select2("val",node.data.leader);
                $("#finished input[type='radio']").each(function() {
                    if ($(this).val() == node.data.finished) {
                        $(this).click();
                    };
                });
                $("#finish_time").val(node.data.complete_date);
                $("#pay").val(node.data.pay);
                $("#start_date").val(node.data.startDate);
                $("#end_date").val(node.data.endDate);
                if (node.data.end_date == "") {
                    $("#daterange").val(node.data.startDate);
                }else {
                    var daterange = node.data.startDate + " - " + node.data.endDate;
                    $("#daterange").val(daterange);
                };
                $("#descript").val(node.data.descript);
                if( node.data.evaluation != null){
                    $("#all_evaluation").html(node.data.evaluation);
                    $("#history_evaluation").val(node.data.evaluation);
                }else{
                    $("#all_evaluation").html(null);
                    $("#history_evaluation").val(null);
                }
                if( node.data.finishTime != null){
                    $("#finish_time").val(node.data.finishTime);
                }else{
                    $("#finish_time").html(null);
                }
                if( node.data.dependence != null){
                    var dependence = node.data.dependence.split(",");
                    $("#dependence").select2("val",dependence);
                    $("#modal_dependence").select2("val",dependence);
                }else{
                    $("#dependence").select2("val",null);
                    $("#modal_dependence").select2("val",null);
                }
                $("#modal_parent").select2("val",node.data.id);       //顺便修改添加子节点的父节点
                $("#modal_parent_id").val(node.data.id);       //顺便修改添加子节点的父节点
            };
            //set label styles 设置标签样式
            var style = label.style;
            style.width = 60 + 'px';
            style.height = 17 + 'px';            
            style.cursor = 'pointer';
            style.color = '#333';
            style.fontSize = '0.8em';
            style.textAlign= 'center';
            style.paddingTop = '3px';
            // if ( node.id == "node02") {
            //     style.color = 'white';
            // };
        },
        
        //This method is called right before plotting
        //a node. It's useful for changing an individual node
        //style properties before plotting it.
        //The data properties prefixed with a dollar
        //sign will override the global node style properties.
        //这个方法在绘制一个节点之前被正确调用。这对绘制之前，改变单个节点的样式属性非常有用。前面有一个美元符号的数据属性将覆盖全局节点的样式属性。
        onBeforePlotNode: function(node){
            //add some color to the nodes in the path between the
            //root node and the selected node.
            if (node.selected) {
                node.data.$color = "#ff7";
            }
            else {
                delete node.data.$color;
                //if the node belongs to the last plotted level
                if(!node.anySubnode("exist")) {
                    //count children number
                    var count = 0;
                    node.eachSubnode(function(n) { count++; });
                    //assign a node color based on
                    //how many children it has
                    node.data.$color = ['#aaa', '#baa', '#caa', '#daa', '#eaa', '#faa'][count];                    
                }
            }
        },
        
        //This method is called right before plotting
        //an edge. It's useful for changing an individual edge
        //style properties before plotting it.
        //Edge data proprties prefixed with a dollar sign will
        //override the Edge global style properties.
        //此方法绘制一条边前才调用。这对绘制之前改变单个边样式属性非常有用。前面有一个美元符号将覆盖边缘全局样式属性EDGE数据的属性。
        onBeforePlotLine: function(adj){
            if (adj.nodeFrom.selected && adj.nodeTo.selected) {
                adj.data.$color = "#666";
                adj.data.$lineWidth = 3;
            }
            else {
                delete adj.data.$color;
                delete adj.data.$lineWidth;
            }
        }

    });




    //load json data 读取json数据
    st.loadJSON(json);
    //compute node positions and layout 计算节点的位置和布局
    st.compute();
    //emulate a click on the root node. 模拟根节点上的点击事件
    st.geom.translate(new $jit.Complex(-200, 0), "current");
    //emulate a click on the root node.
    st.onClick(st.root);
    //end
    //Add event handlers to switch spacetree orientation. 添加事件处理程序切换spacetree树展示的方向
    var top = $jit.id('r-top'), 
        left = $jit.id('r-left'), 
        bottom = $jit.id('r-bottom'), 
        right = $jit.id('r-right'),
        normal = $jit.id('s-normal');
        
    
    function changeHandler() {
        if(this.checked) {
            top.disabled = bottom.disabled = right.disabled = left.disabled = true;
            st.switchPosition(this.value, "animate", {
                onComplete: function(){
                    top.disabled = bottom.disabled = right.disabled = left.disabled = false;
                }
            });
        }
    };
    
    top.onchange = left.onchange = bottom.onchange = right.onchange = changeHandler;
    //end

    //用top不行，用this.value就行
    // function aaaa(){
    //     alert(this.value);
    //     st.switchPosition(top, "animate", {
    //         onComplete: function(){
                
    //         }
    //     });
    // }
    // var l = $jit.id('lllll');
    // l.onchange = aaaa;
}

$("#delete_button").click(function() {
    if( $("#id").val() == "" ){
        alert("请先选择节点");
    }else{
        //alert("begin");
        var baseurl = "http://<?php echo my_base_url();?>";
        $.ajax({
            url: baseurl+'/project/delete_mission',
            type: 'POST',
            data: "mission_id="+$("#mission_id").val()+"&project_id="+$("#project_id").val(),
            error:function(e){
                alert(e+"  ajax错误码是："+e.status);
            },
            success:function(data){
                if( data == 0 ){
                    alert("删除成功!");
                    window.location.reload();
                }else if( data == 1){
                    alert("删除失败,根节点不能删除");
                    window.location.reload();
                }else if( data == 2){
                    alert("删除失败,你没有权限删除该节点");
                    window.location.reload();
                }else if( data == 3){
                    alert("删除失败,数据库删除失败");
                    window.location.reload();
                }else if( data == 4){
                    alert("删除失败,该节点或该节点的子节点还有被依赖项，不能删除");
                    window.location.reload();
                }else if( data == -1){
                    alert("删除失败,没有找到该节点");
                    window.location.reload();
                }else {
                    alert("删除失败,PHP后台错误");
                    window.location.reload();
                }
            }
        });
    }
});

        </script>         
        
    <!-- END SCRIPTS -->    