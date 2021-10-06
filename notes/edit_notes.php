<?php header('Content-Type:application/json');

require_once "../config.php";

if ($_POST) {

    $id = $_POST['id'];
    $note_title = $_POST['note_title'];
    $note_content = $_POST['note_content'];
    $date_modified = $_POST['date_modified'];

    $sql = "UPDATE `notes` SET `note_title` = '$note_title', `note_content` = '$note_content', `date_modified` = '$date_modified' WHERE `notes`.`id` = '$id';";
    $query = mysqli_query($db, $sql);

    if($query){
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