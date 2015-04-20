<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'TaskManagerDAO.php';
include 'Task.php';
class Action_Ajax {
    public function getTasks($request){
        $dao = new TaskManagerDAO();
        $list = $dao->getTaskList();
        $tlist = json_encode($list);
        echo $tlist;
    }
    public function add($request)
    {
        $dao = new TaskManagerDAO();
        $description = $request->get("description");
        $duedate = $request->get("datedue");
        $type = $request->get("type");
        $more = $request->get("more");
        if ($description !== "") {
            $dao->addTask($description, $type, $duedate, $more);
        }
        $tmp = new Action_Ajax();
        $tmp->getTasks($request);
      //  $dao->addTask($description, $type, $datedue, $more);
    }
    public function delete($request)
    {
        $dao = new TaskManagerDAO();
        $lst = $request->get("taskid");
        foreach ($lst as $id) {
            $dao->deleteTask($id);
        }
        $tmp = new Action_Ajax();
        $tmp->getTasks($request);
    }
}
