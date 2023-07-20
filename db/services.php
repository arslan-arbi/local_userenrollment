<?php

defined('MOODLE_INTERNAL') || die();

$functions = array(
    'local_usersenrollment_get_users' => array(
        'classname' => 'local_usersenrollment_external',
        'methodname' => 'get_course_enrolled_users',
        'classpath' => 'local/usersenrollment/externallib.php',
        'description' => 'Get Users enrolled in specific course.',
        'capabilities' => 'webservice/restful:use',
        'type' => 'read',
        'ajax' => true,
    )
);

$services = array(
    'Hirestream User Services' => array(
        'functions' => array(
            'local_usersenrollment_get_users',
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname' => 'user_services'
    )
);
