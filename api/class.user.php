<?php
include_once("settings.php");

class Login {
    public static function userLogin() {
        global $dbh;
        if(isset($_POST['login'])) {
            if(!empty($_POST['username'])) {
                if(!empty($_POST['password'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $passwordhash = $dbh->prepare("SELECT * FROM users WHERE username = ?");
                    $passwordhash->bindParam(1, $username);
                    $passwordhash->execute();
                    $passwordhashs = $passwordhash->fetch();

                    $login = $dbh->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
                    $login->bindParam(1, $username);
                    $login->bindValue(2, password_verify($password, $passwordhashs['password']));
                    $login->execute();
                    $logins = $login->fetch();

                    while($logins) {
                        session_start();
                        $_SESSION['username'] = $logins['username'];
                        $logado = "login.php";
                        self::redirect($logado);
                    }


                        if ($login->rowCount() == 1) {
                            $ip = $_SERVER['REMOTE_ADDR'];
                            $iplogger = $dbh->prepare("SELECT username, last_ip FROM users WHERE username = ?");
                            $iplogger->bindParam(1, $username);
                            $iplogger->execute();
                            $listip = $iplogger->fetch();

                            if ($ip != $listip['last_ip']) {
                                $insertip = $dbh->prepare("UPDATE users SET last_ip = ? WHERE username = ?");
                                $insertip->bindParam(1, $ip);
                                $insertip->bindParam(2, $username);
                                $insertip->execute();
                            }
                                $admin = $dbh->prepare("SELECT username, admin FROM users WHERE username = ?");
                                $admin->bindParam(1, $username);
                                $admin->execute();
                                $listadmin = $admin->fetch();

                                if($listadmin['admin'] == 1) {
                                    $newURL = "admin.php";
                                    return self::redirect($newURL);
                                } else {
                                    $newURL = "login.php";
                                    return self::redirect($newURL);
                                }
                        } else {
                            echo "<div class='error'>Seus dados estão incorretos</div>";
                            return;
                        }
                } else {
                    echo "<div class='error'>Insira sua senha</div>";
                    return;
                }
            } else {
                echo "<div class='error'>Insira seus dados</div>";
                return;
            }
        }
    }

    public static function redirect($link) {
        echo "<div class='success'>Redirecionando em 1 segundo!</div>";
        sleep(1);
        header('Location: '.$link);
    }

    public static function register() {
        global $dbh;

        if(isset($_POST['register'])) {
            $usuario = htmlspecialchars($_POST['username']);
            $password = self::hashed($_POST['password']);
            $ip = $_SERVER['REMOTE_ADDR'];
            $admin = 0;

            $registrar = $dbh->prepare("INSERT INTO users(id, username, password, last_ip, admin) VALUES(NULL, ?, ?, ?, ?)");
            $registrar->bindParam(1, $usuario);
            $registrar->bindParam(2, $password);
            $registrar->bindParam(3, $ip);
            $registrar->bindParam(4, $admin);
            $registrar->execute();
        }
    }

    public static function hashed($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

}

?>