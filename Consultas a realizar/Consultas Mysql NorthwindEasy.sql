USE NorthwindEasy;
/* 1. crear una consulta que permita obtener el listado de todos los empleados (Employees) 
obteniendo su employee_id, first_name, last_name, email, phone_number, 
el nombre de departamento donde esta 
y el nombre y correo de su jefe. */

select e.employee_id as "ID EMPLEADO", e.first_name, e.last_name, e.email, e.phone_number, d.department_name, ej.first_name as "Manager name", ej.email as "Manager email"
from employees as e
left join departments as d
on d.department_id = e.department_id
left join employees as ej
on e.manager_id = ej.employee_id;

/*2. Obtener el listado de todos los departamentos y la cantidad de trabajador que está en ese departamento.*/

select d.department_name,  count(*) as employees 
from departments as d
right join employees as e
on d.department_id = e.department_id
group by d.department_name
order by employees;

/*3. Obtener el salario promedio de cada departamento.*/

select d.department_name, avg(e.salary) as Promedio from employees as e
inner join departments as d
on d.department_id = e.department_id 
group by d.department_name
order by Promedio desc;

/*4. Obtener el TOP 5 de los empleados mejores pagado*/

select e.employee_id, e.first_name, e.last_name, e.salary from employees as e
order by salary desc
limit 5;

/*5. Obtener el Salario más Alto y el más bajo de los empleados*/

select e.employee_id, e.first_name, e.salary from employees as e
where e.salary = (select max(salary) from employees) 
or e.salary = (select min(salary) from employees);


/*6. Obtener todos los empleados que fueron contratado en un determinado año (Hire_Date)*/

select e.employee_id, e.first_name, e.hire_date from employees as e
where year(e.hire_date) = '1997';

/*7. Obtener un listado de empleado con su cargo (Jobs), salario mínimo (min_salary) y máximo (max_salary)*/

select e.employee_id, e.first_name, j.job_title, j.min_salary, j.max_salary from employees as e
inner join jobs as j
on e.job_id = j.job_id;

/*8. Se necesita desplegar la nómina de cada departamento, por ende,
se requiere conocer cuánto debe ser el presupuesto por cada departamento para pagarle a todos los empleados.*/

select d.department_name as "Name Departments", sum(e.salary) as Nomina from employees as e
inner join departments as d
where d.department_id = e.department_id
group by d.department_name;

/*9. Se desea conocer la cantidad de empleado que tiene cada jefe Asignado, 
aquellos empleados que no tiene ninguno empleado a cargo no debe salir en la consulta.*/

select (e.manager_id) as "ID Manager", concat(ej.first_name ," ",ej.last_name) as "Nombre Manager", (count(*)) as "N° Empleados" from employees as e
inner join employees as ej
where e.manager_id = ej.employee_id
group by e.manager_id
order by e.manager_id asc;

/*10. Se requiere conocer el tiempo de antigüedad de cada empleado,
 para ello debe obtener una lista de todos los empleados más el tiempo de antigüedad en meses.*/
 
 select e.employee_id as ID, 
 concat(e.first_name ," ", e.last_name) as Empleado,
 (((year(now())*12)-((year(e.hire_date))*12))+(month(e.hire_date))) as Meses,
 (day(e.hire_date)) as Dias 
 from employees as e;
 