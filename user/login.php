<?php header('Content-Type:application/json');

include "../config.php";

if ($_GET){

    $username = $_GET['username'];
    $password = $_GET['password'];

    $sql = mysqli_query($db, "Select * from user where username = '$username' and password = '$password'");
    $user = mysqli_fetch_assoc($sql);

    $uid = "".$user['uid'];
    $username = "".$user['username'];
    $fullname = "".$user['fullname'];

    if ($sql) {
        if ($uid == null){
            $response["error_state"] = true;
            $response["message"] = "Username/password salah";
            echo json_encode($response);
        } else {
            $response["error_state"] = false;
            $response["message"] = "Berhasil Login";
            $response["id"] = $uid;
            $response["username"] = $username;
            $response["fullname"] = $fullname;
            echo json_encode($response);
        } 
    } else{
        $response["error_state"] = true;
        $response["message"] = "Gagal Mengirim";
        echo json_encode($response);
    }

} else {
    $response["error_state"] = true;
    $response["message"] = "404";

    echo json_encode($response);
}
?>
