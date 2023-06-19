<?php
include ("connection.php" );
$name= $_POST['Name' ];
$email= $_POST['des' ];
$phone= $_POST['price' ];
$id= $_POST['ID' ];
$sql= "UPDATE `product`  SET  `name` = '". $name."'  , `des` =  '". $email."' , 
 `price`  ='".$phone ."' WHERE `id` = $id " ;

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Product updated succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record updated failed!'
    ];
    print_r(json_encode($response));
} 
?>