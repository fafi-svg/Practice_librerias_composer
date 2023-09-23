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
        $query = $mysqli->query("select e.employee_id as 'ID EMPLEADO', e.first_name, e.last_name, e.email, e.phone_number, d.department_name, ej.first_name as 'Manager name', ej.email as 'Manager email'
        from employees as e
        left join departments as d
        on d.department_id = e.department_id
        left join employees as ej
        on e.manager_id = ej.employee_id;");
        foreach($query as $id){
        ?>
            <div class="row">
                <?php
                    foreach($id as $item){
                        if ($item != null){
                            echo  "<div class=row__item>$item</div>";
                        }
                        else{
                            echo  "<div class=row__item>Null</div>";
                        }
                    
                    }
                ?>
            </div>
        <?php
        }
        ?>

</body>
</html>