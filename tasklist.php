<!DOCTYPE html>
<?php include 'TaskManagerDAO.php'; ?>
<?php include 'Task.php'; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

        <script src="jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
        <script src="JS_task_manager.js" type="text/javascript"></script>
        <style>
            #left {float: left; margin-right: 40px;}
            #right {float: left;}
            div {font-size: 25px;}
            input {font-size: 25px;}
            h1  {margin-left: 520px;}
        </style>
        <title>Task Manager</title>
    </head>
    <body>
        <h1>Task Manager</h1>
        <form>
            <div id="left">
                <table border="1" id="tableList">
                    <thead>
                        <tr> <th width="25px"></th> <th>Description</th> <th>Type</th> <th>Due Date</th> </tr>        
                    </thead>
                    <tbody id="tasks">
                        <?php
                        $dao = new TaskManagerDAO();
                        $tasks = $dao->getTaskList();

                        foreach ($tasks as $task) {
                            echo "<tr>";
                            $tmp = 'taskidx' . $task->id;
                            echo "<td><input type='checkbox' name='taskid[]' class='taskids' id=$tmp value= $task->id></td>";
                            echo "<td>$task->description</td>";
                            echo "<td>$task->type</td>";
                            echo "<td>$task->datedue</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="right"> 
                <input type="button" name="cmd" value="Add" id="addButton" onclick="addTask()">
                <input type="button" name="cmd" value="Delete" id="delButton" onclick="delTask()">
                <br/>
                <br/>
                Description: <input type="text" name="description" id="desc">
                <br/>
                <br/>
                Due Date: <input type="date" name="datedue" id="date">
                <br/>
                <br/>
                Type: <select name="type" id="type">
                    <option value="NextAction">NextAction</option>
                    <option value="WaitingFor">WaitingFor</option>
                    <option value="Someday/Maybe">Someday/Maybe</option>
                    <option value="TalkTo">TalkTo</option>
                    <option value="Future">Future</option>
                    <option value="Location">Location</option>
                </select>
                <input type="text" name="more"id="more" value="">
                <br/>
            </div>


        </form>
    </body>
</html>

