<?php
/*
* Full calendar ajax load events example
* Like Pro admin template
* by Aqvatarius
*/

    $month  = date('m');
    $year   = date('Y');
    
    
    $data = array();
    $data[] = array('title'=>'三国演义之三英战吕布','start'=>$year.'-'.$month.'-01','className'=>'red');
    $data[] = array('title'=>'西游记之大闹天空','start'=>$year.'-'.$month.'-03','className'=>'purple');
    $data[] = array('title'=>'司马懿 - 空城计失策','start'=>$year.'-'.$month.'-03','className'=>'blue');
    $data[] = array('title'=>'生当作人杰，死亦为鬼雄','start'=>$year.'-'.$month.'-03','className'=>'green');
    $data[] = array('title'=>'红楼梦之黛玉葬花','start'=>$year.'-'.$month.'-08','className'=>'orange');
    $data[] = array('title'=>'水浒传之武松打虎','start'=>$year.'-'.$month.'-05','end'=>$year.'-'.$month.'-07','className'=>'black');    
    $data[] = array('title'=>'万胜丈八蛇矛，泣鬼神方天画戟','start'=>$year.'-'.$month.'-16','className'=>'gray');
    $data[] = array('title'=>'路有冻死骨','start'=>date("Y-m-d"));
    $data[] = array('title'=>'定海神针','start'=>$year.'-'.$month.'-21','end'=>$year.'-'.$month.'-28','className'=>'blue');
    $data[] = array('title'=>'喝一杯Java提神','start'=>$year.'-'.$month.'-21','end'=>$year.'-'.$month.'-25','className'=>'red');
    
    echo json_encode($data);
?>