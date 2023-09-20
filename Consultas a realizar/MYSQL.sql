
/****** Object:  Database NorthwindEasy    Script Date: 23/08/2022 12:14:19 p. m. ******/

drop database  if exists NorthwindEasy;
CREATE DATABASE NorthwindEasy;

USE NorthwindEasy;

CREATE TABLE departments(
	department_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	department_name varchar(30) NOT NULL
);

CREATE TABLE jobs(
	job_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	job_title varchar(35) NOT NULL,
	min_salary decimal(8, 2) NULL,
	max_salary decimal(8, 2) NULL) 
;
CREATE TABLE employees(
	employee_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	first_name varchar(20) NULL,
	last_name varchar(25) NOT NULL,
	email varchar(100) NOT NULL,
	phone_number varchar(20) NULL,
	hire_date date NOT NULL,
	job_id int NOT NULL,
	salary decimal(8, 2) NOT NULL,
	manager_id int NULL,
	department_id int NULL,
     FOREIGN KEY(manager_id)
REFERENCES employees (employee_id),
FOREIGN KEY(job_id)
REFERENCES jobs (job_id),FOREIGN KEY(department_id)
REFERENCES departments (department_id)

) 
;
/****** Object:  Table jobs    Script Date: 23/08/2022 12:14:20 p. m. ******/



INSERT departments (department_id, department_name) VALUES (1, 'Administratio')
;
INSERT departments (department_id, department_name) VALUES (2, 'Marketing')
;
INSERT departments (department_id, department_name) VALUES (3, 'Purchasing')
;
INSERT departments (department_id, department_name) VALUES (4, 'Human Resources')
;
INSERT departments (department_id, department_name) VALUES (5, 'Shipping')
;
INSERT departments (department_id, department_name) VALUES (6, 'IT')
;
INSERT departments (department_id, department_name) VALUES (7, 'Public Relations')
;
INSERT departments (department_id, department_name) VALUES (8, 'Sales')
;
INSERT departments (department_id, department_name) VALUES (9, 'Executive')
;
INSERT departments (department_id, department_name) VALUES (10, 'Finance')
;
INSERT departments (department_id, department_name) VALUES (11, 'Accounting')
;


INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (1, 'Public Accountant', CAST(4200.00 AS Decimal(8, 2)), CAST(9000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (2, 'Accounting Manager', CAST(8200.00 AS Decimal(8, 2)), CAST(16000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (3, 'Administration Assistant', CAST(3000.00 AS Decimal(8, 2)), CAST(6000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (4, 'President', CAST(20000.00 AS Decimal(8, 2)), CAST(40000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (5, 'Administration Vice President', CAST(15000.00 AS Decimal(8, 2)), CAST(30000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (6, 'Accountant', CAST(4200.00 AS Decimal(8, 2)), CAST(9000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (7, 'Finance Manager', CAST(8200.00 AS Decimal(8, 2)), CAST(16000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (8, 'Human Resources Representative', CAST(4000.00 AS Decimal(8, 2)), CAST(9000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (9, 'Programmer', CAST(4000.00 AS Decimal(8, 2)), CAST(10000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (10, 'Marketing Manager', CAST(9000.00 AS Decimal(8, 2)), CAST(15000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (11, 'Marketing Representative', CAST(4000.00 AS Decimal(8, 2)), CAST(9000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (12, 'Public Relations Representative', CAST(4500.00 AS Decimal(8, 2)), CAST(10500.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (13, 'Purchasing Clerk', CAST(2500.00 AS Decimal(8, 2)), CAST(5500.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (14, 'Purchasing Manager', CAST(8000.00 AS Decimal(8, 2)), CAST(15000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (15, 'Sales Manager', CAST(10000.00 AS Decimal(8, 2)), CAST(20000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (16, 'Sales Representative', CAST(6000.00 AS Decimal(8, 2)), CAST(12000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (17, 'Shipping Clerk', CAST(2500.00 AS Decimal(8, 2)), CAST(5500.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (18, 'Stock Clerk', CAST(2000.00 AS Decimal(8, 2)), CAST(5000.00 AS Decimal(8, 2)))
;
INSERT jobs (job_id, job_title, min_salary, max_salary) VALUES (19, 'Stock Manager', CAST(5500.00 AS Decimal(8, 2)), CAST(8500.00 AS Decimal(8, 2)))
;



INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (100, 'Steve', 'King', 'steven.king@sqltutorial.org', '515.123.4567', CAST('1987-06-17' AS Date), 4, CAST(24000.00 AS Decimal(8, 2)), NULL, 9)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (101, 'Neena', 'Kochhar', 'neena.kochhar@sqltutorial.org', '515.123.4568', CAST('1989-09-21' AS Date), 5, CAST(17000.00 AS Decimal(8, 2)), 100, 9)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (102, 'Lex', 'De Haa', 'lex.de haan@sqltutorial.org', '515.123.4569', CAST('1993-01-13' AS Date), 5, CAST(17000.00 AS Decimal(8, 2)), 100, 9)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (103, 'Alexander', 'Hunold', 'alexander.hunold@sqltutorial.org', '590.423.4567', CAST('1990-01-03' AS Date), 9, CAST(9000.00 AS Decimal(8, 2)), 102, 6)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (104, 'Bruce', 'Ernst', 'bruce.ernst@sqltutorial.org', '590.423.4568', CAST('1991-05-21' AS Date), 9, CAST(6000.00 AS Decimal(8, 2)), 103, 6)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (105, 'David', 'Austi', 'david.austin@sqltutorial.org', '590.423.4569', CAST('1997-06-25' AS Date), 9, CAST(4800.00 AS Decimal(8, 2)), 103, 6)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (106, 'Valli', 'Pataballa', 'valli.pataballa@sqltutorial.org', '590.423.4560', CAST('1998-02-05' AS Date), 9, CAST(4800.00 AS Decimal(8, 2)), 103, 6)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (107, 'Diana', 'Lorentz', 'diana.lorentz@sqltutorial.org', '590.423.5567', CAST('1999-02-07' AS Date), 9, CAST(4200.00 AS Decimal(8, 2)), 103, 6)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (108, 'Nancy', 'Greenberg', 'nancy.greenberg@sqltutorial.org', '515.124.4569', CAST('1994-08-17' AS Date), 7, CAST(12000.00 AS Decimal(8, 2)), 101, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (109, 'Daniel', 'Faviet', 'daniel.faviet@sqltutorial.org', '515.124.4169', CAST('1994-08-16' AS Date), 6, CAST(9000.00 AS Decimal(8, 2)), 108, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (110, 'Joh', 'Che', 'john.chen@sqltutorial.org', '515.124.4269', CAST('1997-09-28' AS Date), 6, CAST(8200.00 AS Decimal(8, 2)), 108, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (111, 'Ismael', 'Sciarra', 'ismael.sciarra@sqltutorial.org', '515.124.4369', CAST('1997-09-30' AS Date), 6, CAST(7700.00 AS Decimal(8, 2)), 108, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (112, 'Jose Manuel', 'Urma', 'jose manuel.urman@sqltutorial.org', '515.124.4469', CAST('1998-03-07' AS Date), 6, CAST(7800.00 AS Decimal(8, 2)), 108, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (113, 'Luis', 'Popp', 'luis.popp@sqltutorial.org', '515.124.4567', CAST('1999-12-07' AS Date), 6, CAST(6900.00 AS Decimal(8, 2)), 108, 10)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (114, 'De', 'Raphaely', 'den.raphaely@sqltutorial.org', '515.127.4561', CAST('1994-12-07' AS Date), 14, CAST(11000.00 AS Decimal(8, 2)), 100, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (115, 'Alexander', 'Khoo', 'alexander.khoo@sqltutorial.org', '515.127.4562', CAST('1995-05-18' AS Date), 13, CAST(3100.00 AS Decimal(8, 2)), 114, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (116, 'Shelli', 'Baida', 'shelli.baida@sqltutorial.org', '515.127.4563', CAST('1997-12-24' AS Date), 13, CAST(2900.00 AS Decimal(8, 2)), 114, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (117, 'Sigal', 'Tobias', 'sigal.tobias@sqltutorial.org', '515.127.4564', CAST('1997-07-24' AS Date), 13, CAST(2800.00 AS Decimal(8, 2)), 114, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (118, 'Guy', 'Himuro', 'guy.himuro@sqltutorial.org', '515.127.4565', CAST('1998-11-15' AS Date), 13, CAST(2600.00 AS Decimal(8, 2)), 114, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (119, 'Kare', 'Colmenares', 'karen.colmenares@sqltutorial.org', '515.127.4566', CAST('1999-08-10' AS Date), 13, CAST(2500.00 AS Decimal(8, 2)), 114, 3)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (120, 'Matthew', 'Weiss', 'matthew.weiss@sqltutorial.org', '650.123.1234', CAST('1996-07-18' AS Date), 19, CAST(8000.00 AS Decimal(8, 2)), 100, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (121, 'Adam', 'Fripp', 'adam.fripp@sqltutorial.org', '650.123.2234', CAST('1997-04-10' AS Date), 19, CAST(8200.00 AS Decimal(8, 2)), 100, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (122, 'Payam', 'Kaufling', 'payam.kaufling@sqltutorial.org', '650.123.3234', CAST('1995-05-01' AS Date), 19, CAST(7900.00 AS Decimal(8, 2)), 100, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (123, 'Shanta', 'Vollma', 'shanta.vollman@sqltutorial.org', '650.123.4234', CAST('1997-10-10' AS Date), 19, CAST(6500.00 AS Decimal(8, 2)), 100, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (126, 'Irene', 'Mikkilineni', 'irene.mikkilineni@sqltutorial.org', '650.124.1224', CAST('1998-09-28' AS Date), 18, CAST(2700.00 AS Decimal(8, 2)), 120, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (145, 'Joh', 'Russell', 'john.russell@sqltutorial.org', NULL, CAST('1996-10-01' AS Date), 15, CAST(14000.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (146, 'Kare', 'Partners', 'karen.partners@sqltutorial.org', NULL, CAST('1997-01-05' AS Date), 15, CAST(13500.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (176, 'Jonatho', 'Taylor', 'jonathon.taylor@sqltutorial.org', NULL, CAST('1998-03-24' AS Date), 16, CAST(8600.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (177, 'Jack', 'Livingsto', 'jack.livingston@sqltutorial.org', NULL, CAST('1998-04-23' AS Date), 16, CAST(8400.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (178, 'Kimberely', 'Grant', 'kimberely.grant@sqltutorial.org', NULL, CAST('1999-05-24' AS Date), 16, CAST(7000.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (179, 'Charles', 'Johnso', 'charles.johnson@sqltutorial.org', NULL, CAST('2000-01-04' AS Date), 16, CAST(6200.00 AS Decimal(8, 2)), 100, 8)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (192, 'Sarah', 'Bell', 'sarah.bell@sqltutorial.org', '650.501.1876', CAST('1996-02-04' AS Date), 17, CAST(4000.00 AS Decimal(8, 2)), 123, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (193, 'Britney', 'Everett', 'britney.everett@sqltutorial.org', '650.501.2876', CAST('1997-03-03' AS Date), 17, CAST(3900.00 AS Decimal(8, 2)), 123, 5)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (200, 'Jennifer', 'Whale', 'jennifer.whalen@sqltutorial.org', '515.123.4444', CAST('1987-09-17' AS Date), 3, CAST(4400.00 AS Decimal(8, 2)), 101, 1)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (201, 'Michael', 'Hartstei', 'michael.hartstein@sqltutorial.org', '515.123.5555', CAST('1996-02-17' AS Date), 10, CAST(13000.00 AS Decimal(8, 2)), 100, 2)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (202, 'Pat', 'Fay', 'pat.fay@sqltutorial.org', '603.123.6666', CAST('1997-08-17' AS Date), 11, CAST(6000.00 AS Decimal(8, 2)), 201, 2)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (203, 'Susa', 'Mavris', 'susan.mavris@sqltutorial.org', '515.123.7777', CAST('1994-06-07' AS Date), 8, CAST(6500.00 AS Decimal(8, 2)), 101, 4)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (204, 'Herman', 'Baer', 'hermann.baer@sqltutorial.org', '515.123.8888', CAST('1994-06-07' AS Date), 12, CAST(10000.00 AS Decimal(8, 2)), 101, 7)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (205, 'Shelley', 'Higgins', 'shelley.higgins@sqltutorial.org', '515.123.8080', CAST('1994-06-07' AS Date), 2, CAST(12000.00 AS Decimal(8, 2)), 101, 11)
;
INSERT employees (employee_id, first_name, last_name, email, phone_number, hire_date, job_id, salary, manager_id, department_id) VALUES (206, 'William', 'Gietz', 'william.gietz@sqltutorial.org', '515.123.8181', CAST('1994-06-07' AS Date), 1, CAST(8300.00 AS Decimal(8, 2)), 205, 11)
;


