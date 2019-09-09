<?php
include "../config/config.php";

function upload_file($destination_directory, $file_name)
{
    $tmp_name = $_FILES[$file_name]['tmp_name'];
    //If we have send the file
    if (is_dir($destination_directory) && is_uploaded_file($tmp_name)) {
        $img_file = $_FILES[$file_name]['name'];
        $img_type = $_FILES[$file_name]['type'];
        // If it's an image
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
            strpos($img_type, "jpg")) || strpos($img_type, "png"))) {
            //Permissions
            if (move_uploaded_file($tmp_name, $destination_directory . '/' . $img_file)) {
                return true;
            }
            
        }
    }
    return false;
}

if (!empty($_POST)) {
    if (upload_file('../img', 'photo')) {
        echo 'Uploaded file';
    }else{
        echo "Fallo al subir la foto al servidor";
    }

}else{
    echo "No has seleccionado ninguna foto";
}

if (!isset($_FILES["photo"]) || $_FILES["photo"]["error"] > 0) {
    echo "Error.";
} else {
    // Check photo type and maximum weight (16MB)
    $allowed = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;

    if (in_array($_FILES['photo']['type'], $allowed) && $_FILES['photo']['size'] <= $limite_kb * 1024) {

        $img_name=$_FILES['photo']['name'];
        $img_type=$_FILES['photo']['type'];
        $uid = $_POST['uid'];

        // Insert photo name in database
        $db = getDB();
        $sql = "INSERT INTO images (img_user, img_name, img_type) VALUES (:img_user, :img_name, :img_type)";
        $stmt= $db->prepare($sql);
        $stmt->execute([
            'img_user' => $uid,
            'img_name' => $img_name,
            'img_type' => $img_type,
        ]);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");

    }


}
?>  