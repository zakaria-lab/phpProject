<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="login style.css">
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form action="" method="POST"> <!-- Formulaire pour envoyer les données en POST -->
        <div class="textbox">
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="textbox">
          <input type="password" placeholder="Password" name="password" required>
        </div>

        <input type="submit" class="btn" value="Sign in">
      </form>
    </div>

    <?php
    session_start();

    // Vérifier les informations d'identification fournies par l'utilisateur
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        // Connexion réussie, on enregistre le nom d'utilisateur dans la session
        $_SESSION['username'] = $user;
        
        // Redirection vers la page d'accueil
        header("Location: index.php");
        exit();
    }
    ?>
  </body>
</html>
