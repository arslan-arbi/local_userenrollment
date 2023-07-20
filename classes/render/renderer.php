<?php

namespace local_userenrollment\render;

class renderer {

    public static function render($users) {

        global $OUTPUT;

        $count = 2;
        $usersData = array();
        foreach ($users as $user) {
            $usersData[] = array(
                "firstname" => $user->firstname,
                "lastname" => $user->lastname,
                "isEven" => $count % 2 == 0,
                "count" => 2
            );
            $count++;
        }

        // $table->data[] = $usersData;
        // echo html_writer::table($table);

        $data = array(
            "columns" => ["Firstname", "Lastname"],
            "users" => $usersData
        );

        echo $OUTPUT->render_from_template('local_userenrollment/users', $data);
    }

}