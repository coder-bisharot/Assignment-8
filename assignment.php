<!DOCTYPE html>
<html>
  <head>
    <title>Registration and Login Forms</title>
  </head>
  <body>
    <h1>Registration Form</h1>
    
    <form method="post" action="">
      <label for="first_name">First Name:</label>
      <input type="text" id="first_name" name="first_name" required><br><br>
      <label for="last_name">Last Name:</label>
      <input type="text" id="last_name" name="last_name" required><br><br>
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      <label for="confirm_password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required><br><br>
      <input type="submit" value="Register">
    </form>
    
    <?php
    // Check if the registration form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Retrieve the values of the form fields
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      
      // Validate the form data
      $errors = array();
      if (empty($first_name)) {
        $errors[] = "First name is required.";
      }
      if (empty($last_name)) {
        $errors[] = "Last name is required.";
      }
      if (empty($email)) {
        $errors[] = "Email address is required.";
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email address is not valid.";
      }
      if (empty($password)) {
        $errors[] = "Password is required.";
      }
      if (empty($confirm_password)) {
        $errors[] = "Confirm password is required.";
      } else if ($password != $confirm_password) {
        $errors[] = "Passwords do not match.";
      }
      
      // Display any validation errors or a confirmation message
      if (count($errors) > 0) {
        echo "<h2>Validation Errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
          echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
      } else {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Welcome, " . $first_name . " " . $last_name . ".</p>";
      }
    }
    ?>
    
    <hr>
    
    <h1>Login Form</h1>
    
    <?php
    // Check if the login form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Retrieve the values of the form fields
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      // Validate the form data
      $errors = array();
      if (empty($email)) {
        $errors[] = "Email address is required.";
      }
      if (empty($password)) {
        $errors[] = "Password is required.";
  }
  
  // Display any validation errors or attempt to log in
  if (count($errors) > 0) {
    echo "<h2>Validation Errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
      echo "<li>" . $error . "</li>";
    }
    echo "</ul>";
  } else {
    // Attempt to log in
    // Replace this with your own logic for checking the credentials
    if ($email == 'example@example.com' && $password == 'password') {
      // Redirect to the welcome page and display the first name
      $first_name = 'Example';
      header("Location: welcome.php?name=" . urlencode($first_name));
      exit();
    } else {
      // Display an error message if the credentials are invalid
      echo "<h2>Login Failed:</h2>";
      echo "<p>The email address or password you entered is incorrect.</p>";
    }
  }
}
?>

<form method="post" action="">
  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email" required><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" value="Login">
</form>
