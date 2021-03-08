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
   <title>Register</title>
</head>

<body class="bg-light">
   <div style="height: 100vh;">
      <div class="row h-100 m-0">
         <div class="card w-25 my-auto mx-auto">
            <div class="card-header bg-white border-0">
               <h1 class="text-center">REGISTER</h1>
            </div>
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

                  <button type="submit" name="btn_register" value="register" class="btn btn-success btn-block">Register</button>

                  <!-- Link to index.php / login page -->
                  <p class="text-center mt-3">Registered already? <a href="../views/">Log in.</a></p>
               </form>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>