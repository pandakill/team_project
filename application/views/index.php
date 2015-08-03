<?php
if (! defined ( 'BASEPATH' ))
  exit ( 'No direct script access allowed' );
?>
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">首页</a></li>                    
                    <li class="active">控制台</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">新公告</div>             
                                        <div class="widget-subtitle">Anounces</div>
                                        <div class="widget-int">3,548</div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">我的消息总数</div>
                                        <div class="widget-subtitle">News</div>
                                        <div class="widget-int"><?php echo (isset($employees_count) ? $employees_count : 'null') ?></div>
                                    </div>
                                    <!-- <div>                                    
                                        <div class="widget-title">New</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int">1,977</div>
                                    </div> -->
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="隐藏"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-default widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="隐藏"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='#';">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo (isset($employees_count) ? $employees_count : 'null') ?></div>
                                    <div class="widget-title">新消息</div>
                                    <div class="widget-subtitle">New messages</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="隐藏"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?php echo (isset($employees_count) ? $employees_count : 'null') ?></div>
                                    <div class="widget-title">员工总数</div>
                                    <div class="widget-subtitle">Worker</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="隐藏"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        
                    </div>
                    <!-- END WIDGETS -->      
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- START PANEL WITH CONTROL CLASSES -->
                            <div class="panel panel-warning">
                                <div class="panel-heading text-center">
                                    <a href="#" class="btn btn-success<?php if(isset($have_come) || isset($have_leave)){echo " hidden";} ?>" id="come_btn">上班签到</a>
                                    <a href="#" class="btn btn-warning<?php if(isset($have_off) || !isset($have_come)){echo " hidden";} ?>" id="off_btn">下班签退</a>
                                    <a href="#" class="btn btn-danger<?php if(isset($have_leave) || isset($have_come)){echo " hidden";} ?>" id="leave_btn">请假</a>
                                    <?php 
                                        if( isset($have_leave) )
                                        { 
                                            echo "今天已经请假!好好休假,争取早日返工!";
                                        }else if( isset($have_off) )
                                        {
                                            echo "今天已经签退!早点休息,明天继续加油!";
                                        }
                                    ?>
                                </div>
                                <form action="#" method="POST" class="form-horizontal hidden" role="form" id="leave_form">
                                    <div class="panel-body" style="height:266px;">
                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">请假事由</label>
                                            <div class="col-md-10 col-xs-12">                                            
                                                <textarea id="leave_comment" class="form-control" name="comment" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="panel-footer">                                
                                        <button class="btn btn-primary pull-right" id="leave_submit" type="button">提交</button>
                                    </div>    
                                </form>
                                <form action="#" method="POST" class="form-horizontal hidden" role="form" id="come_form">
                                    <div class="panel-body" style="height:266px;">
                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">今天要做什么：</label>
                                            <div class="col-md-10 col-xs-12">                                            
                                                <textarea id="come_comment" class="form-control" name="comment" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="panel-footer">                                
                                        <button class="btn btn-primary pull-right" id="come_submit" type="button">提交</button>
                                    </div>    
                                </form>
                                <form action="#" method="POST" class="form-horizontal hidden" role="form" id="off_form">
                                    <div class="panel-body" style="height:266px;">
                                        <div class="form-group">
                                            <label class="col-md-2 col-xs-12 control-label">今天做了什么：</label>
                                            <div class="col-md-10 col-xs-12">                                            
                                                <textarea id="off_comment" class="form-control" name="comment" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="panel-footer">                                
                                        <button class="btn btn-primary pull-right" id="off_submit" type="button">提交</button>
                                    </div>
                                </form>             
                            </div>
                            <!-- END PANEL WITH CONTROL CLASSES -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- NEWS WIDGET -->
                            <div class="panel panel-default panel-hidden-controls">
                                <div class="panel-heading">
                                    <h3 class="panel-title">签到心情<i class="fa fa-calendar" id="come_calendar"></i></h3>  
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul> 
                                </div>
                                <div class="panel-body scroll" style="height: 250px;">
                                    <?php
                                        if( isset( $clocking_in ) )
                                        {
                                            foreach ( $clocking_in as $clocking ) {
                                                if( $clocking->comment != null || $clocking->comment != "" ){
                                                    echo '<h6><img alt="头像名字" src="'.resources_url().'/assets/images/users/no-image.jpg" style="width:40px" class="sigh_avatar">&nbsp;&nbsp;' . $clocking->employee_name . '</h6>';
                                                    echo '<p>'. $clocking->comment .'<span class="text-muted"><i class="fa fa-clock-o"></i> '. $clocking->time .'</span></p>';
                                                }
                                            }
                                        }
                                    ?>                         
                                </div>
                            </div>
                            <!-- END NEWS WIDGET -->
                        </div>

                        <div class="col-md-6">
                            <!-- NEWS WIDGET -->
                            <div class="panel panel-default panel-hidden-controls">
                                <div class="panel-heading">
                                    <h3 class="panel-title">签退心情<i class="fa fa-calendar" id="come_calendar"></i></h3>  
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul> 
                                </div>
                                <div class="panel-body scroll" style="height: 250px;">
                                    <?php
                                        if( isset( $clocking_out ) )
                                        {
                                            foreach ( $clocking_out as $clocking ) {
                                                if( $clocking->comment != null || $clocking->comment != "" ){
                                                    echo '<h6><img alt="头像名字" src="'.resources_url().'/assets/images/users/no-image.jpg" style="width:40px" class="sigh_avatar">&nbsp;&nbsp;' . $clocking->employee_name . '</h6>';
                                                    echo '<p>'. $clocking->comment .'<span class="text-muted"><i class="fa fa-clock-o"></i> '. $clocking->time .'</span></p>';
                                                }
                                            }
                                        }
                                    ?>                         
                                </div>
                            </div>
                            <!-- END NEWS WIDGET -->
                        </div>

                    </div>


                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
               
        
    <!-- START SCRIPTS -->

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
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?php echo resources_url();?>/js/settings.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
        

    <!-- END SCRIPTS -->     

        <script type="text/javascript">

            //打卡上班与请假
            $("#come_btn").click(function(){
                $("#come_form").removeClass('hidden');
                $("#leave_form").addClass('hidden');
                $("#off_form").addClass('hidden');
            })
            $("#off_btn").click(function(){
                $("#off_form").removeClass('hidden');
                $("#leave_form").addClass('hidden');
                $("#come_form").addClass('hidden');
            })
            $("#leave_btn").click(function(){
                $("#leave_form").removeClass('hidden');
                $("#come_form").addClass('hidden');
                $("#off_form").addClass('hidden');
            })
            $("#come_submit").click(function(){
                var baseurl = "http://<?php echo my_base_url();?>";
                $.ajax({
                    type:"POST",
                    url:baseurl+"/clocking/clocking_in",
                    data:"comment="+$("#come_comment").val()+"&action=0",
                    error:function(e){
                        alert(e+"  ajax错误码是："+e.status);
                    },
                    success:function(data){
                        if (data == "success") {
                            alert("签到成功");
                            window.location.reload();
                        }else{
                            alert("签到失败,请刷新后重新签到！");
                        };
                    }
                });
            })
            $("#off_submit").click(function(){
                var baseurl = "http://<?php echo my_base_url();?>";
                $.ajax({
                    type:"POST",
                    url:baseurl+"/clocking/clocking_in",
                    data:"comment="+$("#off_comment").val()+"&action=1",
                    error:function(e){
                        alert(e+"  ajax错误码是："+e.status);
                    },
                    success:function(data){
                        if (data == "success") {
                            alert("签退成功");
                            window.location.reload();
                        }else{
                            alert("签退失败,请刷新后重新签到！");
                        };
                    }
                });
            })
            $("#leave_submit").click(function(){
                var baseurl = "http://<?php echo my_base_url();?>";
                $.ajax({
                    type:"POST",
                    url:baseurl+"/clocking/clocking_in",
                    data:"comment="+$("#leave_comment").val()+"&action=2",
                    error:function(e){
                        alert(e+"  ajax错误码是："+e.status);
                    },
                    success:function(data){
                        if (data == "success") {
                            alert("请假成功");
                            window.location.reload();
                        }else{
                            alert("请假失败,请刷新后重新签到！");
                        };
                    }
                });
            })

            //留言板
            $("#message_submit").click(function() {
                var myDate = new Date();        
                var myTime = myDate.toLocaleTimeString();
                var message_input = $("#message_input").val();
                var message_content = '<div class="item in item-visible"><div class="image"><img src="<?php echo resources_url();?>/assets/images/users/user2.jpg" alt="John Doe"></div><div class="text"><div class="heading"><a href="#">超级管理员</a><span class="date">' + myTime + '</span></div>' + message_input + '</div></div>';
                $("#message_div").prepend(message_content);
            });

            Morris.Line({
                element: 'dashboard-line-1',
                data: [
                    { y: '2014-10-10', all: 4 , come: 2 },
                    { y: '2014-10-11', all: 6 , come: 4 },
                    { y: '2014-10-12', all: 10, come: 7 },
                    { y: '2014-10-13', all: 7 , come: 5 },
                    { y: '2014-10-14', all: 9 , come: 6 },
                    { y: '2014-10-15', all: 12, come: 9 },
                    { y: '2014-10-16', all: 20, come: 18},
                    { y: '2014-10-17', all: 20, come: 20},
                    { y: '2014-10-18', all: 32, come: 31},
                    { y: '2014-10-19', all: 33, come: 28},
                    { y: '2014-10-20', all: 28, come: 27},
                    { y: '2014-10-21', all: 30, come: 29},
                    { y: '2014-10-22', all: 35, come: 32},
                    { y: '2014-10-23', all: 37, come: 35},
                    { y: '2014-10-24', all: 37, come: 37},
                    { y: '2014-10-25', all: 37, come: 36},
                    { y: '2014-10-26', all: 40, come: 39},
                    { y: '2014-10-27', all: 40, come: 35},
                    { y: '2014-10-28', all: 40, come: 37},
                    { y: '2014-10-29', all: 40, come: 30},
                    { y: '2014-10-30', all: 41, come: 38},
                    { y: '2014-10-31', all: 41, come: 39}
                ],
                xkey: 'y',
                ykeys: ['come','all'],
                labels: ['实到','应到'],
                resize: true,
                hideHover: true,
                xLabels: 'day',
                gridTextSize: '10px',
                lineColors: ['#1caf9a','#33414E'],
                gridLineColor: '#E5E5E5'
            }); 

            $("#come_calendar").datepicker({format: 'yyyy-mm-dd'});
            $("#chart_calendar").datepicker({format: 'yyyy-mm-dd'});
            
        </script>