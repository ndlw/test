<?php 
class student_management_active{
    
    public function __construct() {
        add_action( 'admin_head', array($this, 'add_file_css') );
    }

    public function active() {
        global $wpdb;
        $this->create_teacher_table($wpdb);
        $this->create_student_table($wpdb);
        $this->create_subject_table($wpdb);

    }

    public function create_student_table($wpdb) {
        $table_name = $wpdb->prefix."student_mg";
        if( $wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name ) {
            $sql = "CREATE TABLE `".$table_name."` (
                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(50) DEFAULT NULL,
                    `date` date DEFAULT NULL,
                    `teach_id`  int(10) unsigned,
                    `subject_id` int(10) unsigned,
                    PRIMARY KEY(`id`),
                    FOREIGN KEY(`teach_id`) REFERENCES ".$wpdb->prefix."teach_mg(`id`),
                    FOREIGN KEY(`subject_id`) REFERENCES ".$wpdb->prefix."subject_mg(`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
            require_once ABSPATH.'/wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }
    }

    public function create_teacher_table($wpdb) {
        $table_name = $wpdb->prefix."teach_mg";
        if( $wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name ) {
            $sql = "CREATE TABLE `".$table_name."` (
                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(50) DEFAULT NULL,
                    `subject_id` int(10) unsigned,
                    PRIMARY KEY(`id`),
                    FOREIGN KEY(`subject_id`) REFERENCES ".$wpdb->prefix."subject_mg(`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
            require_once ABSPATH.'/wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }
    }
    public function create_subject_table($wpdb) {
        $table_name = $wpdb->prefix."subject_mg";
        if( $wpdb->get_var("SHOW TABLES LIKE '".$table_name."'") != $table_name ) {
            $sql = "CREATE TABLE `".$table_name."` (
                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(50) DEFAULT NULL,
                    PRIMARY KEY(`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
            require_once ABSPATH.'/wp-admin/includes/upgrade.php';
            dbDelta($sql);
        }
    }

    public function add_file_css() {
        wp_enqueue_style( 'bootstrap', ZEND_MP_CSS_DIR.'/bootstrap.min.css', array(), '1.0', 'all' );
    }
}