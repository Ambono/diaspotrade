<?php 
 include('../config/config.php');
if(isset($_SESSION['login_user'])){

$user_check = $_SESSION['login_user']; 

$sql_2 = "delete from basket  WHERE UserName = '$user_check' and Date >=CURDATE()";
if (mysqli_query($conn, $sql_2)) {
    echo "Your order has been removed";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}else{
echo'Action not valid!.You need to register before using the basket feature. Please click Sign up to subscribe or contact seller directly.';
}
 ?> 