<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/**
 * 
 * @类功能说明：工具方法的封装
 * @类修改者：
 * @修改日期：
 * @修改说明：
 * @公司名称：深圳市穗鑫网络购物有限公司
 * @作者：panda
 * @创建时间：2015-07-23 
 * @版本：V1.0
 */
class some_tool extends CI_Model
{
	public function __construct()
	{
		parent::__construct ();
		
		$this->load->library ( 'session' );
		$this->load->model ( 'tool/json_helper' );
		$this->load->library ( 'input' );
        $this->load->helper ( 'file' );

	}


    /**
     *20150529
     *作者：panda
     *同过键名key_name从数组array中匹配键值key_value返回该数组的值 
     */
    public function find_key_by_array($array,$key_name,$key_value)
    {
        foreach($array as $item)
        {
            if($item->$key_name == $key_value)
            {
                return $item;
            }
        }
    }

    /**
     * panda 2015-6-13
     * A、B两个对象数组中的对象key相同,则将B合并到A数组中,并返回A数组
     */
    public function merge_array_by_key( $array_a, $array_b, $a_key_name, $b_key_name ){
        //首先把两个对象数组转换成纯二维数组
        for( $i = 0; $i <count($array_a); $i ++){
            $array_a[$i] = (array)$array_a[$i];
        }

        for( $i = 0; $i <count($array_b); $i ++){
            $array_b[$i] = (array)$array_b[$i];
        }

        foreach ($array_a as $a_v) {
            for( $i = 0; $i < count($array_b); $i ++ ){
                if( $a_v[$a_key_name] == $array_b[$i][$b_key_name] ){
                    //将$array_b[$i]与$a_v合并
                    $arr[] = array_merge($a_v,$array_b[$i]);
                }
            }
        }

        //最后将二维数组重新组合成对象数组返回
        for( $i = 0; $i <count($arr); $i ++){
            $arr[$i] = (object)$arr[$i];
        }

        return $arr;
    }

    /**
     * panda 2015-6-13
     * 对数组二维array的key的键值的重复项进行删除
     */
    public function assoc_unique( $array, $key ){
        $tem_array = array();

        foreach ( $array as $k => $v ) {

            //搜索$v[$key]是否在$tem_array数组中存在,若存在返回true
            if( in_array($v[$key], $tem_array) ){
                unset( $array[$k] );
            }else{
                $tem_array[] = $v[$key];
            }
        }

        //对数组重新进行排序
        sort($array);

        return $array;
    }

    /**
    * 20150528 1650
    * author:panda
    * update
    * 修改日期　20150609
    * 修改人　panda 
    * 修改内容　修改判断上传文件有效数逻辑
     */
    public function up_more_pic($destination_folder,$file_sum=1)
    {
        //保存图片的地址
        $pic_address=array();
        //上传文件类型列表
        $uptypes=array(
            'image/jpg',
            'image/jpeg',
            'image/png'
            );
        //上传文件大小限制, 单位BYTE
        $max_file_size=2000000;     
        //上传文件路径
        // $destination_folder="./resources/product/images/"; 

        //判断上传文件有效数
        $file_count=array();
        for($i=0;$i<$file_sum;$i++)
        {
            $file_count[$i]=true;
            if (!isset($_FILES["upfile$i"])||!is_uploaded_file($_FILES["upfile$i"]["tmp_name"]))
            {
                $file_count[$i]=false;
            }
        }
        for($i=0;$i<count($file_count);$i++)
        {
            if($file_count[$i])
            {

            //请求上传图片操作
                if ($_SERVER['REQUEST_METHOD'] == 'POST' )
                {
            //是否存在文件
                    if (!is_uploaded_file($_FILES["upfile$i"]["tmp_name"]))
                    {
                        echo "图片不存在!";
                        exit;
                    }

                    $file = $_FILES["upfile$i"];
            //检查文件大小
                    if($max_file_size < $file["size"])
                    {
                        echo "文件太大!";
                        exit;
                    }

            //检查文件类型
                    if(!in_array($file["type"], $uptypes))
                    {
                        echo "文件类型不符!".$file["type"];
                        exit;
                    }

                    if(!file_exists($destination_folder))
                    {
                        mkdir($destination_folder);
                    }

            //获取信息
                    $filename=$file["tmp_name"];
                    $image_size = getimagesize($filename);
                    $pinfo=pathinfo($file["name"]);
                    $ftype=$pinfo['extension'];
                    $destination = $destination_folder.$file["name"];
                    // $destination = $destination_folder.$file["name"].".".$ftype;

            //删除存在的图片
                    if(file_exists($destination_folder.$file["name"]))
                    {
                        $bool = unlink($destination_folder.$file["name"]);
                        echo $bool.'  删除文件';
                    }

            //上传图片操作
                    if(!move_uploaded_file ($filename, $destination))
                    {
                        echo "移动文件出错";
                        exit;
                    }

            //获取信息
                    // echo $pinfo=pathinfo($destination);
                    // echo '<br>';
                    // echo $fname=$pinfo['basename'];
                    $pic_address[]=$pinfo['basename'];
                }
            }
            else
            {
                 $pic_address[]=null;
            }
        }
        return $pic_address;
    }
}
