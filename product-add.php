<?php
 include ("connection.php" ); 
 $product="SELECT *  FROM product " ;
 $result = mysqli_query($conn ,  $product); 
 $data = [];
 while ($fetch=mysqli_fetch_assoc($result)){
     $data[] = $fetch;
 }

$Name =  $_POST['Name' ]; 
$des =  $_POST['des' ]; 
$price =  $_POST['price' ]; 
$sql=  "INSERT  INTO `product`(`name` , `des` ,  `price` )
 VALUE  (' {$Name} ' , ' {$des } '  , ' {$price } ')" ; 

if(mysqli_query($conn , $sql)){
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 