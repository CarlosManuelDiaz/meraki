<?php
include "../config/config.php";
include '../class/taskClass.php';
$taskClass = new taskClass();
    $user_id=@$_POST['uid'];
    $task_name=@$_POST['task_name'];
    $task_start_date=@$_POST['date_start'];
    $task_final_date=@$_POST['date_end'];
    $task_description=@$_POST['task_description'];
    $newTask = $taskClass->newTask($user_id,$task_name,$task_start_date,$task_final_date,$task_description);


        

