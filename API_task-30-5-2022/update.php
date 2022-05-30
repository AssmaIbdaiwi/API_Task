<?php

$db = new PDO("mysql:host=localhost;dbname=api", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$id=$_GET['id']??null;
 #for sure use post
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name=$_POST['name'];
  $age=$_POST['age'];
  $address=$_POST['address'];
    
 #for not add empty value;
$statement=$db->prepare("UPDATE users SET name=:name,age=:age,address=:address");
 $statement->bindValue(':name',$name);
 $statement->bindValue(':age',$age);
 $statement->bindValue(':address',$address);
 $statement->execute();


  
echo '

<script>
window.location.href="select.php"

</script>';

}


echo '<div class="updatecatformbox"><div class="updateform">';



?>

 <form  method="post" >
 <div class="form-group">
      <label> Name</label>
      <input  type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label> Age</label>
      <input  type="text" class="form-control" name="age">
    </div>
    <div class="form-group">
      <label> Address</label>
      <input  type="text" class="form-control" name="address">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  
<a href="select.php"class="btn btn-secondary">Go back to users</a>

  </form></div></div>
 