<?php
include 'Action.php';
include 'TaskManagerDAO.php';
//Hi I hope you enjoy it
class Action_Delete implements Action {
    public function execute($request) {
    //    echo 'Delete Function';
        $dao = new TaskManagerDAO();
        $lst = $request->get("taskid");
        foreach ($lst as $id) {
            $dao->deleteTask($id);
            ///This is going to be a long night :)
        }
        //Hahhahahahahhahaha
        header("Location: tasklist.php"); 
    }

}
