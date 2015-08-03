<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/**
 * json 生成,分析 支持中文
 */
class json_helper extends CI_Model
{
	public function __construct()
	{
		parent::__construct ();
	}
	/**
	 * 生成json
	 */
	public function encode($str)
	{
		$json = json_encode ( $str );
		// linux
		return preg_replace ( "#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $json );
		// windows
		// return preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2LE', 'UTF-8', pack('H4', '\\1'))", $json);
	}
	
	/**
	 * 分析json
	 */
	public function decode($str)
	{
		return json_decode ( $str );
	}

	/**
	 * 将json转换成数组形式
	 */
	public function decode_into_array($str){
		return json_decode($str, true);
	}
}
?>