<?php header('Content-Type:application/json');

include "../config.php";

if ($_POST) {

    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];
    $date_modified = $_POST['date_modified'];
    $date_created = $_POST['date_created'];
    $uid = $_POST['uid'];

    $sql = "INSERT INTO `notes` VALUES (NULL, '$note_title', '$note_content', '$date_modified', '$date_created', '$uid')";
    $query = mysqli_query($db, $sql);

    if ($query){
        $response["error_state_state"] = false;
        $response["message"] = "Success";
        echo json_encode($response);
    } else {
        $response["error_state_state"] = false;
        $response["message"] = "Failed";
        echo json_encode($response);
    }

}

else {
    $response["error_state"] = true;
    $response["message"] = "Can't add notes";

    echo json_encode($response);
}
?>