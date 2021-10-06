<?php header('Content-Type:application/json');

include "../config.php";

if ($_GET){

    $uid = $_GET['uid'];
    
    $sql = mysqli_query($db, "SELECT * FROM notes WHERE uid = '$uid'");

    while($data = mysqli_fetch_assoc($sql)){
        $arrayJson[] = $data;
    }
    if ($arrayJson != null){
        $response = $arrayJson;
    } else {
        $response = "Can't get data";
    }

    echo json_encode($response);

} else {
    $response["error_state"] = true;
    $response["message"] = "Can't get notes";

    echo json_encode($response);
}
?>
