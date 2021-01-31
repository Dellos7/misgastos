<?php if( $user = SessionUtils::get('user') ):?>
    <form class="profile-info" method="post" action="<?=BASE_URL?>user/profile/edit">
        <div class="profile-info__title">
            <h2>Perfil / Editar</h2>
        </div>
        <div class="profile-info__info">
            <div class="profile-info__info--item profile-info__info--item-name">
                Nombre:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <input type="text" name="name" required value="<?=$user->name?>">
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Apellidos:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
            <input type="text" name="last_name" required value="<?=$user->lastName?>">
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Email:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <input type="email" name="email" required value="<?=$user->email?>">
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Nueva contraseña:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <input type="password" name="password">
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Repite:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <input type="password" name="password_confirm">
            </div>
        </div>
        <div class="profile-show__edit-btn">
            <button type="submit" class="boton1">Guardar</button>
        </div>
    </form>
<?php else: Utils::err403()?>
<?php endif; ?>