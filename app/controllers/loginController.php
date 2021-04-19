<?php 
include("./conexao.php");
    session_start();
        $content->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['login'])) {
            if (empty($_POST["username"]) || empty($_POST["password"])) 
            {
               $message = '<label>Todos os campos são necessários</label>';  
            }
            else
            {
                $query = 'SELECT * FROM USUARIO WHERE USUARIO = :username AND SENHA = md5(:password)';
                $statement = $content->prepare($query);
                $statement->execute(
                    array(
                        'username' => $_POST['username'],
                        'password' => $_POST['password']
                        )
                );
                $count = $statement->rowCount();
                if ($count > 0) 
                {
                    $_SESSION['username'] = $_POST['username'];
                    header("location: login_success.php");
                }
                else
                {
                    $message = '<label>Campo Usuario ou Senha: Inválido.</label>'; 
                }
            }
        }
?>