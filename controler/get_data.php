<?php
      include 'config.php';

      if ($_POST['action'] == "pre") {
           $id = $_POST['fingerID'];
           $query ="SELECT * FROM `agent_log`, agents WHERE  agent_log.agent_id = agents.id AND agents.fnger_id = $id AND agent_log.checkindate = CURDATE()";
           $result = $conn->query($query);
        //    var_dump($result);
           if ($result->num_rows == 0) {
            $agent_id = getid($_POST['fingerID']);

            if ($agent_id) {
                $query = "INSERT INTO `agent_log` (`id_user_log`, `checkindate`, `agent_id`, `time_int`) VALUES (NULL, CURDATE(), '$agent_id', CURTIME());";
                $result = $conn->query($query);
                echo 1;
            }
            else
            {
                echo 3;
            }
           }
           else
           {
              $agent_id = getid($_POST['fingerID']);
              $query = "UPDATE `agent_log` SET `time_out` = CURTIME() WHERE `agent_log`.`id_user_log` =  '$agent_id'";
              $result = $conn->query($query);
              echo 2;
           }
       }
      elseif ($_POST['action'] == "checkadd") {
          $qrt = "SELECT fnger_id FROM `agents` WHERE add_state = 1";
          $result = $conn->query($qrt);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
              echo "add-id".$row['fnger_id'];
          }else
          {
            echo 'Nothing';
          }
      }
      elseif($_POST['confirm_id'])
      {
         $id = $_POST[confirm_id];
         $qrt = "UPDATE `agents` SET `add_state` = '0' WHERE `agents`.`fnger_id` = '$id'";
         $result = $conn->query($qrt);
         if($result)
         {
            echo "confirm";
         }
      }
    //   elseif ($_POST['action'] == "confirm") {
    //     echo "confirm add";
    //   }
    // elseif ($_POST['action'] == "check_dell") {
    //     echo "check dell";
    //  }
   
     function getid($fid)
     {
        include 'config.php';
        $query ="SELECT * FROM agents WHERE fnger_id = $fid";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id'];
        }
        else
        {
            return 0;
        }
     }
?>