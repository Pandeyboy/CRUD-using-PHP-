<?php
include('database.php');

$obj=new query();
$condition_arr=array('name'=>'raj','email'=>'raj@gmail.com','mobile'=>'5659596');
//$result=$obj->getData('user');

//$result=$obj->insertData('user',$condition_arr);
//$result=$obj->deleteData('user',$condition_arr);
//$result=$obj->updateData('user',$condition_arr,'id',4);
$result=$obj->getData('user');
echo '<pre>';
print_r($result);



?>