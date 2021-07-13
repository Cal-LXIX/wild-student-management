<?php
/**
 * Plugin Name:       Wild Student Management
 * Description:       Un plugin pour gérer des étudiants
 */

function wildStuMgmtActivation() {
    global $wpdb;

    $wpdb->query("
        CREATE TABLE {$wpdb->prefix}student(
            id int primary key auto_increment,
            lastname varchar(100),
            firstname varchar(100)
        );
    ");

}

register_activation_hook( __FILE__, 'wildStuMgmtActivation' );


function wildStuMgmtDeactivation() {
    global $wpdb;

    $wpdb->query("
        DROP TABLE {$wpdb->prefix}student;
    ");
}

register_deactivation_hook( __FILE__, 'wildStuMgmtDeactivation' );


 if(is_admin()) {
     require_once('admin/wild-student-management-admin.php');
 }