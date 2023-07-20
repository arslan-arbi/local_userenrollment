<?php

require_once(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/externallib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->dirroot.'/course/lib.php');

class local_usersenrollment_external extends external_api {

    public static function get_course_enrolled_users_parameters() {
        return new external_function_parameters(
            array(
                'courseId' => new external_value(PARAM_TEXT, 'courseid'),
            )
        );
    }
    public static function get_course_enrolled_users($courseId) {   
        
        $context = context_course::instance($courseId);
        $users = get_enrolled_users($context);

        $userInfo = array();
        foreach ($users as $user) {
            $userInfo[] = array(
                "name" => $user->firstname . ' ' . $user->lastname
            );
        }

        return array(
            "status" => 'success',
            'data' => $userInfo
        );
    }

    public static function get_course_enrolled_users_returns() {
        return new external_single_structure(
            array(
                'status' => new external_value(PARAM_TEXT, 'response status'),
                'data' => new external_multiple_structure(
                    new external_single_structure([
                            'name' => new external_value(PARAM_TEXT, 'Name of the user.'),
                        ]
                    ), 'List of users enrolled in the course fields', VALUE_OPTIONAL
                )
            )
        );
    }

    
}
