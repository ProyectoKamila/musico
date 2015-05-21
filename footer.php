<footer>
    <p>Copyrigth © 2015  musicodisponible . Todos los derechos reservados. <br> Desarrollado por <a href="<?php echo "http://www.wedomedia.net"; ?>">Wedomedia.net</a></p>
    <?php wp_footer(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        function load_form(variable) {
            //console.log('cargar formulario ' + variable);

            if (variable == 'musico') {
                $('#musico').addClass('active');
                $('#tocada').removeClass('active');
                d1 = 'musico';
                datos2 = " ";
                datos2 = d1;

            }
            if (variable == 'tocada') {
                $('#tocada').addClass('active');
                $('#musico').removeClass('active');
                d1 = 'tocada';
                datos2 = " ";
                datos2 = d1;

            }


        }
        $('#lupa').click(function () {
            element = document.getElementById('instrumento');
            element = element.value;
            element1 = document.getElementById('estado');
            element1 = element1.value;
            element2 = document.getElementById('ciudad');
            element2 = element2.value;
            element3 = document.getElementById('text');
            element3 = element3.value;

            var s = element + " " + element1 + " " + element2 + " " + element3;
            console.log(s);
            $('#s').attr('value', s);
            $('#fs').submit();
        });
    </script>
</footer>
</section>

</body>
</html>