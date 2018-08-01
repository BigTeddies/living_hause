<?php
    $query = "
                SELECT name, description, how_often, start_date, type FROM plants_pets WHERE id_user = '".$_SESSION['idUser']."' ORDER BY name
            ";
    $result = mysql_query($query) or die(mysql_error());
    for ($i = 0; $i < mysql_num_rows($result); $i++)
                {
                     $row = mysql_fetch_assoc($result);
                     echo "<table border='1' cellspacing='0' style='float: left; margin: 10px;'>";
                     foreach($row as $key => $value)
                     {
                         switch ($key)
                         {
                         case "type":
                         {
                             if ($value == 0){
                                 echo "<tr><td>Typ: Rośliny</td></tr>";
                             }
                               else {
                                echo "<tr><td>Typ: Zwierzęta</td></tr>";
                               }
                               break;
                         }
                             case "name":
                                echo "<tr><td>Nazwa: $value</td></tr>";
                                break;
                                case "description": 
                                    echo "<tr><td>Opis: $value</td></tr>";
                                    break;
                                case "how_often" :
                                    $howOften = $value;
                                   echo "<tr><td>Jak często: $value dni</td></tr>";
                                   break;
                                   case "start_date":
                                       echo "<tr><td>Ostatnia czynność: $value</td></tr>";
                                       break;
                                       
                         }
                         
                     }
                     echo "</table>";                     
                }
?>

