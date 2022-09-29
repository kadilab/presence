<?php
   include 'config.php';
   $query = "SELECT * FROM `agents`";
   $result = $conn->query($query);
   $i = 1;
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<tr>
    <th scope="row"><?=$i?></th>
    <td><?=$row['nom']?></td>
    <td><?=$row['postnom']?></td>
    <td><?=$row['prenom']?></td>
    <td><?=$row['genre']?></td>
    <td><?=$row['start_date']?></td>
    <td>
        <?php if($row['add_state'] == 1){?>
            <span class="badge bg-danger">Non confirmer</span>
        <?php }else{?>
            <span class="badge bg-success">Confirmer</span>
        <?php }?>
    </td>
</tr>
<?php
  }}
?>