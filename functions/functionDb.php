<?php
function dbCon(){
    $dbHost="developeros.com.mx";
    $dbUser="develop7_ulsa_a";
    $dbPass="r00tUls@";
    $db = "develop7_ulsa";
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);

    if(mysqli_connect_errno()){
        $conn = "Error: " . mysqli_connect_error();
    } else {
        mysqli_query($conn, "SET NAMES 'utf8'");
    }
    return $conn;
}

function createUser($con,$user,$pass){
    $query = "CALL createUser-byChris('$user','$pass)";
    $dataSet = mysqli_fetch($con,$query);
    $row = mysqli_fetch_assoc($dataSet);
    return true;
}

function loginDB($con, $user, $pass, $key=null){
    #$query = "SELECT idUser, strLogin FROM ssLogin WHERE 
    #strPassword=SHA('$pass') and strLogin = '$user';";
    $query = "CALL login-byChris('$user', '$pass');";
    
    $dataSet = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($dataSet);
    $flag = false;
    if($row != null){
        $_SESSION['user'] = $row['strLogin'];
        $_SESSION['password']=$pass;
        $flag = true;
    } else {
        $_SESSION['user'] ="";
        $_SESSION['password']="";
    }
    return $flag;
}

?>