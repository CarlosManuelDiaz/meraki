<?php
class taskClass
{
/* User Login */
    public function allTasksName($uid)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT task_name, task_start_date, task_final_date, task_description  FROM task");
            $stmt->bindParam("user_id", $uid, PDO::PARAM_INT);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data []= $row;
            }
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function allTasksUser($uid)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT task_name, task_start_date, task_final_date, task_description FROM task WHERE user_id=:user_id");
            $stmt->bindParam("user_id", $uid, PDO::PARAM_INT);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $data []= $row;
            }
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    function newTask($user_id,$task_name,$task_start_date,$task_final_date,$task_description){
        $db = getDB();
            $sql = "INSERT INTO task(user_id, task_name, task_start_date, task_final_date, task_description,task_status) VALUES (:user_id,:task_name,:task_start_date,:task_final_date,:task_description, :task_status)";
        $stmt= $db->prepare($sql);
        $stmt->execute([
        ':user_id' => $user_id,
        
        ':task_name' => $task_name,
        ':task_start_date' => $task_start_date,
        ':task_final_date' => $task_final_date,
        ':task_description' => $task_description,
        ':task_status' => "1",
    ]);
    header('Location: ../pages/profile.php');    
    }


    
}
