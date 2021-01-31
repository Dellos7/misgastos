<?php if( isset( $_SESSION['error'] ) ): ?>

    <div class="error-alert"> <?= $_SESSION['error'] ?> </div>

    <?php SessionUtils::remove('error'); ?>

<?php endif; ?>
