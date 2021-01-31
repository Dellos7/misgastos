<?php if( isset( $_SESSION['success'] ) ): ?>

    <div class="success-alert"> <?= $_SESSION['success'] ?> </div>

    <?php SessionUtils::remove('success'); ?>

<?php endif; ?>
