<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once __DIR__."/vendor/autoload.php";
        use Dotenv\Dotenv;
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
        require_once __DIR__ . "/conexion.php";
    ?>
    <?php
        $query = $mysqli->query("select e.employee_id as 'id_employee', e.first_name, e.last_name, e.email, e.phone_number, d.department_name, ej.first_name as 'Manager name', ej.email as 'Manager email'
        from employees as e
        left join departments as d
        on d.department_id = e.department_id
        left join employees as ej
        on e.manager_id = ej.employee_id;");
        $contador = 0;
    ?>
    <div class="query query1">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">1. </span>crear una consulta que permita obtener el listado de todos los empleados (Employees) 
                <br>obteniendo su employee_id, first_name, last_name, email, phone_number,
                el nombre de departamento donde esta 
                y el nombre y correo de su jefe.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span> e.employee_id as 'id_employee', e.first_name, e.last_name, e.email, e.phone_number, <br> d.department_name, ej.first_name as 'Manager name', ej.email as 'Manager email' <br>
                <span class="query__span-text">from</span> employees as e <br>
                <span class="query__span-text">left join</span> departments as d <br>
                <span class="query__span-text">on</span> d.department_id = e.department_id <br>
                <span class="query__span-text">left join</span> employees as ej <br>
                <span class="query__span-text">on</span> e.manager_id = ej.employee_id; <br>
            </p>
         <p id="query__text_copy_1" style="display: none;">
          select e.employee_id as 'id_employee', e.first_name, e.last_name, e.email, e.phone_number, d.department_name, ej.first_name as 'Manager name', ej.email as 'Manager email' from employees as e left join departments as d on d.department_id = e.department_id left join employees as ej on e.manager_id = ej.employee_id;  
         </p>
         <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
            <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_1')">Copiar Consulta</button>
         </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select d.department_name,  count(*) as employees 
        from departments as d
        right join employees as e
        on d.department_id = e.department_id
        group by d.department_name
        order by employees;");
        $contador = 0;
    ?>

    <div class="query query2">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">2. </span>Obtener el listado de todos los departamentos y la cantidad de trabajador que está en ese departamento.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>  d.department_name,  count(*) as employees <br>
                <span class="query__span-text">from</span>  departments as d<br>
                <span class="query__span-text">right join</span> employees as e <br>
                <span class="query__span-text">on</span> d.department_id = e.department_id <br>
                <span class="query__span-text">group by</span>  d.department_name <br>
                <span class="query__span-text">order by</span>  employees; <br>
            </p>
          <p id="query__text_copy_2" style="display: none;">
            select d.department_name,  count(*) as employees from departments as d right join employees as e on d.department_id = e.department_id group by d.department_name order by employees;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_2')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select d.department_name, avg(e.salary) as Promedio from employees as e
        inner join departments as d
        on d.department_id = e.department_id 
        group by d.department_name
        order by Promedio desc;");
        $contador = 0;
    ?>

    <div class="query query3">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">3. </span> Obtener el salario promedio de cada departamento.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>  d.department_name, avg(e.salary) as Promedio <br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">inner join</span>  departments as d<br>
                <span class="query__span-text">on</span>  d.department_id = e.department_id <br>
                <span class="query__span-text">group by</span>  d.department_name <br>
                <span class="query__span-text">order by</span>  Promedio desc; 
            </p>
          <p id="query__text_copy_3" style="display: none;">
            select d.department_name, avg(e.salary) as Promedio from employees as e inner join departments as d on d.department_id = e.department_id  group by d.department_name order by Promedio desc;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_3')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select e.employee_id, e.first_name, e.last_name, e.salary from employees as e
        order by salary desc
        limit 5;");
        $contador = 0;
    ?>

    <div class="query query4">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">4. </span> Obtener el TOP 5 de los empleados mejores pagado.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span> e.employee_id, e.first_name, e.last_name, e.salary<br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">order by</span>  salary desc <br>
                <span class="query__span-text">limit</span>  5; <br>
            </p>
          <p id="query__text_copy_4" style="display: none;">
          select e.employee_id, e.first_name, e.last_name, e.salary from employees as e order by salary desc limit 5;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_4')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select e.employee_id, e.first_name, e.salary as salary from employees as e
        where e.salary = (select max(salary) from employees) 
        or e.salary = (select min(salary) from employees);");
        $contador = 0;
    ?>

    <div class="query query5">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">5. </span> Obtener el Salario más Alto y el más bajo de los empleados.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>  e.employee_id, e.first_name, e.salary as salary <br>
                <span class="query__span-text">where</span>  e.salary = (select max(salary) from employees) <br>
                <span class="query__span-text">or</span>  e.salary = (select min(salary) from employees);<br>
            </p>
          <p id="query__text_copy_5" style="display: none;">
             select e.employee_id, e.first_name, e.salary as salary from employees as e where e.salary = (select max(salary) from employees) or e.salary = (select min(salary) from employees);
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_5')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>


    <?php
 
        $query = $mysqli->query("select e.employee_id, e.first_name, e.hire_date from employees as e
        where year(e.hire_date) = '1997';");
        $contador = 0;
    ?>

    <div class="query query6">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">6. </span> Obtener todos los empleados que fueron contratado en un determinado año (Hire_Date).
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>   e.employee_id, e.first_name, e.hire_date <br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">where</span> year(e.hire_date) = '1997';<br>
            </p>
          <p id="query__text_copy_6" style="display: none;">
            select d.department_name, avg(e.salary) as Promedio from employees as e inner join departments as d on d.department_id = e.department_id  group by d.department_name order by Promedio desc;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_6')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>


    <?php
 
        $query = $mysqli->query("select e.employee_id, e.first_name, j.job_title, j.min_salary, j.max_salary from employees as e
        inner join jobs as j on e.job_id = j.job_id;");
        $contador = 0;
    ?>

    <div class="query query7">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">7. </span> Obtener un listado de empleado con su cargo (Jobs), salario mínimo (min_salary) y máximo (max_salary).
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>   e.employee_id, e.first_name, j.job_title, j.min_salary, j.max_salary <br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">inner join</span> jobs as j;<br>
                <span class="query__span-text">on</span> e.job_id = j.job_id;;<br>
            </p>
          <p id="query__text_copy_7" style="display: none;">
             select e.employee_id, e.first_name, j.job_title, j.min_salary, j.max_salary from employees as e inner join jobs as j on e.job_id = j.job_id;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_7')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select d.department_name as 'Name Departments', sum(e.salary) as Nomina from employees as e
        inner join departments as d
        where d.department_id = e.department_id
        group by d.department_name;");
        $contador = 0;
    ?>

    <div class="query query8">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">8. </span> Se necesita desplegar la nómina de cada departamento, por ende,
                    se requiere conocer cuánto debe ser el presupuesto por cada departamento para pagarle a todos los empleados.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>   d.department_name as 'Name Departments', sum(e.salary) as Nomina<br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">inner join</span> departments as d<br>
                <span class="query__span-text">where</span> d.department_id = e.department_id;<br>
                <span class="query__span-text">group by</span> d.department_name;
            </p>
          <p id="query__text_copy_8" style="display: none;">
             select d.department_name as "Name Departments", sum(e.salary) as Nomina from employees as e inner join departments as d where d.department_id = e.department_id group by d.department_name;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_8')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>

    <?php
 
        $query = $mysqli->query("select e.manager_id as 'ID Manager', concat(ej.first_name ,' ',ej.last_name) as 'Nombre Manager', count(*) as 'N° Empleados' 
        from employees as e
        inner join employees as ej
        where e.manager_id = ej.employee_id
        group by e.manager_id 
        order by e.manager_id asc;");
        $contador = 0;
    ?>

    <div class="query query9">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">9. </span> Se desea conocer la cantidad de empleado que tiene cada jefe Asignado, 
                    aquellos empleados que no tiene ninguno empleado a cargo no debe salir en la consulta.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>   e.manager_id as 'ID Manager', concat(ej.first_name ,' ',ej.last_name) as 'Nombre Manager', count(*) as 'N° Empleados' <br>
                <span class="query__span-text">from</span>  employees as e<br>
                <span class="query__span-text">inner join</span> employees as ej<br>
                <span class="query__span-text">on</span> e.job_id = j.job_id;<br>
            </p>
          <p id="query__text_copy_9" style="display: none;">
             select e.manager_id as 'ID Manager', concat(ej.first_name ,' ',ej.last_name) as 'Nombre Manager', count(*) as 'N° Empleados' from employees as e inner join employees as ej where e.manager_id = ej.employee_id group by e.manager_id order by e.manager_id asc;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_9')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>


    <?php
 
        $query = $mysqli->query("select e.employee_id as ID, concat(e.first_name ,' ', e.last_name) as Empleado,
        (((year(now())*12)-((year(e.hire_date))*12))+(month(e.hire_date))) as Meses,
        (day(e.hire_date)) as Dias 
        from employees as e;");
        $contador = 0;
    ?>

    <div class="query query10">
        <div class="query__problem">
            <p class="query__problem-text">
                <span class="query__span-text">10. </span> Se requiere conocer el tiempo de antigüedad de cada empleado,
                    para ello debe obtener una lista de todos los empleados más el tiempo de antigüedad en meses.
            </p>    
        </div>
        <div class="query__consult">
            <p class="query__consult-text">
                <span class="query__span-text">select</span>  e.employee_id as ID, concat(e.first_name ,' ', e.last_name) as Empleado,
                    (((year(now())*12)-((year(e.hire_date))*12))+(month(e.hire_date))) as Meses,
                    (day(e.hire_date)) as Dias <br>
                <span class="query__span-text">from</span>  employees as e<br>
            </p>
          <p id="query__text_copy_10" style="display: none;">
             select e.employee_id as ID, concat(e.first_name ,' ', e.last_name) as Empleado, (((year(now())*12)-((year(e.hire_date))*12))+(month(e.hire_date))) as Meses, (day(e.hire_date)) as Dias from employees as e;
          </p>
                <div  style="position: absolute; z-index: 1; width: max-content; border: 0 solid; right: 0; bottom: 37%; right: 6%;">
                    <button class="btn-copy" onclick="copiarAlPortapapeles('query__text_copy_10')">Copiar Consulta</button>
                </div>
        </div>
        <div tabindex="0" class="query__container">
            <div class="tabla">
                <div class="tabla__header">
                    <?php
                        foreach($query as $item){
                            $long = sizeof($item)-1; 
                    ?>              
                            <div class="tabla__columna <?php echo $contador+1?>"> 
                                <p class="tabla__columna-text">
                                    <?php
                                        echo (array_keys($item)[$contador]);
                                        if($contador<$long){
                                            ($contador += 1);
                                        }else{
                                            break;
                                        }  
                                    ?> 
                                </p> 
                            </div>
                        <?php 
                        }
                        ?> 
                </div>
            </div>
            <div class="tabla__content">
                    <?php
                        foreach($query as $item){
                        ?>
                            <div class="tabla__content-elem">
                                <?php 
                                foreach($item as $elem){
                                ?> 
                                    <div class="tabla__columna <?php echo $contador+1?>"> 
                                        <?php 
                                            echo "<p class=tabla__columna-text>{$elem}</p>";
                                        ?>
                                    </div>
                                <?php
                                }
                                ?> 
                            </div>
                        <?php 
                        }
                        $contador = 0;
                        ?>      
                </div>
            </div>
        </div>
    </div>


    <script>
        function copiarAlPortapapeles(id_elemento) {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }
    </script>
</body>
</html> 