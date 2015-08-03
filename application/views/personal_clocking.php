<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

                <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/select2/select2_2.css"/>
                <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/user_manage.css"/>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>
                    <li><a href="#">信息</a></li>
                    <li class="active"><?php echo $this_page;?></li>
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
                                    <h3 class="panel-title"><?php echo $this_page;?></h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> 导出数据</button>
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
                                
                                <div class="panel-body">
                                    <table id="department_table" class="table">
                                        <thead>
                                            <tr>
                                                <th>姓名</th>
                                                <th>日期</th>
                                                <th>时间</th>
                                                <th>状态</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if( isset( $clockings ) )
                                                {
                                                    foreach ( $clockings as $clocking ) {
                                                        $date = $clocking->time;
                                                        $t = explode(" ", $date);
                                                        echo '
                                            <tr>
                                                        ';
                                                        if(isset($this_name)){
                                                        echo '
                                                <td >'. $this_name .'</td>
                                                        ';
                                                        }else{
                                                            echo '
                                                <td >'. $clocking->employee_name .'</td>
                                                            ';
                                                        }
                                                        echo '
                                                <td >'. $t[0] .'</td>
                                                <td >'. $t[1] .'</td>
                                                        ';
                                                        switch ( $clocking->action ) {
                                                            case 0:
                                                            echo '
                                                <td ><span class="label label-warning">正常签到</span></td>
                                                                ';
                                                                break;
                                                            case 1:
                                                            echo '
                                                <td ><span class="label label-warning">正常签退</span></td>
                                                                ';
                                                                break;
                                                            case 2:
                                                            echo '
                                                <td ><span class="label label-danger"> 请 假 </span></td>
                                                                ';
                                                                break;
                                                            case 3:
                                                            echo '
                                                <td ><span class="label label-danger"> 迟 到 </span></td>
                                                                ';
                                                                break;
                                                            case 4:
                                                            echo '
                                                <td ><span class="label label-danger"> 早 退 </span></td>
                                                                ';
                                                                break;
                                                            
                                                            default:
                                                                break;
                                                        }

                                                        echo '
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
                    <!-- 个人考勤查看结束 -->



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

            //部门表格初始化
                var oTable3 = $("#department_table").dataTable({
                    aoColumnDefs: [{
                        bSortable: false,
                        aTargets: [-1]
                    }]
                  });
            });
    </script>