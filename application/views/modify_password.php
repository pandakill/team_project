<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>SXOA - 穗鑫管理系统 - 初次登陆 - 强制修改密码</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo resources_url();?>/favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo resources_url();?>/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="<?php echo resources_url();?>/css/login.css"/>                                 
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title text-center redbold">初次登录请修改密码</div>
                    <form action="" class="form-horizontal" method="post" id="password_form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">工号</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control text-center" value="<?php echo $id;?>" disabled="disabled" >
                                <input type="hidden" class="form-control text-center" value="<?php echo $id;?>"  name="id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="请输入您的新密码" name="password1" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="请再次输入您的新密码" name="password2" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>修改密码</button>
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
            $("#password_form").validate({
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
                },
                submitHandler:function(form){
                    // alert("表单要提交了，然后跳转到首页咯。");
                    // window.location.href="index.html";

                    $(form).attr('action', 'http://<?php echo my_base_url();?>/employee_login/change_password/1');
                    $(form).submit();
                }                                    
            });   
        </script>
    </body>
</html>






