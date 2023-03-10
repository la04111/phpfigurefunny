<?php 
// class adminController{
//     public function __construct()
//     { 
//     }
// }
include '../view_admin/index_admin.php';
?>
<!-- class AdminModel {
    public function loginUser($username, $password) {
        // Perform login logic here...
        // For example:
        if ($username === 'admin' && $password === 'password') {
            header('Location: http://localhost:3000/MVC/view/dashboard.php');
            exit;
        } else {
            echo 'Invalid credentials!';
        }
    }
}

$temp = new AdminModel();

if(!empty($_GET['controller']) && $_GET['controller'] === 'ha'){
    $temp->loginUser($_POST['username'], $_POST['password']);
} -->
<!-- <form action="http://localhost:3000/MVC/controller/adminController.php?controller=ha" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username">
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <button type="submit">Log in</button>
</form> -->