# team_project
---
##关于team_project<br/>
该项目是基于初创团队对于团队员工管理、项目管理、考勤管理的系统。<br/>
##项目架构<br/>
项目基于CodeInteger框架,内核不变,但从数据库获取数据的model被我修改成为从Java服务器读取json模型数据;<br/>
要想让该项目跑起来,除了需要下载该项目之外,还需下载team_project_server;<br/>
##目录介绍
-application:CI框架的应用程序包,项目MVC代码保存在此文件夹<br/>
--config:CI的配置文件,无须修改<br/>
--controller:MVC的Controller文件夹,url的入口<br/>
--errors:url错误时的views文件夹,例如404错误页面,可以自定义,但文件命名需按照CI规范，默认CI的错误页面</br>
--helpers:自定义的helper文件,在此项目中,我将资源文件、项目根url、服务器url等配置与此,在controller中可以直接使用,服务器url地址在此处修改</br>
--models:MVC的model文件夹,此项目我将model由数据库改为Java服务器地址,从Java服务器中访问URL获取json数据,而不是常规的读取数据库,这点需要注意！<br/>
--views:MVC的views文件夹,视图文件,将html文件进行layout切割,controller从model获得数据后,将数据打印至views中并将views输出<br/><br/>
-html:项目的静态html,前端设计好的页面切图文件保存在此文件夹<br/><br/>
-resources:资源文件夹,项目资源包括js、css、图片等资源<br/><br/>
-system:CI框架的系统包<br/><br/>

---
对于该项目有疑问或者感兴趣的,欢迎大家一起讨论<br/>
QQ：306641225<br/>
github：https://github.com/pandakill<br/>
