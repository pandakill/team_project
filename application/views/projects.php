<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/select2/select2_2.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/user_manage.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/daterangepicker.css" />

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">管理</a></li>
                    <li class="active">项目看板</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Basic Tables</h2>
                </div> -->
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                   
                    <!-- 项目管理开始 -->
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">项目管理</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> 导出数据</button>
                                        <a class="btn btn-info ml20" data-toggle="modal" href='#project' id="trigger">增加项目 <i class="fa fa-dropbox"></i></a>
                                        <ul class="dropdown-menu" id="export_ul3">
                                            <li><a data-type="json" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a data-type="csv" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a data-type="txt" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a data-type="xls" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a data-type="doc" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/word.png' width="24"/> Word</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="project">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">项目信息</h4>
                                            </div>
                                            <form action="#" method="POST" class="form-horizontal" role="form" id="form">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                                                    <div class="form-group">
                                                        <label class="col-xs-3 control-label">项目名称</label>
                                                        <div class="col-xs-7">          
                                                            <div class="input-group">
                                                                <input class="form-control" name="name" placeholder="请输入项目名称" type="text" id="name">
                                                                <span class="input-group-addon"><span class="fa fa-bookmark-o"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-3 control-label">负责人</label>
                                                        <div class="col-xs-7">
                                                            <div class="input-group" style="width: 100%;">
                                                                <select id="leader" name="leader" style="width: 100%" >
                                                                  <?php
                                                                    if( isset($all_employee) ){
                                                                        foreach ($all_employee as $employee) {
                                                                            echo '<option value="'.$employee->workId.'">'.$employee->name.'</option>';
                                                                        }
                                                                    }
                                                                  ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="finished_div">
                                                        <label class="col-xs-3 control-label">完成情况</label>
                                                        <div class="col-xs-7">
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
                                                        <div class="col-xs-7">       
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker" value="2014-11-01" name="finish_time" placeholder="请选择完成日期" id="finish_time">
                                                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-xs-3 control-label">经费</label>
                                                        <div class="col-xs-7">          
                                                            <div class="input-group">
                                                                <input class="form-control" name="pay" placeholder="请输入经费" type="text" id="pay">
                                                                <span class="input-group-addon"><span class="fa fa-money"></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="evaluation_div">
                                                        <label class="col-xs-3 control-label">添加评价</label>
                                                        <div class="col-xs-7">                                            
                                                            <textarea rows="5" class="form-control" id="evaluation" name="evaluation"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="all_evaluation_div">
                                                        <label class="col-xs-3 control-label">历史评价</label>
                                                        <div class="col-xs-7" id="all_evaluation">          
                                                            陈俊杰：撒旦儿童味儿去玩儿阿达阿什顿爱上<br>
                                                            方赞潘：去玩儿去玩儿去玩儿请问而且阿什顿爱上
                                                        </div>
                                                    </div>
                                                    <div class="form-group">            
                                                        <label class="col-xs-3 control-label">日期范围</label>
                                                        <div class="col-xs-7">
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
                                                        <div class="col-xs-7">                                            
                                                            <textarea rows="5" class="form-control" id="descript" name="descript"></textarea>
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
                                
                                <div class="panel-body">
                                    <table id="project_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>项目名称</th>
                                                <th>开始时间</th>
                                                <th>结束时间</th>
                                                <th>负责人</th>
                                                <th>经费</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($all_project)) {
                                                    foreach ($all_project as $project) {
                                                        echo '
                                            <tr>
                                                <td class="id">'.$project->id.'</td>
                                                <td class="name">'.$project->name.'</td>
                                                <td class="start_date">'.$project->startDate.'</td>
                                                <td class="end_date">'.$project->endDate.'</td>
                                                <td class="leader">'.$project->leader.'</td>
                                                <td class="pay">'.$project->pay.'</td>
                                                <td class="finished">'.(($project->finished==0)?"未完成":"已完成").'</td>
                                                <td class="operate">
                                                    <!--<a class="icon_edit" data-toggle="modal" href="#project">编辑</a>-->
                                                    <a href="javascript:void(0);" class="icon_delete">删除</a>
                                                    <a href="http://'.my_base_url().'/project/project_tree/'.$project->id.'" class="icon_view" target="_blank">查看项目</a>
                                                    <div class="hide_info hidden">
                                                        <div class="descript">'.$project->descript.'</div>
                                                        <div class="evaluation">'.(isset($project->evaluation)?$project->evaluation:"").'</div>
                                                        <div class="finish_time">'.(isset($project->finishTime)?$project->finishTime:"").'</div>
                                                    </div>
                                                </td>
                                            </tr>
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                            
                        </div>
                    </div>
                    <!-- 项目管理结束 -->



                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
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
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/select2/select2_2.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/Blob.js"></script>
        <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/FileSaver.js"></script>
        <script src="<?php echo resources_url();?>/js/plugins/tableexport_my/tableExport.js"></script>

        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/moment.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/bootstrap/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->     
        <script>

            //已完成与未完成按钮
            $("#finish").click(function() {
                $("#finishe_div").removeClass('hidden');
            });
            $("#unfinish").click(function() {
                $("#finishe_div").addClass('hidden');
            });

            $(function(){

                var control_form = "";

                //编辑节点 - 选择框
                $("#leader").select2({
                    placeholder : "请您选择负责人"
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

            //项目表格初始化
                var oTable3 = $("#project_table").dataTable({
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [-1]
                    }]
                  });
                $('#project_table').on('click', 'a.icon_delete', function (e) {
                    //获取表格id
                    var id = $(this).parents("tr").find('.id').text();
                    var flag = confirm("确定要删除项目吗?删除成功,与项目关联的任务也将被完全删除!");
                    if( flag ){
                        var baseurl = "http://<?php echo my_base_url();?>";
                        $.ajax({
                            url: baseurl+'/project/delete_project',
                            type: 'POST',
                            data: "id="+id,
                        })
                        .done(function(data) {
                            alert(data);
                        })
                        .fail(function() {
                            alert(e+"  ajax错误码是："+e.status);
                        })
                    }
                    
                });

            //项目选择框初始化
                $("#charge_business").select2({
                  placeholder: "请选择该项目负责的业务",
                  width : 'inherit'
                });

            //模态框 - 项目验证
                $("#form").validate({
                    ignore: ".hidden input , .hidden textarea",
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
                        // start_date: {
                        //     required : true,
                        //     date : true
                        // },
                        // end_date: {
                        //     required : true,
                        //     date : true
                        // },
                        daterange: {
                            required : true
                        },
                        descript: {
                            required : true
                        }
                    },
                    messages: {
                        name: {
                            required : '请您填写项目名称'
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
                        // start_date: {
                        //     required : '请您选择开始日期',
                        //     date : '日期不符合格式'
                        // },
                        // end_date: {
                        //     required : '请您选择截止日期',
                        //     date : '日期不符合格式'
                        // },
                        daterange: {
                            required : '请您选择日期'
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
                        if (control_form == "add") {
                            var baseurl = "http://<?php echo my_base_url();?>";
                            $.ajax({
                                type:"POST",
                                url:baseurl+"/project/add_project",
                                data:$("#form").serialize(),
                                error:function(e){
                                    alert(e+"  ajax错误码是："+e.status);
                                },
                                success:function(data){
                                    if( data = "true" ){
                                        alert("添加成功!");
                                        window.location.reload();
                                    }else{
                                        alert("添加失败");
                                    }
                                }
                            });
                        }else if(control_form == "edit"){
                            alert("edit啊啊");
                        };                    
                    }
                });

            //导出数据3
                var $exportLink3 = document.getElementById('export_ul3');
                $exportLink3.addEventListener('click', function(e){
                    e.preventDefault();
                    if(e.target.nodeName === "A"){
                        tableExport('project_table', '数据3', e.target.getAttribute('data-type'));
                    }
                    
                }, false);

            //表格 - 编辑 - 按钮
                $(".icon_edit").click(function() {

                    control_form = "edit";

                    $("#project label.error").remove();
                    $("#project input.error").removeClass('error');
                    $("#project textarea.error").removeClass('error');

                    //获取表格数据
                    var id = $(this).parents("tr").find('.id').text();
                    var name = $(this).parents("tr").find('.name').text();
                    var start_date = $(this).parents("tr").find('.start_date').text();
                    var end_date = $(this).parents("tr").find('.end_date').text();
                    start_date = start_date.replaceAll("-","/");
                    end_date = end_date.replace("-","/");
                    var leader = $(this).parents("tr").find('.leader').text();
                    var pay = $(this).parents("tr").find('.pay').text();
                    var finished = $(this).parents("tr").find('.finished').text();
                    if( "未完成" == finished ){
                        finished = 0;
                    }else if( "已完成" == finished ){
                        finished = 1;
                    }
                    //获取表格隐藏数据
                    var descript = $(this).siblings('.hide_info').find('.descript').text();
                    alert(finished);
                    var evaluation = $(this).siblings('.hide_info').find('.evaluation').text();
                    var finish_time = $(this).siblings('.hide_info').find('.finish_time').text();
                    var t = finish_time.split(" ");

                    //模态框 - 赋值
                    $("#id").val(id);
                    $("#name").val(name);
                    $("#finished input[type='radio']").each(function() {
                        if ($(this).val() == finished) {
                            $(this).click();
                            $("#finish_time").val(t[0]);
                        };
                    });
                    $("#pay").val(pay);
                    $("#evaluation_div").removeClass('hidden');
                    $("#all_evaluation_div").removeClass('hidden');
                    $("#finished_div").removeClass('hidden');
                    $("#all_evaluation").val(evaluation);
                    $("#start_date").val(start_date);
                    $("#end_date").val(end_date);
                    var daterange = start_date + " - " + end_date;
                    $("#daterange").val(daterange);
                    $("#descript").val(descript);
                    
                });

                //表格 - 添加 - 按钮
                $("#trigger").click(function(){

                    control_form = "add";

                    $("#project label.error").remove();
                    $("#project input.error").removeClass('error');
                    $("#project textarea.error").removeClass('error');

                    
                    //模态框 - 置空
                    $("#id").val(null);
                    $("#name").val(null);
                    $("#unfinish").click();
                    $("#pay").val(null);
                    $("#evaluation_div").addClass('hidden');
                    $("#all_evaluation_div").addClass('hidden');
                    $("#finished_div").addClass('hidden');
                    $("#daterange").val(null);
                    $("#start_date").val(null);
                    $("#end_date").val(null);
                    $("#descript").val(null);

                })


            });
            </script>