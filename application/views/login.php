<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>SXOA - 穗鑫管理系统 - 登陆</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo resources_url();?>/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo resources_url();?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/login.css?v=1"/>                                 
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title">登录</div>
                    <form action="http://<?php echo my_base_url();?>/employee_login/login" class="form-horizontal" method="post" id="login_form">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="请输入您的工号" name="id" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="请输入您的密码" name="psw" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>登录</button>
                            </div>  
                        </div>
                        <div class="login-subtitle">
                            <a href="http://<?php echo my_base_url();?>/employee_login/forget_password">忘记密码？</a>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 SXOA
                    </div>
                </div>
            </div>
            
        </div>
        
        <script type="text/javascript" src="<?php echo resources_url();?>/js/plugins/jquery/jquery.min.js"></script>
        <script type='text/javascript' src='<?php echo resources_url();?>/js/plugins/jquery-validation/jquery.validate.js'></script> 
        <script type="text/javascript">
            $("#login_form").validate({
                rules: {                                            
                    id: {
                        required: true,
                        number: true
                    },
                    psw: {
                        required: true
                    }
                },
                messages: {
                    id: {
                        required: '请您填写工号',
                        number: '工号必须为数字'
                    },
                    psw: {
                        required: '请您填写密码'
                    }
                },
                submitHandler:function(form){
                    $(form).submit();
                }
            });   
        </script>
    </body>
</html>






