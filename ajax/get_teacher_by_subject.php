<?php 
class student_getTeacher {

    public function __construct() {
        
        add_action('admin_enqueue_scripts', array($this, 'add_file_js'));
        add_action( 'wp_ajax_get_teacher', array($this, 'get_teacher') );

    }

    //Function ajax
    public function get_teacher() {
        $subject_id  = $_POST['subject_id'];
        $teachers    = $this->get_teachers_by_subject($subject_id);
        wp_send_json_success(array('teachers' => $teachers));
       
    }

    //Get teacher
    public function get_teachers_by_subject( $id ) {
        global $wpdb;
        $table_name = $wpdb->prefix. 'teach_mg';
        $sql        =   $wpdb->prepare(
                        "SELECT * FROM {$table_name} WHERE subject_id = %d",
                        $id
                        );
                 
        $teachers   = $wpdb->get_results($sql);
        return $teachers;

    }

    // Add file js
    public function add_file_js() {
        wp_register_script( 'get_tacher', ZEND_MP_JS_DIR.'/ajax.js', array('jquery'), '1.0' );
        wp_enqueue_script('get_tacher');
    }
}