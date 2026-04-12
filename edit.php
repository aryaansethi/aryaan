<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM student WHERE id=$id"));

if(isset($_POST['update'])){
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$dept=$_POST['dept'];

mysqli_query($conn,"UPDATE student SET
name='$name',
email='$email',
mobile='$mobile',
department='$dept'
WHERE id=$id");

header("Location:index.php");
}
?>

<h2>Edit Student</h2>

<form method="POST">
<input type="text" name="name" value="<?= $data['name'] ?>">
<input type="email" name="email" value="<?= $data['email'] ?>">
<input type="text" name="mobile" value="<?= $data['mobile'] ?>">
<input type="text" name="dept" value="<?= $data['department'] ?>">
<button name="update">Update</button>
</form>