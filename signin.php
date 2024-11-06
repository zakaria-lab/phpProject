<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <style>



body {
  background-image: url('860.jpeg'); /* Remplacez par le chemin de votre image */
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  animation: flow 15s ease-in-out infinite;
}

@keyframes flow {
  0% {
    background-position: 50% 0%;
  }
  50% {
    background-position: 50% 100%;
  }
  100% {
    background-position: 50% 0%;
  }
}
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-container {
            background-color: black;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #f4f4f4;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #f4f4f4;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

    <div class="signup-container">
        <h2>Inscription</h2>
        <?php
        $emailError = $passwordError = '';
        $isFormValid = true;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $emailValue = $_POST['email'];
            $passValue = $_POST['password'];

            if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $emailValue)) {
                $emailError = "L'e-mail n'est pas valide.";
                $isFormValid = false;
            }

            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $passValue)) {
                $passwordError = "Le mot de passe n'est pas assez fort.";
                $isFormValid = false;
            }


            if ($isFormValid) {
                header('Location:login.php');
                exit(); 
            }
        }

             



        
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
                <?php if (!empty($emailError)): ?>
                    <div class="error-message"><?php echo $emailError; ?></div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <?php if (!empty($passwordError)): ?>
                    <div class="error-message"><?php echo $passwordError; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="dob">Date de naissance</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" placeholder="0123456789">
            </div>
            <button type="submit">S'inscrire</button>
        </form>
    </div>

</body>
</html>
