<?php

function find_files_of_course($course_id){
    global $connection;
    $safe_course_id = mysqli_real_escape_string($connection, $course_id);
    
    $query  = "SELECT * ";
    $query .= "FROM file_library ";
    $query .= "WHERE course_id = {$safe_course_id} ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    return $set;}

function find_all_schedules_of_course($course_id){
    global $connection;
    $safe_course_id = mysqli_real_escape_string($connection, $course_id);
    
    $query  = "SELECT * ";
    $query .= "FROM schedule_class ";
    $query .= "WHERE course_id = {$safe_course_id} ";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    return $set;}

function find_schedule($schedule_id,$course_id){
    global $connection;
    $safe_schedule_id = mysqli_real_escape_string($connection, $schedule_id);
    $safe_course_id = mysqli_real_escape_string($connection, $course_id);
    
    $query  = "SELECT * ";
    $query .= "FROM schedule_class ";
    $query .= "WHERE course_id = {$safe_course_id} ";
    $query .= "AND id = {$safe_schedule_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    if($user = mysqli_fetch_assoc($set)) {
        return $user;
    } else {
        return null;
    }}


function find_enrollment($student_id,$course_id){
    global $connection;
    $safe_student_id = mysqli_real_escape_string($connection, $student_id);
    $safe_course_id = mysqli_real_escape_string($connection, $course_id);
    
    $query  = "SELECT * ";
    $query .= "FROM student_enrollment ";
    $query .= "WHERE course_id = {$safe_course_id} ";
    $query .= "AND student_id = {$safe_student_id} ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    confirm_query($user_set);
    if($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }}

function no_of_teachers(){
        global $connection;
        
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $query .= "WHERE designation = 1 ";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function no_of_courses_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM courses ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $courses_set = mysqli_query($connection, $query);
        confirm_query($courses_set);
        return $courses_set;
    }
function no_of_students_by_course($course_id){
        global $connection;
        $safe_course_id = mysqli_real_escape_string($connection, $course_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM student_enrollment ";
        $query .= "WHERE course_id = {$safe_course_id} ";
        $students_set = mysqli_query($connection, $query);
        confirm_query($students_set);
        return $students_set;
    }
function no_of_teachers_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "AND designation = 1 ";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function form_errors($errors=array()) {
        $output = "";
        if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
                $output .= htmlentities($error);
                $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
        }
        return $output;
    }
function find_student_by_id($student_id){
        global $connection;
        
        $safe_user_id = mysqli_real_escape_string($connection, $student_id);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE id = {$safe_user_id} ";
        $query .= "AND designation = 0 ";
        $query .= "LIMIT 1";
        $user_set = mysqli_query($connection, $query);
        confirm_query($user_set);
        if($user = mysqli_fetch_assoc($user_set)) {
            return $user;
        } else {
            return null;
        }
        
    }
function find_all_students() {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE designation = 0 ";
        $query .= "ORDER BY full_name ASC";
        $student_set = mysqli_query($connection, $query);
        confirm_query($student_set);
        return $student_set;
    }
function find_all_departments() {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "ORDER BY name ASC";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        return $department_set;
    }
function find_all_students_of_course($course_id){
        global $connection;
        $safe_course_id = mysqli_real_escape_string($connection, $course_id);
        $query  = "SELECT * ";
        $query .= "FROM student_enrollment ";
        $query .= "WHERE course_id = {$safe_course_id} ";
        $students_set = mysqli_query($connection, $query);
        confirm_query($students_set);
        return $students_set;
    }
function find_all_courses_of_student($student_id){
        global $connection;
        $safe_student_id = mysqli_real_escape_string($connection, $student_id);
        $query  = "SELECT * ";
        $query .= "FROM student_enrollment ";
        $query .= "WHERE student_id = {$safe_student_id} ";
        $courses_set = mysqli_query($connection, $query);
        confirm_query($courses_set);
        return $courses_set;
    }
function find_all_courses_of_teacher($teacher_id){
        global $connection;
        $safe_teacher_id = mysqli_real_escape_string($connection, $teacher_id);
        $query  = "SELECT * ";
        $query .= "FROM courses ";
        $query .= "WHERE teacher_id = {$safe_teacher_id} ";
        $courses_set = mysqli_query($connection, $query);
        confirm_query($courses_set);
        return $courses_set;
    }
function find_all_courses_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM courses ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "ORDER BY title ASC";
        $courses_set = mysqli_query($connection, $query);
        confirm_query($courses_set);
        return $courses_set;
    }
function find_courses_by_department($department_id, $start, $end){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM courses ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "ORDER BY title ASC ";
        $query .= "LIMIT {$start},{$end} ";
        $courses_set = mysqli_query($connection, $query);
        confirm_query($courses_set);
        return $courses_set;
    }
function find_all_teachers_from($start,$end){
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE designation = 1 ";
        $query .= "ORDER BY full_name ASC " ;
        $query .= "LIMIT {$start},{$end}";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function find_all_teachers(){
        global $connection;

        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE designation = 1 ";
        $query .= "ORDER BY full_name ASC";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function find_all_students_of_course_from($course_id, $start, $end){
        global $connection;
        $safe_course_id = mysqli_real_escape_string($connection, $course_id);
        $query  = "SELECT * ";
        $query .= "FROM student_enrollment ";
        $query .= "WHERE course_id = {$safe_course_id} ";
        $query .= "LIMIT {$start},{$end}";
        $students_set = mysqli_query($connection, $query);
        confirm_query($students_set);
        return $students_set;
    }
function find_teachers_by_department($department_id, $start, $end){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "AND designation = 1 ";
        $query .= "ORDER BY full_name ASC ";
        $query .= "LIMIT {$start},{$end}";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function find_all_teachers_by_department($department_id){
        global $connection;
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE department_id = {$safe_department_id} ";
        $query .= "AND designation = 1 ";
        $query .= "ORDER BY full_name ASC";
        $teachers_set = mysqli_query($connection, $query);
        confirm_query($teachers_set);
        return $teachers_set;
    }
function find_schedule_by_id($id) {
    global $connection;
    
    $safe_id = mysqli_real_escape_string($connection, $id);
    
    $query  = "SELECT * ";
    $query .= "FROM schedule_class ";
    $query .= "WHERE id = {$safe_id} ";
    $query .= "LIMIT 1";
    $set = mysqli_query($connection, $query);
    confirm_query($set);
    if($schedule = mysqli_fetch_assoc($set)) {
        return $schedule;
    } else {
        return null;
    }
    }

function find_course_by_id($course_id) {
        global $connection;

        $safe_course_id = mysqli_real_escape_string($connection, $course_id);

        $query  = "SELECT * ";
        $query .= "FROM courses ";
        $query .= "WHERE id = {$safe_course_id} ";
        $query .= "LIMIT 1";
        $course_set = mysqli_query($connection, $query);
        confirm_query($course_set);
        if($course = mysqli_fetch_assoc($course_set)) {
            return $course;
        } else {
            return null;
        }
    }

function find_department_by_name($department_name) {
        global $connection;
        
        $safe_department_name = mysqli_real_escape_string($connection, $department_name);
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "WHERE name = '{$safe_department_name}' ";
        $query .= "LIMIT 1";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        if($department = mysqli_fetch_assoc($department_set)) {
            return $department;
        } else {
            return null;
        }
    }
function find_department_by_id($department_id) {
        global $connection;
        
        $safe_department_id = mysqli_real_escape_string($connection, $department_id);
        
        $query  = "SELECT * ";
        $query .= "FROM department ";
        $query .= "WHERE id = {$safe_department_id} ";
        $query .= "LIMIT 1";
        $department_set = mysqli_query($connection, $query);
        confirm_query($department_set);
        if($department = mysqli_fetch_assoc($department_set)) {
            return $department;
        } else {
            return null;
        }
    }
function find_designation($code) {
    if ($code==0)
    return 'Worker';
    elseif($code==1)
    return 'Manager';
    else
    return 'Undefiled';}
function find_all_users() {
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "ORDER BY full_name ASC";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

function find_user_by_id($user_id) {
        global $connection;
        
        $safe_user_id = mysqli_real_escape_string($connection, $user_id);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE id = {$safe_user_id} ";
        $query .= "LIMIT 1";
        $user_set = mysqli_query($connection, $query);
        confirm_query($user_set);
        if($user = mysqli_fetch_assoc($user_set)) {
            return $user;
        } else {
            return null;
        }
    }



function find_user_by_username($username) {
        global $connection;
        
        $safe_username = mysqli_real_escape_string($connection, $username);
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE username = '{$safe_username}' ";
        $query .= "LIMIT 1";
        $admin_set = mysqli_query($connection, $query);
        confirm_query($admin_set);
        if($admin = mysqli_fetch_assoc($admin_set)) {
            return $admin;
        } else {
            return null;
        }
    }
function no_of_users(){
        global $connection;
        
        $query  = "SELECT COUNT('id') ";
        $query .= "FROM users ";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;
    }

function find_users_from($start,$end){
        global $connection;
        
        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "ORDER BY full_name ASC " ;
        $query .= "LIMIT {$start},{$end}";
        $users_set = mysqli_query($connection, $query);
        confirm_query($users_set);
        return $users_set;}


?>