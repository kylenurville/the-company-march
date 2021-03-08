<?php
require_once "database.php";

class User extends Database {
   public function login($username, $password){
      $sql = "SELECT id, username, `password` FROM users WHERE username = '$username'";

      $result = $this->conn->query($sql);
      // 1. If the username exists
      // 2. If the password is correct. Compare the login password to database password
      if($result->num_rows == 1){
         // Existing
         $user_details = $result->fetch_assoc();
         // print_r($user_details);
         // $user_details is an associative array of the result set
         if(password_verify($password, $user_details['password'])){
            // Correct password
            session_start();

            // Create session variables
            $_SESSION['user_id'] = $user_details['id'];
            // $_SESSION['user_id'] = 5;
            $_SESSION['username'] = $user_details['username'];
            // $_SESSION['username'] = "john";

            header("location: ../views/dashboard.php");
            exit;
         } else {
            // Incorrect password
            echo "The username or password you entered is incorrect";
         }
      } else {
         // Not existing
         echo "The username or password you entered is incorrect";
      }
   }

   public function createUser($first_name, $last_name, $username, $password, $origin){
      $sql = "INSERT INTO users (first_name, last_name, username, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

      if($this->conn->query($sql)) {
         if($origin == "register"){
            header("location: ../views"); // go to index.php / login page
            exit;
         } elseif($origin == "dashboard"){
            header("location: ../views/dashboard.php");
            exit;
         }
      } else {
         die("Error creating user: " . $this->conn->error);
      }
   }

   public function getUsers(){
      $sql = "SELECT id, first_name, last_name, username FROM users";

      if($result = $this->conn->query($sql)){
         return $result;
         // return the entire result set if expecting many rows
      } else {
         die("Error retrieving users: " . $this->conn->error);
      }
   }

   public function getUser($user_id){
      $sql = "SELECT id, first_name, last_name, username FROM users WHERE id = $user_id";

      if($result = $this->conn->query($sql)){
         return $result->fetch_assoc();
         // Use fetch_assoc() since we're expecting 1 row only.
         // return an associative array
      } else {
         die("Error retrieving user: " . $this->conn->error);
      }
   }

   public function updateUser($user_id, $first_name, $last_name, $username){
      $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

      if($this->conn->query($sql)){
         header("location: ../views/dashboard.php");
         exit;
      } else {
         die("Error updating user: " . $this->conn->error);
      }
   }

   public function deleteUser($user_id){
      $sql = "DELETE FROM users WHERE id = $user_id";

      if($this->conn->query($sql)){
         header("location: ../views/dashboard.php");
         exit;
      } else {
         die("Error deleting user: " . $this->conn->error);
      }
   }
}