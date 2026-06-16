<?php
include_once 'connection.php';

function get_all_lines($sql){
    $req = mysqli_query(dbconnect(),$sql );
    $result = array();
    while ($line = mysqli_fetch_assoc($req)) {
        $result[] = $line;
    }
    mysqli_free_result($req);
    return $result;
}

function get_one_line($sql){
    $req = mysqli_query(dbconnect(),$sql );
    $result = mysqli_fetch_assoc($req);
    mysqli_free_result($req);
    return $result;
}

function get_all_dept_manager()
{
    $sql = "SELECT * 
            FROM dept_manager 
            JOIN departments ON dept_manager.dept_no=departments.dept_no 
            JOIN employees ON dept_manager.emp_no=employees.emp_no 
            WHERE to_date>='9999-01-01'";
    return get_all_lines($sql);
}

function get_all_employees($id) 
{
    $sql = "SELECT * 
            FROM dept_emp 
            JOIN departments ON dept_emp.dept_no=departments.dept_no 
            JOIN employees ON dept_emp.emp_no=employees.emp_no 
            WHERE dept_emp.dept_no='%s'";
    $sql = sprintf($sql, $id);
    return get_all_lines($sql);
}

function get_info_employees($id)
{  
    $sql = "SELECT * FROM employees WHERE emp_no=%d";
    $sql = sprintf($sql, $id);
    // echo $sql;
    return get_one_line($sql);
}

function get_info_salaire($id)
{
    $sql = "SELECT 
            salary, from_date, to_date 
            FROM salaries 
            WHERE emp_no=%d";
    $sql = sprintf($sql, $id);
    return get_all_lines($sql);
}

function get_info_title($id)
{
    $sql = "SELECT 
            title, from_date, to_date 
            FROM titles 
            WHERE emp_no=%d ORDER BY from_date ASC";
    $sql = sprintf($sql, $id);
    return get_all_lines($sql);
}

function get_research($nom, $age_min, $age_max, $departement)
{
    $sql = "SELECT
            employees.emp_no, 
            employees.first_name AS name,
            employees.last_name,
            TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) AS age,
            departments.dept_name AS departments
            FROM dept_emp 
            JOIN departments ON dept_emp.dept_no=departments.dept_no 
            JOIN employees ON dept_emp.emp_no=employees.emp_no 
            WHERE employees.first_name='%s' 
            AND (TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE())>=%d 
            AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE())<=%d)
            AND departments.dept_no='%s'";
    $sql = sprintf($sql, $nom, $age_min, $age_max, $departement);
    return get_all_lines($sql);
}
?>
