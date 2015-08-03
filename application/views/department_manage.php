<?php
//if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

                <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/select2/select2_2.css"/>
                <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/user_manage.css"/>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">管理</a></li>
                    <li class="active">部门管理</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <!-- <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Basic Tables</h2>
                </div> -->
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                   
                    <!-- 部门管理开始 -->
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">部门管理</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> 导出数据</button>
                                        <a class="btn btn-info ml20" data-toggle="modal" href='#modal_department' id="modal_department_trigger">增加部门 <i class="fa fa-dropbox"></i></a>
                                        <ul class="dropdown-menu" id="export_ul3">
                                            <li><a data-type="json" href="javascript:;"><img src='<?php echo resources_url();?>/<?php echo resources_url();?>/img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a data-type="csv" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a data-type="txt" href="javascript:;"><img src='<?php echo resources_url();?>/<?php echo resources_url();?>/img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a data-type="xls" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a data-type="doc" href="javascript:;"><img src='<?php echo resources_url();?>/img/icons/word.png' width="24"/> Word</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal_department">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">部门信息</h4>
                                            </div>
                                            <form action="#" method="POST" class="form-horizontal" role="form" id="modal_department_form">
                                                <div class="modal-body">
                                                    <input type="hidden" name="modal_department_id" id="modal_department_id" class="form-control" value="">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">部门名称</label>
                                                        <div class="col-md-7">          
                                                            <div class="input-group">
                                                                <input class="form-control" name="modal_department_name" placeholder="请输入部门名称" type="text" id="modal_department_name">
                                                                <span class="input-group-addon"><span class="fa fa-bookmark-o"></span></span>
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
                                
                                <div class="panel-body">
                                    <table id="department_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>部门名称</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                if(isset($departments) && is_array($departments))
                                                    foreach($departments as $dep)
                                                    {
                                                        echo'
                                            <tr>
                                                <td class="id">'.$dep->id.'</td>
                                                <td class="department_name">'.$dep->name.'</td>
                                                <td class="operate">
                                                    <a class="icon_edit" data-toggle="modal" href="#modal_department">编辑</a>
                                                    <a href="javascript:void(0);" class="icon_delete">删除</a>
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
                    <!-- 部门管理结束 -->



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
        <!-- END THIS PAGE PLUGINS-->  
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->     
        <script>

            $(function(){

                var control_form = "";

            //部门表格初始化
                var oTable3 = $("#department_table").dataTable({
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [-1]
                    }]
                  });
                $('#department_table').on('click', 'a.icon_delete', function (e) {
                    //获取表格id
                    var id = $(this).parents("tr").find('.id').text();

                    // alert("要删除的id值为："+id);

                  var base_url = "http://<?php echo my_base_url(); ?>/Department/deleteDepartment/"+id;
                  $.ajax(
                  {
                    url:base_url,
                    error:function(e)
                    {
                      alert(e+"  ajax错误码是："+e.status);
                    },
                    success:function(data)
                    { 
                      alert(data);
                    }
                  });

                    e.preventDefault();
                    var nRow = $(this).parents('tr')[0];
                    oTable3.fnDeleteRow( nRow );
                });

            //部门选择框初始化
                $("#charge_business").select2({
                  placeholder: "请选择该部门负责的业务",
                  width : 'inherit'
                });

            //模态框 - 部门验证
                $("#modal_department_form").validate({
                    rules: {
                        modal_department_name: {
                            required : true
                        }
                    },
                    messages: {
                        modal_department_name: {
                            required : '请您填写部门名称'
                        }
                    },
                    errorPlacement: function(error, element) {  
                      error.appendTo ( element.parent().parent() );  
                      error.addClass ("checkbox-inline");
                    },
                    submitHandler:function(form){
                        if (control_form == "add") {
                            // alert("add");
                            $(form).attr('action', 'http://<?php echo my_base_url();?>/Department/addDepartment');
                        }else if(control_form == "edit"){
                            // alert("edit");
                            $(form).attr('action', 'http://<?php echo my_base_url();?>/Department/updateDepartment');
                        };
                        $(form).submit();
                    }
                });

            //导出数据3
                var $exportLink3 = document.getElementById('export_ul3');
                $exportLink3.addEventListener('click', function(e){
                    e.preventDefault();
                    if(e.target.nodeName === "A"){
                        tableExport('department_table', '数据3', e.target.getAttribute('data-type'));
                    }
                    
                }, false);

            //表格 - 编辑 - 按钮
                $(".icon_edit").click(function() {

                    control_form = "edit";

                    $("#modal_department label.error").remove();
                    $("#modal_department input.error").removeClass('error');

                    //获取表格id
                    var id = $(this).parents("tr").find('.id').text();
                    //获取表格部门名字
                    var department_name = $(this).parents("tr").find('.department_name').text();

                    //模态框 - 赋值
                    $("#modal_department_id").val(id);
                    $("#modal_department_name").val(department_name);
                    
                });

                //表格 - 添加 - 按钮
                $("#modal_department_trigger").click(function(){

                    control_form = "add";

                    $("#modal_department label.error").remove();
                    $("#modal_department input.error").removeClass('error');

                    
                    //模态框 - 置空
                    $("#modal_department_id").val(null);
                    $("#modal_department_name").val(null);
                })


            });
            </script>