<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "epiz_32171591_v_guard";
    $username = "epiz_32171591";
    $password = "HdixsMJNWOwdZjQ";
    $database = "v_guard";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM unload WHERE id=$id";
    $connection->query($sql);
}

header("location: unload.php");
exit;

?>