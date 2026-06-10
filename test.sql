select *
FROM
dept_manager 
join departments on dept_manager.dept_no = departments.dept_no
join employees on dept_manager.emp_no = employees.emp_no
WHERE to_date >= "9999-01-01";