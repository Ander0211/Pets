<?php
if(isset($_GET['id'])) {

    $id_user = $_GET['id'];

   
    require('../config/database.php');


    $query_eliminar = "DELETE FROM users WHERE id = $id_user";

 
    $result_borrar = pg_query($conn, $query_eliminar);


    if($result_borrar) {
        header("refresh:0;url=list_users.php");
    } else {
        echo "Error al eliminar .";
    }
} 
?>
