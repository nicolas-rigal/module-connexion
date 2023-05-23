<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>😎login😎</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
//initialisation de la session
session_start();
//verification du status de l'utilisateur et affichage en fonction du status 
function status()
{
    // Vérifier l'état de connexion
    $estConnecte = false;
    if (isset($_SESSION['estConnecte']) && $_SESSION['estConnecte'] === true) {
        $estConnecte = true;
    }

    // Vérifier le rôle de l'utilisateur
    $estAdmin = false;
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $estAdmin = true;
    }

    return array($estConnecte, $estAdmin);
}

list($estConnecte, $estAdmin) = status();

?>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (!$estConnecte) : ?>
                    <li><a href="connection.php">Login</a></li>
                    <li><a href="inscription">Sing up</a></li>
                <?php endif; ?>

                <?php if ($estConnecte) : ?>
                    <li><a href="profil.php">Profil</a></li>
                <?php endif; ?>

                <?php if ($estConnecte && $estAdmin) : ?>
                    <li><a href="admin.php">Espace d'administration</a></li>
                <?php endif; ?>

            </ul>
        </nav>
    </header>
    <main>
        <h1>je suis la page: de profil</h1>
    </main>
    <footer>
        <p>je suis le footer</p>
    </footer>
</body>

</html>
