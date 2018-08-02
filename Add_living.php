<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Dodaj zadanie</title>
        
    </head>
    <body>
        <?php
        require_once("DateBase.php");
        require_once("index.php");
        if ((isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['How_often'])))
            {
                if ((!empty($_POST['Name']) && !empty($_POST['Description'] && !empty($_POST['How_often']))))
                {
                        $name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
                        $desc = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
                        $howOften = filter_var($_POST['How_often'], FILTER_SANITIZE_STRING);
                        $type = filter_var($_POST['Type'], FILTER_SANITIZE_STRING);
                        if ($type == "Rośliny"){
                            $typeDataBase = 0;
                        }
                        else {
                            $typeDataBase = 1;
                        }
                        $startAt = date("Y-m-d");
                        
                        $insert_user = "INSERT INTO `plants_pets`(`id_user`, `name`, `description`, `how_often`, `start_date`, `type`) VALUES (".$_SESSION['idUser'].",'".$name."','".$desc."',".$howOften.",'".$startAt."',".$typeDataBase.")";
                        $add_to_database = new DateBase($insert_user); 
                           
                         
                }        
            }
        ?>

        
        <form action="Add_living.php" method="post" >
            <div>
                <div>
                    Nazwa: <input type="text" name="Name" maxlength="20" size="5" />
                </div>
                <div>
                    Opis: <input type="text" name="Description" maxlength="255" size="5" />
                </div>
                <div>
                    Co ile dni: <input type="text" name="How_often" maxlength="15" size="5" />
                </div>
                <div>
                    Typ: <select name="Type">
                        <option>Rośliny</option>
                        <option>Zwierzęta</option>
                    </select>
                </div>
                <div>
                   <input type="submit" value="Zapisz akcję" />
                </div>
                </div>
                <div>
                    <a href='index.php'> <input type="button" value="Powrót do strony głównej" /></a>
                </div>
            </div>
        </form>    
        
    </body>
</html>