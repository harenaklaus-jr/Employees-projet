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


