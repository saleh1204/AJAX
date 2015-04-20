<?php
include 'Action.php';
include 'TaskManagerDAO.php';

class Action_Delete implements Action {
    public function execute($request) {
    //    echo 'Delete Function';
        $dao = new TaskManagerDAO();
        $lst = $request->get("taskid");
        foreach ($lst as $id) {
            $dao->deleteTask($id);
        }
        
        header("Location: tasklist.php"); 
    }

}