<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Zarejestruj się</title>
        
    </head>
    <body>
        <?php
        require_once("DateBase.php");
        if ((isset($_POST['Login']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['Repeat_Password'])))
            {
                if ((!empty($_POST['Login']) && !empty($_POST['Email'] && !empty($_POST['Password']) && !empty($_POST['Repeat_Password']))))
                {
                        $login = filter_var($_POST['Login'], FILTER_SANITIZE_STRING);
                        $email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
                        $password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
                        $repeat_password = filter_var($_POST['Repeat_Password'], FILTER_SANITIZE_STRING);
                        $salt = "1234";                
                        
                        
                        if ($password!=$repeat_password){
                            echo "Różne hasła";
                        }
                        else {
                            $pw = hash("sha512", $salt.$password);
                            $insert_user = "INSERT INTO user (name, email, password) VALUES ('$login','$email','$pw')";
                            $add_to_database = new DateBase($insert_user); 
                            }
                         
                }        
            }
        ?>

        
        <form action="signup.php" method="post" >
            <div>
                <div>
                    Login: <input type="text" name="Login" maxlength="10" size="5" />
                </div>
                <div>
                    Email: <input type="text" name="Email" maxlength="50" size="5" />
                </div>
                <div>
                    Hasło: <input type="password" name="Password" maxlength="15" size="5" />
                </div>
                <div>
                    Powtórz hasło: <input type="password" name="Repeat_Password" maxlength="15" size="5" />
                </div> 
                <div>
                   <input type="submit" value="Sign In" />
                </div>
                
            </div>
        </form>    
        
    </body>
</html>
