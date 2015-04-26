<?php

include 'Action.php';
include 'TaskManagerDAO.php';

class Action_DisplayList {
	//Hello I changed a little bit
    public function mainform($request) {
        header("Location: tasklist.php");
    }

}
