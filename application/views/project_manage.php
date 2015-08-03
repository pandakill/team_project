<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
?>

                <link rel="stylesheet" type="text/css" href="css/select2/select2_2.css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
        
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
                                    <div id="log"></div>
<table>
          <tr>
              <td>
                  <label for="r-left">左边 </label>
              </td>
              <td>
                  <input type="radio" id="r-left" name="orientation" checked="checked" value="left" />
              </td>
          </tr>
          <tr>
               <td>
                  <label for="r-top">上方 </label>
               </td>
               <td>
                  <input type="radio" id="r-top" name="orientation" value="top" />
               </td>
          </tr>
          <tr>
               <td>
                  <label for="r-bottom">底端 </label>
                </td>
                <td>
                  <input type="radio" id="r-bottom" name="orientation" value="bottom" />
                </td>
          </tr>
          <tr>
                <td>
                  <label for="r-right">右边 </label>
                </td> 
                <td> 
                 <input type="radio" id="r-right" name="orientation" value="right" />
                </td>
          </tr>
      </table>
      
      <!-- <h2>选择模式</h2>
      <table>
          <tr>
              <td>
                  <label for="s-normal">正常 </label>
              </td>
              <td>
                  <input type="radio" id="s-normal" name="selection" checked="checked" value="normal" />
              </td>
          </tr>
          <tr>
               <td>
                  <label for="s-root">根节点 </label> 
               </td>
               <td>
                  <input type="radio" id="s-root" name="selection" value="root" />
               </td>
          </tr>
      </table> -->

        <hr>

        <form action="" method="POST" class="form-horizontal" role="form" id="form">
            <input type="hidden" name="id" id="id" class="form-control" value="">
            <div class="row">

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label class="control-label col-xs-3">姓名</label>
                        <div class="col-xs-7">          
                            <div class="input-group">
                                <input class="form-control" name="name" placeholder="请输入姓名" type="text" id="name">
                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">负责人</label>
                        <div class="col-xs-7">
                            <div class="input-group" style="width: 100%;">
                                <select id="leader" multiple="multiple" name="leader" style="width: 100%" placeholder="请您选择负责人">
                                  <option value="湛耀">湛耀</option>
                                  <option value="吴崇辉">吴崇辉</option>
                                  <option value="方赞潘">方赞潘</option>
                                  <option value="林德欣">林德欣</option>
                                  <option value="陈俊杰">陈俊杰</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">完成情况</label>
                        <div class="col-xs-9">
                            <div class="radio" id="finished">
                                <label>
                                    <input type="radio" name="finished[]" value="" checked="checked">已完成
                                </label>
                                <label>
                                    <input type="radio" name="finished[]" value="">未完成
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">            
                        <label class="control-label col-xs-3">完成日期</label>
                        <div class="col-xs-7">       
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" value="2014-11-01" name="finish_time" placeholder="请选择完成日期" id="finish_time">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">经费</label>
                        <div class="col-xs-7">          
                            <div class="input-group">
                                <input class="form-control" name="pay" placeholder="请输入经费" type="text" id="pay">
                                <span class="input-group-addon"><span class="fa fa-money"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">自我评价</label>
                        <div class="col-xs-7">                                            
                            <textarea rows="5" class="form-control" id="own_evaluation" name="own_evaluation"></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="form-group">            
                        <label class="control-label col-xs-3">开始日期</label>
                        <div class="col-xs-7">       
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" value="2014-11-01" name="start_date" placeholder="请选择开始日期" id="start_date">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">            
                        <label class="control-label col-xs-3">截止日期</label>
                        <div class="col-xs-7">       
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" value="2014-11-01" name="end_date" placeholder="请选择截止日期" id="end_date">
                                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">描述</label>
                        <div class="col-xs-7">                                            
                            <textarea rows="5" class="form-control" id="descript" name="descript"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 control-label">上级评价</label>
                        <div class="col-xs-7">                                            
                            <textarea rows="5" class="form-control" id="leader_evaluation" name="leader_evaluation"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            
              <div class="form-group">
                  <div class="col-sm-12 text-center">
                      <button type="submit" class="btn btn-primary">保存</button>
                  </div>
              </div>
        </form>

                                </div>
                                <div class="panel-footer">                                
                                    <button class="btn btn-primary pull-right" id="aaa">保存项目</button>
                                </div>                            
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

        <!--[if IE]><script language="javascript" type="text/javascript" src="<?php echo resources_url();?>/js/excanvas.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo resources_url();?>/js/jit-yc.js"></script>
<script type="text/javascript">
    //初始化的项目数据
    var json = {
        id: "node02",
        name: "0.2",
        data: {},
        children: [{
            id: "node13",
            name: "1.3",
            data: {},
            children: [{
                id: "node24",
                name: "2.4",
                data: {},
                children: [{
                    id: "node35",
                    name: "3.5",
                    data: {},
                    children: [{
                        id: "node46",
                        name: "4.6",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node37",
                    name: "3.7",
                    data: {},
                    children: [{
                        id: "node48",
                        name: "4.8",
                        data: {},
                        children: []
                    }, {
                        id: "node49",
                        name: "4.9",
                        data: {},
                        children: []
                    }, {
                        id: "node410",
                        name: "4.10",
                        data: {},
                        children: []
                    }, {
                        id: "node411",
                        name: "4.11",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node312",
                    name: "3.12",
                    data: {},
                    children: [{
                        id: "node413",
                        name: "4.13",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node314",
                    name: "3.14",
                    data: {},
                    children: [{
                        id: "node415",
                        name: "4.15",
                        data: {},
                        children: []
                    }, {
                        id: "node416",
                        name: "4.16",
                        data: {},
                        children: []
                    }, {
                        id: "node417",
                        name: "4.17",
                        data: {},
                        children: []
                    }, {
                        id: "node418",
                        name: "4.18",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node319",
                    name: "3.19",
                    data: {},
                    children: [{
                        id: "node420",
                        name: "4.20",
                        data: {},
                        children: []
                    }, {
                        id: "node421",
                        name: "4.21",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node222",
                name: "2.22",
                data: {},
                children: [{
                    id: "node323",
                    name: "3.23",
                    data: {},
                    children: [{
                        id: "node424",
                        name: "4.24",
                        data: {},
                        children: []
                    }]
                }]
            }]
        }, {
            id: "node125",
            name: "1.25",
            data: {},
            children: [{
                id: "node226",
                name: "2.26",
                data: {},
                children: [{
                    id: "node327",
                    name: "3.27",
                    data: {},
                    children: [{
                        id: "node428",
                        name: "4.28",
                        data: {},
                        children: []
                    }, {
                        id: "node429",
                        name: "4.29",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node330",
                    name: "3.30",
                    data: {},
                    children: [{
                        id: "node431",
                        name: "4.31",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node332",
                    name: "3.32",
                    data: {},
                    children: [{
                        id: "node433",
                        name: "4.33",
                        data: {},
                        children: []
                    }, {
                        id: "node434",
                        name: "4.34",
                        data: {},
                        children: []
                    }, {
                        id: "node435",
                        name: "4.35",
                        data: {},
                        children: []
                    }, {
                        id: "node436",
                        name: "4.36",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node237",
                name: "2.37",
                data: {},
                children: [{
                    id: "node338",
                    name: "3.38",
                    data: {},
                    children: [{
                        id: "node439",
                        name: "4.39",
                        data: {},
                        children: []
                    }, {
                        id: "node440",
                        name: "4.40",
                        data: {},
                        children: []
                    }, {
                        id: "node441",
                        name: "4.41",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node342",
                    name: "3.42",
                    data: {},
                    children: [{
                        id: "node443",
                        name: "4.43",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node344",
                    name: "3.44",
                    data: {},
                    children: [{
                        id: "node445",
                        name: "4.45",
                        data: {},
                        children: []
                    }, {
                        id: "node446",
                        name: "4.46",
                        data: {},
                        children: []
                    }, {
                        id: "node447",
                        name: "4.47",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node348",
                    name: "3.48",
                    data: {},
                    children: [{
                        id: "node449",
                        name: "4.49",
                        data: {},
                        children: []
                    }, {
                        id: "node450",
                        name: "4.50",
                        data: {},
                        children: []
                    }, {
                        id: "node451",
                        name: "4.51",
                        data: {},
                        children: []
                    }, {
                        id: "node452",
                        name: "4.52",
                        data: {},
                        children: []
                    }, {
                        id: "node453",
                        name: "4.53",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node354",
                    name: "3.54",
                    data: {},
                    children: [{
                        id: "node455",
                        name: "4.55",
                        data: {},
                        children: []
                    }, {
                        id: "node456",
                        name: "4.56",
                        data: {},
                        children: []
                    }, {
                        id: "node457",
                        name: "4.57",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node258",
                name: "2.58",
                data: {},
                children: [{
                    id: "node359",
                    name: "3.59",
                    data: {},
                    children: [{
                        id: "node460",
                        name: "4.60",
                        data: {},
                        children: []
                    }, {
                        id: "node461",
                        name: "4.61",
                        data: {},
                        children: []
                    }, {
                        id: "node462",
                        name: "4.62",
                        data: {},
                        children: []
                    }, {
                        id: "node463",
                        name: "4.63",
                        data: {},
                        children: []
                    }, {
                        id: "node464",
                        name: "4.64",
                        data: {},
                        children: []
                    }]
                }]
            }]
        }, {
            id: "node165",
            name: "1.65",
            data: {},
            children: [{
                id: "node266",
                name: "2.66",
                data: {},
                children: [{
                    id: "node367",
                    name: "3.67",
                    data: {},
                    children: [{
                        id: "node468",
                        name: "4.68",
                        data: {},
                        children: []
                    }, {
                        id: "node469",
                        name: "4.69",
                        data: {},
                        children: []
                    }, {
                        id: "node470",
                        name: "4.70",
                        data: {},
                        children: []
                    }, {
                        id: "node471",
                        name: "4.71",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node372",
                    name: "3.72",
                    data: {},
                    children: [{
                        id: "node473",
                        name: "4.73",
                        data: {},
                        children: []
                    }, {
                        id: "node474",
                        name: "4.74",
                        data: {},
                        children: []
                    }, {
                        id: "node475",
                        name: "4.75",
                        data: {},
                        children: []
                    }, {
                        id: "node476",
                        name: "4.76",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node377",
                    name: "3.77",
                    data: {},
                    children: [{
                        id: "node478",
                        name: "4.78",
                        data: {},
                        children: []
                    }, {
                        id: "node479",
                        name: "4.79",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node380",
                    name: "3.80",
                    data: {},
                    children: [{
                        id: "node481",
                        name: "4.81",
                        data: {},
                        children: []
                    }, {
                        id: "node482",
                        name: "4.82",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node283",
                name: "2.83",
                data: {},
                children: [{
                    id: "node384",
                    name: "3.84",
                    data: {},
                    children: [{
                        id: "node485",
                        name: "4.85",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node386",
                    name: "3.86",
                    data: {},
                    children: [{
                        id: "node487",
                        name: "4.87",
                        data: {},
                        children: []
                    }, {
                        id: "node488",
                        name: "4.88",
                        data: {},
                        children: []
                    }, {
                        id: "node489",
                        name: "4.89",
                        data: {},
                        children: []
                    }, {
                        id: "node490",
                        name: "4.90",
                        data: {},
                        children: []
                    }, {
                        id: "node491",
                        name: "4.91",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node392",
                    name: "3.92",
                    data: {},
                    children: [{
                        id: "node493",
                        name: "4.93",
                        data: {},
                        children: []
                    }, {
                        id: "node494",
                        name: "4.94",
                        data: {},
                        children: []
                    }, {
                        id: "node495",
                        name: "4.95",
                        data: {},
                        children: []
                    }, {
                        id: "node496",
                        name: "4.96",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node397",
                    name: "3.97",
                    data: {},
                    children: [{
                        id: "node498",
                        name: "4.98",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node399",
                    name: "3.99",
                    data: {},
                    children: [{
                        id: "node4100",
                        name: "4.100",
                        data: {},
                        children: []
                    }, {
                        id: "node4101",
                        name: "4.101",
                        data: {},
                        children: []
                    }, {
                        id: "node4102",
                        name: "4.102",
                        data: {},
                        children: []
                    }, {
                        id: "node4103",
                        name: "4.103",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node2104",
                name: "2.104",
                data: {},
                children: [{
                    id: "node3105",
                    name: "3.105",
                    data: {},
                    children: [{
                        id: "node4106",
                        name: "4.106",
                        data: {},
                        children: []
                    }, {
                        id: "node4107",
                        name: "4.107",
                        data: {},
                        children: []
                    }, {
                        id: "node4108",
                        name: "4.108",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node2109",
                name: "2.109",
                data: {},
                children: [{
                    id: "node3110",
                    name: "3.110",
                    data: {},
                    children: [{
                        id: "node4111",
                        name: "4.111",
                        data: {},
                        children: []
                    }, {
                        id: "node4112",
                        name: "4.112",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node3113",
                    name: "3.113",
                    data: {},
                    children: [{
                        id: "node4114",
                        name: "4.114",
                        data: {},
                        children: []
                    }, {
                        id: "node4115",
                        name: "4.115",
                        data: {},
                        children: []
                    }, {
                        id: "node4116",
                        name: "4.116",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node3117",
                    name: "3.117",
                    data: {},
                    children: [{
                        id: "node4118",
                        name: "4.118",
                        data: {},
                        children: []
                    }, {
                        id: "node4119",
                        name: "4.119",
                        data: {},
                        children: []
                    }, {
                        id: "node4120",
                        name: "4.120",
                        data: {},
                        children: []
                    }, {
                        id: "node4121",
                        name: "4.121",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node3122",
                    name: "3.122",
                    data: {},
                    children: [{
                        id: "node4123",
                        name: "4.123",
                        data: {},
                        children: []
                    }, {
                        id: "node4124",
                        name: "4.124",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node2125",
                name: "2.125",
                data: {},
                children: [{
                    id: "node3126",
                    name: "3.126",
                    data: {},
                    children: [{
                        id: "node4127",
                        name: "4.127",
                        data: {},
                        children: []
                    }, {
                        id: "node4128",
                        name: "4.128",
                        data: {},
                        children: []
                    }, {
                        id: "node4129",
                        name: "4.129",
                        data: {},
                        children: []
                    }]
                }]
            }]
        }, {
            id: "node1130",
            name: "1.130",
            data: {},
            children: [{
                id: "node2131",
                name: "2.131",
                data: {},
                children: [{
                    id: "node3132",
                    name: "3.132",
                    data: {},
                    children: [{
                        id: "node4133",
                        name: "4.133",
                        data: {},
                        children: []
                    }, {
                        id: "node4134",
                        name: "4.134",
                        data: {},
                        children: []
                    }, {
                        id: "node4135",
                        name: "4.135",
                        data: {},
                        children: []
                    }, {
                        id: "node4136",
                        name: "4.136",
                        data: {},
                        children: []
                    }, {
                        id: "node4137",
                        name: "4.137",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node2138",
                name: "2.138",
                data: {},
                children: [{
                    id: "node3139",
                    name: "3.139",
                    data: {},
                    children: [{
                        id: "node4140",
                        name: "4.140",
                        data: {},
                        children: []
                    }, {
                        id: "node4141",
                        name: "4.141",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node3142",
                    name: "3.142",
                    data: {},
                    children: [{
                        id: "node4143",
                        name: "4.143",
                        data: {},
                        children: []
                    }, {
                        id: "node4144",
                        name: "4.144",
                        data: {},
                        children: []
                    }, {
                        id: "node4145",
                        name: "4.145",
                        data: {},
                        children: []
                    }, {
                        id: "node4146",
                        name: "4.146",
                        data: {},
                        children: []
                    }, {
                        id: "node4147",
                        name: "4.147",
                        data: {},
                        children: []
                    }]
                }]
            }]
        }]
    };
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
                $("#leader").select2();

                $("#form").validate({
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
                        own_evaluation: {
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
                        },
                        leader_evaluation: {
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
                        own_evaluation: {
                            required : '请您输入自我评价'
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
                        },
                        leader_evaluation: {
                            required : '请您填写上级评价'
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
                        alert("要提交表单了！！！");
                    }
                });
            })     

            $("#aaa").click(function(){
                $("#infovis").html("");     //清空项目内容
                //更改后的项目数据
                json = {
        id: "node02",
        name: "0.2",
        data: {},
        children: [{
            id: "node13",
            name: "1.3",
            data: {},
            children: [{
                id: "node24",
                name: "2.4",
                data: {},
                children: [{
                    id: "node35",
                    name: "3.5",
                    data: {},
                    children: [{
                        id: "node46",
                        name: "4.6",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node37",
                    name: "3.7",
                    data: {},
                    children: [{
                        id: "node48",
                        name: "4.8",
                        data: {},
                        children: []
                    }, {
                        id: "node49",
                        name: "4.9",
                        data: {},
                        children: []
                    }, {
                        id: "node410",
                        name: "4.10",
                        data: {},
                        children: []
                    }, {
                        id: "node411",
                        name: "4.11",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node312",
                    name: "3.12",
                    data: {},
                    children: [{
                        id: "node413",
                        name: "4.13",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node314",
                    name: "3.14",
                    data: {},
                    children: [{
                        id: "node415",
                        name: "4.15",
                        data: {},
                        children: []
                    }, {
                        id: "node416",
                        name: "4.16",
                        data: {},
                        children: []
                    }, {
                        id: "node417",
                        name: "4.17",
                        data: {},
                        children: []
                    }, {
                        id: "node418",
                        name: "4.18",
                        data: {},
                        children: []
                    }]
                }, {
                    id: "node319",
                    name: "3.19",
                    data: {},
                    children: [{
                        id: "node420",
                        name: "4.20",
                        data: {},
                        children: []
                    }, {
                        id: "node421",
                        name: "4.21",
                        data: {},
                        children: []
                    }]
                }]
            }, {
                id: "node222",
                name: "2.22",
                data: {},
                children: [{
                    id: "node323",
                    name: "3.23",
                    data: {},
                    children: [{
                        id: "node424",
                        name: "4.24",
                        data: {},
                        children: []
                    }]
                }]
            }]
        }]
    };
                init();
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
    
    //init Spacetree
    //Create a new ST instance
    var st = new $jit.ST({
        //id of viz container element
        injectInto: 'infovis',
        //set duration for the animation
        duration: 200,
        //set animation transition type
        transition: $jit.Trans.Quart.easeInOut,
        //set distance between node and its children
        levelDistance: 50,
        //enable panning
        Navigation: {
          enable:true,
          panning:true
        },
        levelsToShow : 1,
        //set node and edge styles
        //set overridable=true for styling individual
        //nodes or edges
        Node: {
            height: 20,
            width: 60,
            type: 'rectangle',
            color: '#23A4FF',
            overridable: true
        },
        
        Edge: {
            type: 'bezier',
            overridable: true
        },
        
        onBeforeCompute: function(node){
            Log.write("loading " + node.name);
        },
        
        onAfterCompute: function(){
            Log.write("done");
        },
        
        //This method is called on DOM label creation.
        //Use this method to add event handlers and styles to
        //your node.
        onCreateLabel: function(label, node){
            label.id = node.id;            
            label.innerHTML = node.name;
            label.onclick = function(){
                // if(normal.checked) {
                  st.onClick(node.id);
                // } else {
                // st.setRoot(node.id, 'animate');
                // }
            };
            //set label styles
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
        onBeforePlotLine: function(adj){
            if (adj.nodeFrom.selected && adj.nodeTo.selected) {
                adj.data.$color = "#eed";
                adj.data.$lineWidth = 3;
            }
            else {
                delete adj.data.$color;
                delete adj.data.$lineWidth;
            }
        }

    });




    //load json data
    st.loadJSON(json);
    //compute node positions and layout
    st.compute();
    //optional: make a translation of the tree
    st.geom.translate(new $jit.Complex(-200, 0), "current");
    //emulate a click on the root node.
    st.onClick(st.root);
    //end
    //Add event handlers to switch spacetree orientation.
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

        </script>         
        
    <!-- END SCRIPTS -->       