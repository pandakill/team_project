<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>SXOA - 穗鑫管理系统 - 忘记密码</title>            
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
                    <div class="login-title">重置密码</div>
                    <form action="http://<?php echo my_base_url();?>/employee_login/change_password" class="form-horizontal" method="post" id="login_form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">工号</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control text-center" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">身份证号</label>
                            <div class="col-sm-9">
                                <input type="text" name="idk" class="form-control text-center" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="请输入您的密码" name="password1" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="请再次输入您的密码" name="password2" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="http://<?php echo my_base_url();?>/employee_login" class="btn btn-info btn-block"><i class="fa fa-reply"></i>返回登录</a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>重置密码</button>
                            </div>
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
            // 密码的验证 
            jQuery.validator.addMethod("password", function(value, element) { 
            var password = /(?!^[0-9]+$)(?!^[a-z]+$)(?!^[^A-z0-9]+$)^.{6,16}$/; 
            return this.optional(element) || (password.test(value)); 
            }, "密码必须为6-16个字母加数字或符号的组合密码"); 
            $("#login_form").validate({
                rules: {
                    password1: {
                        required: true,
                        password: true
                    },
                    password2: {
                        required: true,
                        equalTo: 'input[name="password1"]',
                        password: true
                    }
                },
                messages: {
                    password1: {
                        required: '请您填写密码'
                    },
                    password2: {
                        required: '请您填写密码',
                        equalTo: '两次输入密码不一致'
                    }
                }                                 
            });   
        </script>
    </body>
</html>






