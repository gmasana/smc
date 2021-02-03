<div class="container-fluid bg-color-1 pt-4 pb-4">
    <div class="cont_form">
        <h2 class="text-color-1" style="margin-left: 10%;">Contanos que te pasó,</h2>
        <h4 class="text-color-1" style="margin-left: 10%;">Nosotros nos ocupamos.</h4>
        <form action="mail/mail-s.php" class="form_datos" method="post">
            
            <input type="text" name="nom_ape" required placeholder="Nombre y Apellido" id="inputselected"><br>
            <input type="email" name="email" required placeholder="E-mail" required><br>
            <input type="tel" name="telefono" required placeholder="Teléfono"><br>
            <select name="riesgo">
                <option value="none">¿Cuál fue el problema?</option>
                <option value="Accidentes Personales">Accidentes Personales</option>
                <option value="ART">ART</option>
                <option value="Auto">Autos</option>
                <option value="Bicicletas">Bicicletas</option>
                <option value="Bolso Protegido">Bolso Protegido</option>
                <option value="Caucion">Caución</option>
                <option value="Hogar">Hogar</option>
                <option value="Integral de Comercio">Integral de Comercio</option>
                <option value="Integral de Consorcio">Integral de Consorcio</option>
                <option value="Vida">Vida</option>
                <option value="Vida Colectivo">Vida Colectivo</option>
                <option value="Otro">Otro</option>
            </select>
            <textarea name="comentarios" placeholder="Escribe un mensaje aquí" maxlength="250" cols="50" rows="5"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</div>