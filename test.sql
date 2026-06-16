select *
FROM
dept_manager 
join departments on dept_manager.dept_no = departments.dept_no
join employees on dept_manager.emp_no = employees.emp_no
WHERE to_date >= "9999-01-01";

select *
FROM
dept_emp join departments on dept_emp.dept_no = departments.dept_no
join employees on dept_emp.emp_no = employees.emp_no WHERE departments.dept_name = "Customer Service"; 

select 
*
from
employees
join titles on employees.emp_no = titles.emp_no
join salaries on employees.emp_no = salaries.emp_no
where employees.first_name = 'Weiyi' and employees.last_name = 'Meriste'
;

select 
TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE())
from 
employees join 
titles on titles.emp_no = employees.emp_no join 
dept_manager on dept_manager.emp_no = employees.emp_no join 
departments on departments.dept_no = dept_manager.dept_no join  
salaries on employees.emp_no = salaries.emp_no
limit 1
;

-- recherche
SELECT 
employees.first_name AS name,
TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) AS age,
departments.dept_name AS departments
FROM dept_emp 
JOIN departments ON dept_emp.dept_no=departments.dept_no 
JOIN employees ON dept_emp.emp_no=employees.emp_no 
WHERE employees.first_name='Vishwani' 
AND (TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE())>= 26 
AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE())<=100)
AND departments.dept_name='Marketing';


