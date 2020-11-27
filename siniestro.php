<div class="container-fluid bg-color-1 pt-4 pb-4">
    <div class="cont_form">
        <h2 class="text-color-1" style="margin-left: 10%;">Contanos que te pasó,</h2>
        <h4 class="text-color-1" style="margin-left: 10%;">Nosotros nos ocupamos.</h4>
        <form action="" class="form_datos" method="get">
            
            <input type="text" name="nom_ape" required placeholder="Nombre y Apellido" id="inputselected"><br>
            <input type="email" name="mail" required placeholder="E-mail" required><br>
            <input type="tel" name="telefono" required placeholder="Teléfono"><br>
            <select name="riesgo">
                <option value="none">¿Cuál fue el problema?</option>
                <option value="ap">Accidentes Personales</option>
                <option value="art">ART</option>
                <option value="auto">Autos</option>
                <option value="bicicletas">Bicicletas</option>
                <option value="bolso">Bolso Protegido</option>
                <option value="caucion">Caución</option>
                <option value="hogar">Hogar</option>
                <option value="intcom">Integral de Comercio</option>
                <option value="intcon">Integral de Consorcio</option>
                <option value="vida">Vida</option>
                <option value="vcolec">Vida Colectivo</option>
                <option value="otro">Otro</option>
            </select>
            <textarea name="comentarios" placeholder="Escribe un mensaje aquí" maxlength="250" cols="50" rows="5"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</div>