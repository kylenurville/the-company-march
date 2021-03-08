<?php
session_start();
include "../classes/user.php";

$user = new User;
$user_list = $user->getUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="Description" content="Enter your description here" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <title>Dashboard</title>
</head>

<body>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a href="dashboard.php" class="navbar-brand">
         <h1 class="h3">The Company</h1>
      </a>

      <div class="ml-auto">
         <!-- ul.navbar-nav>(li.nav-item>a.nav-link)*2 -->
         <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link">Username: <?= $_SESSION['username'] ?></a></li>
            <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
         </ul>
      </div>
   </nav>

   <main class="container" style="padding-top: 80px;">
      <div class="row">
         <div class="col-6">
            <div class="card">
               <div class="card-body">
                  <form action="../actions/register.php" method="post">
                     <label for="first_name">First Name</label>
                     <input type="text" name="first_name" id="first_name" class="form-control mb-2" required autofocus>

                     <label for="last_name">Last Name</label>
                     <input type="text" name="last_name" id="last_name" class="form-control mb-2" required>

                     <label for="username" class="font-weight-bold">Username</label>
                     <input type="text" name="username" id="username" class="form-control mb-2 font-weight-bold" maxlength="15" required>

                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="form-control mb-5" minlength="8" required>

                     <button type="submit" name="btn_register" value="dashboard" class="btn btn-success btn-block">Register</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-6">
            <h2 class="text-muted">User List</h2>
            <table class="table table-hover">
               <thead class="thead-light">
                  <tr>
                     <th>#</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Username</th>
                     <th></th> <!-- for the action buttons -->
                  </tr>
               </thead>
               <tbody>
                  <?php
                  // $user_list->fetch_assoc() - transform the result set/$user_list to an associative array
                  // $user is an associative array
                  while ($user = $user_list->fetch_assoc()) {
                  ?>
                     <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                           <a href="editUser.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                           <a href="../actions/removeUser.php?user_id=<?= $user['id'] ?>" class="btn btn-outline-danger btn-sm">Remove</a>
                        </td>
                     </tr>
                  <?php
                  }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </main>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>