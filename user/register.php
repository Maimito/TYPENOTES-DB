<?php header('Content-Type:application/json');

include '../config.php';

if ($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    $sql = "INSERT INTO user (uid, username, password, fullname)VALUE (NULL, '$username', '$password', '$fullname')";

    $query = mysqli_query($db, $sql);
    if ($query){
        $response["error_state"] = false;
        $response["message"] = "Berhasil Registrasi";
        echo json_encode($response);
    } else{
        $response["error_state"] = false;
        $response["message"] = "Gagal Mengirim";
        echo json_encode($response);
    }

}
else{
    $response["error_state"] = true;
    $response["message"] = "404";

    echo json_encode($response);
}
?>