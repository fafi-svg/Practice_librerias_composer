<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTAS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once __DIR__."/vendor/autoload.php";
        use Dotenv\Dotenv;
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        require_once __DIR__ . "/conexion.php";
        $query = $mysqli->query("SELECT * FROM employees as e limit 15");
        foreach($query as $id){
        ?>
            <div class="row">
                <?php
                    foreach($id as $item){
                       echo  "<div class=row__item>$item</div>";
                    }
                ?>
            </div>
        <?php
        }
        ?>

</body>
</html>