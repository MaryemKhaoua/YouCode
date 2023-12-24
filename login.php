<?php

include 'User.php'; // Assuming User.php contains your User class

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $_POST['submit'] === 'register') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You might want to perform additional validation and sanitization here

    $user = new User(); // Create an instance of the User class
    $result = $user->register($nom, $prenom, $email, $password);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Registration failed!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<center>
    <h1 class='mt-5'>Sign Up Form</h1>
  
</center>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center">Sign Up</h2>
          </div>
          <div class="card-body">
            <form action='user.php' method='POST'>
                
              <div class="form-group">
                <label for="firstName">Nom</label>
                <input type="text" class="form-control" id="firstName" name='nom'>
              </div>
              <div class="form-group">
                <label for="lastName">Prenom</label>
                <input type="text" class="form-control" id="lastName" name='prenom'>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name='email'>
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name='password'>
              </div>
              <!-- <input type="hidden" value='3' name='id_role' > -->
              <button type="submit" name='submit' value='register' class="btn btn-primary btn-block">S'inscrire</button>
            </form>
            <p class='mt-3'>
              vous avez déjà un compte ? 
              <a href="login.php">Se connecter</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>