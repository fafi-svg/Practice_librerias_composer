<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAS</title>
</head>
<body>
    <?php
        require_once __DIR__ . "/vendor/autoload.php";
        use Dotenv\Dotenv;
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        echo $_ENV["USER"];
        require_once __DIR__ . "/conexion.php";
        $query = $mysqli->query("SELECT employee_id FROM employees limit 10");
        foreach($query as $id){
            print_r ($id);
        }
    ?>

</body>
</html>