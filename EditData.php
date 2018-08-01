<?php
mysql_connect("localhost", "living_hause", "qr6ZC6brhwdnSv2q");
mysql_select_db("living_hause");
mysql_set_charset("utf8");
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Edytuj dane</title>
        
    </head>
    <body>
        <?php
        require_once("DateBase.php");
        require_once("index.php");
        ?>
        
        <form action="EditData.php" method="post" >
            <div>
                <div>
                    Wpisz nowy login: <input type="text" name="Login" maxlength="10" size="5" />
                </div>
                <div>
                   <input type="submit" value="Sign In" />
                </div>
            </div>
            <div>
                <div>
                    Wpisz nowy email: <input type="text" name="Email" maxlength="50" size="5" />
                </div>
                <div>
                   <input type="submit" value="Sign In" />
                </div>
            </div>
            <div>
                <div>
                    Wpisz stare hasło: <input type="password" name="Old_Password" maxlength="15" size="5" />
                </div>
                <div>
                    Nowe hasło: <input type="password" name="New_Password" maxlength="15" size="5" />
                </div>
                <div>
                    Powtórz nowe hasło: <input type="password" name="Repeat_New_Password" maxlength="15" size="5" />
                </div>
                <div>
                   <input type="submit" value="Sign In" />
                </div>
            </div>
                <div>
                    <a href='index.php'> <input type="button" value="Powrót do strony głównej" /></a>
                </div>
            </div>
        </form>    
        <?php
            
            if (isset($_POST['Login']))
                {
                
                 if (!empty($_POST['Login']))
                    {
                        $login = filter_var($_POST['Login'], FILTER_SANITIZE_STRING);
                        
                        $updateLogin = "Update user set name = '".$login."' where id = '".$_SESSION['idUser']."'";
                        $add_to_database = new DateBase($updateLogin);  
                    }        
                }
                
               if (isset($_POST['Email']))
                {
                
                 if (!empty($_POST['Email']))
                    {
                        $email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
                                                
                        $updateEmail = "Update user set name = '".$email."' where id = '".$_SESSION['idUser']."'";
                        $add_to_database = new DateBase($updateEmail);  
                    }        
                }
                
                if ((isset($_POST['Old_Password']) && isset($_POST['New_Password']) && isset($_POST['Repeat_New_Password'])))
            {
                if ((!empty($_POST['Old_Password'] && !empty($_POST['New_Password']) && !empty($_POST['Repeat_New_Password']))))
                {
                        $oldPassword = filter_var($_POST['Old_Password'], FILTER_SANITIZE_STRING);
                        $newPassword = filter_var($_POST['New_Password'], FILTER_SANITIZE_STRING);
                        $repeatNewPassword = filter_var($_POST['Repeat_New_Password'], FILTER_SANITIZE_STRING);
                        $salt = "1234";                
                        
                        $salt = "1234";                
                        $pw = hash("sha512", $salt.$oldPassword);
                                        
                        $query = "SELECT * FROM user WHERE password = '".$pw."';";
                        $result = mysql_query($query);
                        $rows = mysql_num_rows($result);
                    
                                      
                        if ($rows>0)
                        {
                            if ($newPassword!=$repeatNewPassword){
                                echo "Różne hasła";
                            }
                            else {
                                $pw2 = hash("sha512", $salt.$newPassword);
                                $updatePassword = "Update user set password = '".$pw2."' where id = '".$_SESSION['idUser']."'";
                                $add_to_database = new DateBase($updatePassword); 
                                }
                            }
                        else {
                            echo "Podałeś nie prwaidłowe stare hasło";
                        }
                         
                }        
            }
    
        ?>
    </body>
</html>
