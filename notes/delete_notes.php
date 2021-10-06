<?php header('Content-Type:application/json');

include '../config.php';

if ($_POST) {
    $id = $_POST['id'];
    $sql = mysqli_query($db, "DELETE FROM notes WHERE id = $id");
    $query = mysqli_query($db, $sql);
    if ($sql){
        $response["error_state_State"] = false;
        $response["message"] = "Berhasil";
        echo json_encode($response);
    } else{
        $response["error_state"] = false;
        $response["message"] = "Gagal Mengirim";
        echo json_encode($response);
    }
}
else{
    $response["error_state"] = true;
    $response["message"] = "Can't delete notes";

    echo json_encode($response);
}
?>