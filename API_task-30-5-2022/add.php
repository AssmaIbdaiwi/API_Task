<?php
$db = new PDO("mysql:host=localhost;dbname=api", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>


<?php


if(isset($_POST['add'])){
  $name=$_POST['name'];
  $age=$_POST['age'];
  $address=$_POST['address'];
$statement=$db->prepare("INSERT INTO users (name,age,address)
VALUES (:name,:age,:address)
");
 $statement->bindValue(':name',$name);
 $statement->bindValue(':age',$age);
 $statement->bindValue(':address',$address);
 $statement->execute();




  if($statement){
    $alert=['done'];
  }else{
    $alert=['error'];
  }
  echo '</br>';
echo  json_encode($alert);




echo '

<script>
window.location.href="select.php"

</script>';
}
?>
