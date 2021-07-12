<?php
/**
 * Plugin Name:       Wild Student Management
 * Description:       Un plugin pour gérer des étudiants
 */


 if(is_admin()) {
     require_once('admin/wild-student-management-admin.php');
 }