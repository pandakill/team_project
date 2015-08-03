<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No fileect script access allowed' );
/**
 * 20150624 1540
 * 作者：Ro
 */
class log_helper extends CI_Model
{
	public function __construct()
	{
		parent::__construct ();
		
        $this->load->helper ( 'my_config' );
		$this->load->library ( 'session' );
		$this->load->model ( 'tool/json_helper' );
		$this->load->library ( 'input' );
        $this->load->helper ( 'file' );

	}     


    public function init($dir,$file)
    {

        if (! file_exists ( $dir ))
        {
            mkdir ( $dir );
        }

        //$file = 'resources/log/XXX.xml';
        if(! file_exists ( $file ))
        {
            $context = 
'<?xml version="1.0" encoding="UTF-8"?>
<logs>
</logs>';
            write_file ( $file, $context, 'w' );
        }
    }

    public function writeLog($who,$done)
    {
        $date = ((string) date("Y-m-d H:i:s",time()));
        $ip = $_SERVER['REMOTE_ADDR'];

        $dir = 'resources/log/';
        $file = $dir.'log'.( string ) date ( "Ymd", time () ).'.xml';
        $this->init($dir,$file);

        // 这里是DOMDocument读取xml
        $dom = new DOMDocument ( '1.0' );
        $dom->load ( $file );

        // 最外层元素
        $logs = $dom->getElementsByTagName ( 'logs' );
        // 第一层的元素数组，即logs[0]
        $logs = $logs->item ( 0 );

        // 新建一个元素，名为log
        $log = $dom->createElement ( 'log' );
        // logs[0]写入log
        $logs->appendChild ( $log );

        // 新建一个元素，名为_who
        $_who = $dom->createElement ( 'who' );
        // 往log[0]写入_who
        $log->appendChild ( $_who );
        // 新建一个文本节点
        $_text = $dom->createTextNode ( $who );
        // 往_who写入文本节点
        $_who->appendChild ( $_text );
        
        $_done = $dom->createElement ( 'done' );
        $log->appendChild ( $_done );
        $_text = $dom->createTextNode ( $done );
        $_done->appendChild ( $_text );
        
        $_date = $dom->createElement ( 'date' );
        $log->appendChild ( $_date );
        $_text = $dom->createTextNode ( $date );
        $_date->appendChild ( $_text );
        
        $_ip = $dom->createElement ( 'ip' );
        $log->appendChild ( $_ip );
        $_text = $dom->createTextNode ( $ip );
        $_ip->appendChild ( $_text );

        // 保存xml
        $dom->save ( $file );
    }

    public function xml2array($file)
    {
        if(! file_exists ( $file ))
        {
            return null;
        }
        $xml = simplexml_load_file ( $file );
        $obj = array ();
        foreach ( $xml->log as $log )
        {
            $obj [] = array(
                'who'=>$log->who,
                'done'=>$log->done,
                'date'=>$log->date,
                'ip'=>$log->ip
            );
        }
        return $obj;
    }

    /**
     * 通过目录获取文件列表
     * @param  [type] $dir_name [description]
     * @return [type]           [description]
     */
    public function getFileList($dir_name)
    {
        $arr_file = array();
        @$dir_handle = opendir($dir_name);
        if(! $dir_handle)
        {
            return null;
        }
        while( false !== ($filename = readdir($dir_handle)) )
        {
            if($filename !=  '.' && $filename != '..')
            {
                $arr_file[] = $filename;
            }
        }
        closedir($dir_handle);
        return $arr_file;
    }

}
