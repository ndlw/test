<?php 
 class Student_MG_PLG {

    public function __construct() {
        add_action( 'admin_menu', array($this,'addStudentManage') );
        $this->getTeacherBySubject();

    }

    //Add menu page
    public function addStudentManage() {   

        $studentSlug = 'student-management';
        add_menu_page( 
                        'Student Management Title', 
                        'Register Student',
                        'manage_options', 
                        $studentSlug, 
                        array($this, 'StudentManage')
        );

        add_submenu_page( 
                        $studentSlug, 
                        'Show title', 
                        'Show Students', 
                        'manage_options', 
                        $studentSlug.'show', 
                        array($this, 'ShowStudent')
        );
    }

 
    public function StudentManage() {
        require_once ZEND_MP_VIEWS_DIR.'/create-student-mg.php';
    }

    //Show student
    public function getStudent() {
        global $wpdb;
        $student_table = $wpdb->prefix.'student_mg';
        $teacher_table = $wpdb->prefix.'teach_mg';
        $subject_table =  $wpdb->prefix.'subject_mg';
        $sql = "SELECT `".$student_table."`.*, 
                `".$teacher_table."`.name as teacher_name, 
                `".$subject_table."`.name as subject
                FROM `".$student_table."` 
                LEFT JOIN `".$teacher_table."` 
                ON `".$student_table."`.teach_id = `".$teacher_table."`.id
                LEFT JOIN `".$subject_table."` 
                ON `".$student_table."`.subject_id = `".$subject_table."`.id"
                ;

        $student_data = $wpdb->get_results($sql, OBJECT);
        return $student_data;
    }
    
    public function ShowStudent() {
        $students = $this->getStudent();
        require_once ZEND_MP_VIEWS_DIR.'/show-student-mg.php';
    }

    //Get teachcher by subject
    public function getTeacherBySubject() {
        require_once ZEND_MP_AJAX_DIR .'/get_teacher_by_subject.php';
        new student_getTeacher();
    }

    
    
 }