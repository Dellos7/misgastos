<?php ?>

<header class="header">
    <h1>Mis gastos</h1>
</header>

<form id="login-form" class="login-form" method="post" action="<?=BASE_URL?>user/login">
    <label for="email"></label>
    <input type="email" id="email" name="email" required class="login-form__input">
    <label for="password"></label>
    <input type="password" id="password" name="password" required class="login-form__input">
    <button type="submit" class="boton1 boton1-grande">Login</button>
</form>