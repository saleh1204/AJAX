<?php

class TaskManagerDAO {
    private $_mysqli;
    
    function __construct() {        
    }

    function __destruct() {
    }

    private function getDBConnection() {
        if (!isset($_mysqli)) {
            $_mysqli = new mysqli("localhost", "root", "nobody", "taskmanager");
            if ($_mysqli->errno) {
                printf("Unable to connect: %s", $_mysqli->error);
                exit();
            }
        }
        return $_mysqli;
    }

    public function getTaskList() {
        $lst = array();
        $con = $this->getDBConnection();
        $result = $con->query("SELECT id, description, type, duedate FROM task ORDER BY id");
        $i = 0;
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $lst[$i++] = new Task($row["id"],$row["description"], $row["type"], $row["duedate"]);
          // echo 'id= '+$row["id"] +"/t Description: "+$row["description"] +"/t Type: "+ $row["type"] + "/t DueDate: "+ $row["duedate"] ;
          //echo $row;
           // var_dump($row);
        }
        
        return $lst;
    }
    public function addTask($description, $type, $datedue, $more){
        $con = $this->getDBConnection();
        $tmp = "insert into task (description, type, duedate) values ('". $description . "', '" . $type ;//. "', '" . $datedue . "');";
        //$con->query($tmp);
        //$result = $con->query
        if ($type == "Location" || $type == "WaitingFor" || $type == "TalkTo")
        {
            $tmp = $tmp . ": " . $more . "', '";
            
        }
        else 
        {
            $tmp = $tmp . "', '";
        }
        if (isset($datedue))
        {
            $tmp = $tmp . $datedue . "');";
        }
        else
        {
            $tmp = $tmp . "'');";
        }
        $con->query($tmp);
        
    }
    public function deleteTask($id)
    {
        $con = $this->getDBConnection();
        $con->query("DELETE FROM task WHERE id='" . $id . "' ;");
        // "DELETE FROM songlist WHERE id ="+ $id

    }
    
}

?>
