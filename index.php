<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); //$_SESSION['nazwa'] = wartosc;
    
    if (!isset($_SESSION['initiate']))
    {
        session_regenerate_id();
        $new_session_id = session_id();
        session_write_close();
        session_id($new_session_id);
        session_start();        
        $_SESSION['initiate'] = 1;
    }

mysql_connect("localhost", "living_hause", "qr6ZC6brhwdnSv2q");
mysql_select_db("living_hause");
mysql_set_charset("utf8");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       
        <?php
            if (isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj")
            {
                $_SESSION['zalogowany'] = 0;
                session_destroy();
                echo "Zostałeś pomyślnie wylogowany<br />";
            }         
            if ($_SESSION['zalogowany'] == 1 && ($_SESSION['info_o_komp'] != $_SERVER['HTTP_USER_AGENT']))
            {
                $_SESSION['zalogowany'] = 0;
                session_destroy();
                echo "Prosimy o ponowne zalogowanie się.";                                
            }
            if ((isset($_POST['login']) && isset($_POST['haslo'])) || $_SESSION['zalogowany'] == 1)
            {
                if ((!empty($_POST['login']) && !empty($_POST['haslo'])) || $_SESSION['zalogowany'] == 1)
                {
                    if ($_SESSION['zalogowany'] == 0)
                    {
                        $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
                        $haslo = filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);
                        
                    }
                    $salt = "1234";                
                    $pw = hash("sha512", $salt.$haslo);
                    //echo "$pw";
                                        
                    $query = "SELECT id FROM user WHERE name = '".$login."' AND password = '".$pw."';";
                    $result = mysql_query($query);
                    $idUser = mysql_fetch_assoc($result);
                    $rows = mysql_num_rows($result);
                    
                                      
                    if (($rows>0) || $_SESSION['zalogowany'] == 1)
                    {
                        if ($_SESSION['zalogowany'] == 0)
                            $_SESSION['login'] = $login;
                        foreach($idUser as $key => $value)
                        {
                            $_SESSION['idUser'] = $value;
                        }
                        
                        include ("content.php");
                        include ("living.php");
                        $_SESSION['zalogowany'] = 1;
                        $_SESSION['time'] = time();
                        $_SESSION['info_o_komp'] = $_SERVER['HTTP_USER_AGENT'];
                    }
                    else
                        echo "Podałeś niepoprawny login lub hasło. Spróbuj ponownie <a href='index.php'>tutaj</a>";
                    
                }   
                else
                    echo "Nie podałeś loginu lub hasła. Spróbuj ponownie <a href='index.php'>tutaj</a>";
                 
            }
            
           if ($_SESSION['zalogowany'] == 0)
           {
        ?>
        <form action="index.php" method="post" >
            <div>
                <div>
                    Login: <input type="text" name="login" maxlength="8" size="5" />
                </div>
                <div>
                    Password: <input type="password" name="haslo" maxlength="15" size="5" />
                </div> 
                <div>
                    <input type="submit" value="Zaloguj się" />
                </div>
                <div>
                    <a href='SignUp.php'> <input type="button" value="Zarejestruj się" /></a>
                </div>
            </div>
        </form>    
        <?php
           }
           
        ?>
    </body>
</html>
