<?php

/*
 * 应用环境<br>不同应用环境有不同的错误打印等级
 */
define ( 'ENVIRONMENT', 'development' );

if (defined ( 'ENVIRONMENT' )) {
	switch (ENVIRONMENT) {
		case 'development' :
			error_reporting ( E_ALL );
			break;
		
		case 'testing' :
		case 'production' :
			error_reporting ( 0 );
			break;
		
		default :
			exit ( '应用环境设置不正确.' );
	}
}

/*
 * 系统目录
 */
$system_path = 'system';

/*
 * 应用目录
 */
$application_folder = 'application';

/*
 * 解决提高可靠性的系统路径
 */
if (defined ( 'STDIN' )) {
	chdir ( dirname ( __FILE__ ) );
}

if (realpath ( $system_path ) !== FALSE) {
	$system_path = realpath ( $system_path ) . '/';
}

// ensure there's a trailing slash
$system_path = rtrim ( $system_path, '/' ) . '/';

// Is the system path correct?
if (! is_dir ( $system_path )) {
	exit ( "你的系统文件夹路径不正确设置。请打开下列文件和正确的: " . pathinfo ( __FILE__, PATHINFO_BASENAME ) );
}

// 现在我们知道路径，设置主路径常数
// The name of THIS file
define ( 'SELF', pathinfo ( __FILE__, PATHINFO_BASENAME ) );

// The PHP file extension
// this global constant is deprecated.
define ( 'EXT', '.php' );

// Path to the system folder
define ( 'BASEPATH', str_replace ( "\\", "/", $system_path ) );

// Path to the front controller (this file)
define ( 'FCPATH', str_replace ( SELF, '', __FILE__ ) );

// Name of the "system folder"
define ( 'SYSDIR', trim ( strrchr ( trim ( BASEPATH, '/' ), '/' ), '/' ) );

// The path to the "application" folder
if (is_dir ( $application_folder )) {
	define ( 'APPPATH', $application_folder . '/' );
} else {
	if (! is_dir ( BASEPATH . $application_folder . '/' )) {
		exit ( "您的应用程序文件夹路径不正确设置。请打开下列文件和正确的: " . SELF );
	}
	
	define ( 'APPPATH', BASEPATH . $application_folder . '/' );
}

//加载引导文件
require_once BASEPATH . 'core/CodeIgniter.php';

