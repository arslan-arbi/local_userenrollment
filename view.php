<?php

require_once('../../config.php');

use local_userenrollment\render\renderer;

$courseId = required_param('id', PARAM_INT);

require_login();
$PAGE->set_url('/local/usersenrollment/view.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_title("user enrollment");

$PAGE->set_heading("Users");


echo $OUTPUT->header();

$context = context_course::instance(2);
$users = get_enrolled_users($context);

// $table = new html_table();
// $table->head = array("Firstname", "Lastname");
// $table->data = array();

renderer::render($users);

echo $OUTPUT->footer();