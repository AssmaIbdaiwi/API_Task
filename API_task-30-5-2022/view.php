<?php
$db = new PDO("mysql:host=localhost;dbname=api", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php

if(isset($_POST['search']))
{
$search = $_POST['id'] ?? '';

  $statement = $db->prepare('SELECT * FROM users WHERE id LIKE :id ');
  $statement->bindValue(':id', "%$search%");
  $statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);


#table
echo '<div class="tablecatbox"><div class="tablecat">
<h1 style="color:red">Users</h1>
 <table class="table table-striped">
<div class="table-responsive">
<thead>
  <tr>
   
    <th scope="col" >Name</th>
    <th scope="col">Age</th>
    <th scope="col">Adress</th>
  </tr>
</thead><tbody>';

foreach ($products as $i) {
  echo '       <tr>
         
            
            <td>' . $i['name'] . '</td>
            <td>' . $i['age'] . '</td>
            <td>' . $i['address'] . '</td>
      
            <td><a href="update.php?id=' . $i['id'] . '" type="button" class="btn btn-primary " >Edit</a></td>

            </td>
          </tr>';
}
echo  '</tbody>    </table></div></div></div>';

}
?>