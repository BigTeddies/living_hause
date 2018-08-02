<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Edytuj zadanie</title>
        
    </head>
    <body>
        <?php
        require_once("DateBase.php");
        require_once("index.php");
        
        
        if (isset($_POST['Name']))
            {
                if (!empty($_POST['Name']))
                {
                        $name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
                                              
                        $insert_user = "UPDATE plants_pets SET name='".$name."' WHERE id = '".$_SESSION['idTask']."'";
                        $add_to_database = new DateBase($insert_user); 
                           
                         
                }        
            }
             if (isset($_POST['Description']))
            {
                if (!empty($_POST['Description']))
                {
                        $dsc = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
                                              
                        $insert_user = "UPDATE plants_pets SET description='".$dsc."' WHERE id = '".$_SESSION['idTask']."'";
                        $add_to_database = new DateBase($insert_user); 
                           
                         
                }        
            }
             if (isset($_POST['How_often']))
            {
                if (!empty($_POST['How_often']))
                {
                        $ho = filter_var($_POST['How_often'], FILTER_SANITIZE_STRING);
                                              
                        $insert_user = "UPDATE plants_pets SET how_often='".$ho."' WHERE id = '".$_SESSION['idTask']."'";
                        $add_to_database = new DateBase($insert_user); 
                           
                         
                }        
            }
        ?>

        
        <form action="EditLiving.php" method="post" >
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
                   <input type="submit" value="Zapisz zmianę" />
                </div>
                <div>
                    <a href='index.php'> <input type="button" value="Powrót do strony głównej" /></a>
                </div>
            </div>
        </form>    
        
    </body>
</html>
