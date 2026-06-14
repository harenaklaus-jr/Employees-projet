<?php
function dbconnect(){
    static $connect = null;
    if ($connect === null) {
        $connect = mysqli_connect('localhost','root','','employees');

        if (!$connect) {
            //Arrete le script ey affiche une erreur si la connexion echoue 
            die('Erreur de connexion a la base de donnees: '.mysqli_connect_error());          
        }
        //Optionnel: definir l'encodage des caracteres pour gerer les accents 
        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}
function show_all($nomTable) {
    $sql = "select * from %s";
    $sql = sprintf($sql,$nomTable);
    $news_req = mysqli_query(dbconnect (),$sql);
    $result = array();
    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }
    mysqli_free_result($news_req);
    return $result;
}
function show_all_with_manager() {
    $sql = "select *
        FROM
        dept_manager 
        join departments on dept_manager.dept_no = departments.dept_no
        join employees on dept_manager.emp_no = employees.emp_no
        WHERE to_date >= '9999-01-01'";
    $conn = dbconnect();
    if (!$conn) {
        return []; 
    }
    $news_req = mysqli_query($conn, $sql);
    if (!$news_req) {
        return [];
    }
    $result = array();
    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }
    mysqli_free_result($news_req);
    return $result;
}

function show_employees($deptName) {
    $sql = "
    select *
    FROM
    dept_emp join departments on dept_emp.dept_no = departments.dept_no
    join employees on dept_emp.emp_no = employees.emp_no WHERE departments.dept_name = '%s' 
    ";
    $sql = sprintf($sql,$deptName);
    $conn = dbconnect();
    if (!$conn) {
        return []; 
    }
    $news_req = mysqli_query($conn, $sql);
    if (!$news_req) {
        return [];
    }
    $result = array();
    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }
    mysqli_free_result($news_req);
    return $result;
}

function about_employee($v1, $v2) {
    $sql = "select 
        *
        from
        employees
        join titles on employees.emp_no = titles.emp_no
        join salaries on employees.emp_no = salaries.emp_no
        where employees.first_name = '%s' and employees.last_name = '%s'
    ";
    $sql = sprintf($sql,$v1,$v2);
    $conn = dbconnect();
    if (!$conn) {
        return []; 
    }
    $news_req = mysqli_query($conn, $sql);
    if (!$news_req) {
        return [];
    }
    $result = array();
    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }
    mysqli_free_result($news_req);
    return $result;
}
function about_with_search($v1, $v2, $v3, $v4) {
    $sql = "";
    $sql = sprintf($sql,$v1,$v2);
    $conn = dbconnect();
    if (!$conn) {
        return []; 
    }
    $news_req = mysqli_query($conn, $sql);
    if (!$news_req) {
        return [];
    }
    $result = array();
    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }
    mysqli_free_result($news_req);
    return $result;
}
?>
