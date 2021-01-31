<?php if( $user = SessionUtils::get('user') ):?>
    <div class="profile-info">
        <div class="profile-info__title">
            <h2>Perfil</h2>
        </div>
        <div class="profile-info__info">
            <div class="profile-info__info--item profile-info__info--item-name">
                Nombre:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <?= $user->name ?>
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Apellidos:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <?= $user->lastName ?>
            </div>
            <div class="profile-info__info--item profile-info__info--item-name">
                Email:
            </div>
            <div class="profile-info__info--item profile-info__info--item-value">
                <?= $user->email ?>
            </div>
        </div>
        <form class="profile-show__edit-btn" method="get" action="<?=BASE_URL?>user/profile/edit">
            <button type="submit" class="boton1">Editar</button>
        </form>
    </div>
<?php else: Utils::err403()?>
<?php endif; ?>