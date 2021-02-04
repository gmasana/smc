<div class="container-fluid bg-color-1 pt-4 pb-4">   
    <div class="cont_form">
        <?php
        if (isset( $_GET["rta"]) ) {
            echo MostrarMensaje( $_GET["rta"] );
        }
        ?>
        <h2 class="text-color-1 mb-3" style="margin-left: 10%;">Dejanos tu consulta</h2>
        <form action="mail/mail.php" class="form_datos" method="post">
            
            <input type="text" name="nom_ape" required placeholder="Nombre y Apellido"><br>
            <input type="email" name="email" required placeholder="E-mail" required><br>
            <input type="tel" name="telefono" required placeholder="Teléfono"><br>
            <textarea name="comentarios" placeholder="Comentario" maxlength="250" cols="50" rows="5"></textarea>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div>
</div>