<?php require('../config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title> Pets|list_users</title>
</head>
<body>
    <center><h1>LIST_USERS</h1></center>
    <table class="table table-hover">
     <tr>
          <th>Fullname</th>
          <th>Email</th>
          <th>Status</th>
          <th>Foto</th>
          <th>...</th>
        </tr>
        <?php
        $query_users =" 
        SELECT 
        id,
        fullname,
        email,
        case when status=true then 'Active' else 'Inactive' END as status
        from 
          users
        
        "; 

        $result = pg_query($conn, $query_users); 
        while($row = pg_fetch_assoc ($result)){
          echo "<tr>";
             echo"<td>".htmlspecialchars($row['fullname'])."</td>";
             echo"<td>".htmlspecialchars($row['email']) ."</td>";
             echo"<td>".htmlspecialchars($row['status']) ."</td>";
             echo" <td><img src='photo/avataru.png' width='35'></td>";
            echo " <td>
               <a href= '#'><img src='icons/perfil.png' width='25'></a>
              <a href='delete_user.php?id=". htmlspecialchars($row['id']) ."' onclick='return confirm(\"Are you sure you want to delete this user?\");'><img src='icons/usuario.png' width='25'></a>
               </td>";
              echo"</tr>";
    }

   
     ?>
</table>   
</body>
</html>