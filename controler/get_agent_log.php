<?php
   include 'config.php';
   $ft = "";
   if(isset($_POST['date']) && $_POST['date'] != 'NaN-NaN-NaN')
   {
      $ft = "AND checkindate = '".$_POST['date']."'"; 
   }
   
   $query = "SELECT * FROM `agent_log` , agents WHERE agent_log.agent_id = agents.id ".$ft;
   $result = $conn->query($query);
   $i = 0;
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $i++;
?>
<tr>
    <th scope="row"><?=$i?></th>
    <td><?=$row['nom']?></td>
    <td><?=$row['postnom']?></td>
    <td><?=$row['prenom']?></td>
    <td><?=$row['checkindate']?></td>
    <td><?=$row['time_int']?></td>
    <td><?=$row['time_out']?></td>
    <td><i class="bi bi-calendar2-check-fill text-success"></i></td>
</tr>
<?php
  }}
  else{
?>
   <tr>
   <img src="assets/img/empty.webp" alt="" srcset="">
   </tr>
   
<?php
}
?>