
<?php 
include ("connection.php" );
$product="SELECT *  FROM product " ;
$result = mysqli_query($conn ,  $product); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 