<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>😎login😎</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();

// Fonction de déconnexion
function logout()
{
    // Détruire toutes les variables de session
    $_SESSION = array();

    // Détruire la session
    session_destroy();

    // Redirection vers la page de connexion (ou autre page)
    header("Location: connection.php");
    exit();
}

// Appel de la fonction de déconnexion si le paramètre "logout" est présent dans l'URL
if (isset($_GET['logout'])) {
    logout();
}

// Vérification du statut de l'utilisateur et récupération des informations
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
                    <?php if ($estAdmin) : ?>
                        <li><a href="admin.php">Espace d'administration</a></li>
                    <?php endif; ?>
                    <li><a href="?logout=true">Déconnexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>je suis la page de l'admin</h1>
    </main>
    <footer>
        <p>je suis le footer</p>
    </footer>
</body>
