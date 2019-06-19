<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body><pre>
        <?php
        // put your code here
        require_once './Config.php';
        $sql = new Sql();
        
        $usuarios = $sql->select("SELECT * FROM db_usuarios");
        
        echo json_encode($usuarios);
        
        
        
        ?>
        
        </pre>
</body>
</html>
