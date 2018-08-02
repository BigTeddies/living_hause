<?php
    $query = "
                SELECT id, name, description, how_often, start_date, type FROM plants_pets WHERE id_user = '".$_SESSION['idUser']."' ORDER BY name
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
                                       case "id":
                                           $idAction = $value;
                                           break;
                         case "type":
                         {
                             if ($value == 0){
                                 echo "<tr><td>Typ: Rośliny</td></tr>";
                             }
                               else {
                                echo "<tr><td>Typ: Zwierzęta</td></tr>";
                               }
                               echo "<tr><td><a href='index.php?akcja=usun_".$idAction."'>Usuń</a><br /></td></tr>";
                               echo "<tr><td><a href='index.php?akcja=edytuj_".$idAction."'>Edytuj</a><br /></td></tr>";
                               echo "<tr><td><a href='index.php?akcja=wykonano_".$idAction."'>Wykonano</a><br /></td></tr>";
                               break;
                         }
                                   
                                       
                         }
                         
                     }
                     echo "</table>";                     
                }
?>

