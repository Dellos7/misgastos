<?php if( SessionUtils::checkUser() ):?>
    <div class="ultimos-gastos">
        <div class="ultimos-gastos__title">
            <h2>Últimos gastos</h2>
            <form class="ultimos-gastos__title-add" method="get" action="gastos/add">
                <button type="submit" class="boton1 boton1__secundario">Añadir</button>
            </form>
        </div>
        <div class="ultimos-gastos__suma">
            <?php
                $suma = 0;
                foreach( $gastos as $gasto ){
                    $suma += $gasto->coste;
                }?>
            <span style="font-weight: bold">Total:</span> <?= $suma ?>€
        </div>
        <!-- La variable $gastos la tenemos en el GastosController -->
        <?php foreach( $gastos as $gasto ): ?>
            <div class="ultimos-gastos__gasto">
                <div class="ultimos-gastos__gasto-nombre"><?= $gasto->nombre?></div>
                <div class="ultimos-gastos__gasto-coste"><?= $gasto->coste?>€</div>
                <div class="ultimos-gastos__gasto-descripcion"><?= $gasto->descripcion?></div>
                <div class="ultimos-gastos__gasto-fecha"><?= DateUtils::dateFormat( $gasto->fecha ) ?></div>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: Utils::err403()?>
<?php endif; ?>