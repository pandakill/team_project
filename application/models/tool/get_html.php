<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class get_html extends CI_Model
{
	public function __construct()
	{
		parent::__construct ();
	}
	/**
	 * 从java服务器到php的方法
	 *
	 * @param 地址 $url        	
	 * @param KeyValue值,形式keyvalue="key=".value; $key        	
	 */
	public function doFileGetContentsget_html($url, $key = null)
	{
		if (null != $key)
		{
			$url .= '?' . $key;
		}
		$html = file_get_contents ( $url, false );
		$getsrc = iconv ( "GBK", "UTF-8", $html );
		return $getsrc;
	}
	
	/**
	 * 从php提交到java服务器的方法
	 *
	 * @param 地址 $url        	
	 * @param
	 *        	KeyValue值,形式$data = array (
	 *        	"cid" => $cid,
	 *        	"psw" => $psw
	 *        	); $data
	 */
	public function doFileGetContentsget_html2($url, $data = null)
	{
		if (is_array ( $data ))
		{
			ksort ( $data );
			$content = http_build_query ( $data );
			$content_length = strlen ( $content );
			$options = array (
					'http' => array (
							'method' => 'POST',
							'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-length: $content_length\r\n",
							'content' => $content 
					) 
			);
			return file_get_contents ( $url, false, stream_context_create ( $options ) );
		}
	}
	
	/**
	 * 从php提交到java服务器的方法
	 *
	 * @param 地址 $url        	
	 * @param KeyValue值 $data        	
	 * @param string $cookie        	
	 * @param string $referrer        	
	 */
	public function doFSockOpenget_html($URL, $data = '', $cookie = FALSE, $referrer = "")
	{
		
		// parsing the given URL
		$URL_Info = parse_url ( $URL );
		// Building referrer
		// if not given use this script as referrer
		if ($referrer == "")
			$referrer = "111";
		$data_string = $data;
		// Find out which port is needed - if not given use standard (=80)
		if (! isset ( $URL_Info ["port"] ))
			$URL_Info ["port"] = 80;
			// building POST-request:
		$request = "POST " . $URL_Info ["path"] . " HTTP/1.1\n";
		$request .= "Host: " . $URL_Info ["host"] . "\n";
		$request .= "Referer: $referrer\n";
		$request .= "Content-type: application/x-www-form-urlencoded\n";
		$request .= "Content-length: " . strlen ( $data_string ) . "\n";
		$request .= "Connection: close\n";
		$request .= "Cookie: $cookie\n";
		$request .= "\n";
		$request .= $data_string . "\n";
		$fp = fsockopen ( $URL_Info ["host"], $URL_Info ["port"] );
		fputs ( $fp, $request );
		$result = '';
		while ( ! feof ( $fp ) )
		{
			$result .= fgets ( $fp, 1024 );
		}
		fclose ( $fp );
		$flag = "Connection: close";
		$t = strpos ( $result, $flag );
		$t += strlen ( $flag );
		$result = substr ( $result, $t );
		return $result;
	}
}

?>