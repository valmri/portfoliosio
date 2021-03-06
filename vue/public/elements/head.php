<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PortfolioSIO</title>
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/initialisation.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <?php if(isset($_SESSION['utilisateur'])) : ?>
    <link rel="stylesheet" href="./assets/css/admin.css" />
        <link rel="stylesheet" href="./assets/css/responsiveAdmin.css" />
    <?php endif; ?>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
</head>
<body>