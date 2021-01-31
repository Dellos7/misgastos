<?php if( SessionUtils::checkUser() ):?>
    <div class="add-gasto">
        <div class="add-gasto__title">
            <h2>Añadir gasto</h2>
        </div>
        <form class="add-gasto__form" method="post" action="<?=BASE_URL?>gastos/add">
            <div class="add-gasto__form-item add-gasto__form-item--name">
                Nombre: 
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--value">
                <input type="text" name="nombre" required>
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--name">
                Descripción: 
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--value">
                <textarea name="descripcion" required></textarea>
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--name">
                Coste: 
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--value add-gasto__form-item--value__coste">
                <input type="decimal" name="coste" required>
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--name">
                Fecha: 
            </div>
            <div class="add-gasto__form-item add-gasto__form-item--value">
                <input type="date" name="fecha" required>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('[name="fecha"]').valueAsDate = new Date();
    </script>
<?php else: Utils::err403()?>
<?php endif; ?>