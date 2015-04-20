<?php

include 'Action.php';
include 'TaskManagerDAO.php';

class Action_Add implements Action {

    public function execute($request) {
        $dao = new TaskManagerDAO();
        $description = $request->get("description");
        $duedate = $request->get("datedue");
        $type = $request->get("type");
        $more = $request->get("more");
        if ($description !== "") {
            $dao->addTask($description, $type, $duedate, $more);
        }
        header("Location: tasklist.php");
    }

}
