<?php

include 'Action.php';
include 'TaskManagerDAO.php';

class Action_DisplayList {

    public function mainform($request) {
        header("Location: tasklist.php");
    }

}
