<?php ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="/misgastos/">
    <title>Mis Gastos</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gastos.css">
</head>
<body>
    <?php if( $user = SessionUtils::get('user') ): ?>
        <nav class="nav" id="nav">
            <div class="nav__logo"><span class="nav__logo--text">Mis gastos</span></div>
            <ul>
                <li><a href="<?=BASE_URL?>dashboard">Dashboard</a></li>
                <li><a href="<?=BASE_URL?>gastos">Gastos</a></li>
                <li><a href="<?=BASE_URL?>user/profile/show">Perfil</a></li>
            </ul>
            <div class="nav__session-info">
                <div class="nav__session-info--user">Hola, <?= $user->name ?></div>
                <form class="nav__session-info--logout" method="get" action="<?=BASE_URL?>user/logout">
                    <button class="boton1" type="submit">Logout</button>
                </form>
            </div>
            </div>
        </nav>
    <?php endif; ?>