<?php
/**
 * page d'erreur 404
 * @package Nathalie-mota
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - Erreur 404</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .error-message {
            font-size: 24px;
            margin-top: 100px;
        }
        .home-link {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="error-message">
        <p>Oups ! La page que vous recherchez est introuvable.</p>
        <p>Peut-être que les lutins l'ont cachée...</p>
    </div>
    <div class="home-link">
        <p><a href="<?php echo home_url(); ?>">Retour à la page d'accueil</a></p>
    </div>
</body>
</html>
