<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Student CRUD System</title>

<style>
body{
    font-family: Arial;
    background:#f2f2f2;
}
.container{
    width:80%;
    margin:auto;
}
h1{
    text-align:center;
}
form{
    background:white;
    padding:20px;
    border-radius:5px;
}
input{
    width:100%;
    padding:10px;
    margin:5px 0;
}
button{
    padding:10px;
    background:green;
    color:white;
    border:none;
}
table{
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
}
th,td{
    border:1px solid #ddd;
    padding:10px;
}
th{
    background:#007bff;
    color:white;
}
</style>
</head>

<body>

<div class="container">
<h1>🎓 Student Management System</h1>

<form method="POST">
<input type="text" name="name" placeholder="Enter Name" required>
<input type="email" name="email" placeholder="Enter Email" required>
<input type="text" name="mobile" placeholder="Enter Mobile" required>
<input type="text" name="dept" placeholder="Department" required>
<button name="save">Add Student</button>
</form>

<?php
if(isset($_POST['save'])){
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$dept=$_POST['dept'];

mysqli_query($conn,"INSERT INTO student(name,email,mobile,department)
VALUES('$name','$email','$mobile','$dept')");
}
?>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Department</th>
<th>Action</th>
</tr>

<?php
$result = mysqli_query($conn,"SELECT * FROM student");
while($row=mysqli_fetch_assoc($result)){
?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['mobile'] ?></td>
<td><?= $row['department'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
</td>
</tr>

<?php } ?>

</table>
</div>

</body>
</html>