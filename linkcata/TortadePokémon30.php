<?php
include("conexion.php");
include("comentarios.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTPastry</title>
    <link rel="stylesheet" href="baseproducto.css">
    <link rel="stylesheet" href="../media/plgns catalogo/catalogo.css">
</head>

<body>
    <header>
        <h1 class="nombre-sitio">Tienda <span> UTPastry </span></h1>
    </header>
    <div id="encabezado">
        <div class="container">
            <nav>
                <a href="../index.html">Home</a>
                <a href="../nostros.html">Nosotros</a>
                <a href="../catalogo.html">Catalogo</a>
                <a href="../blog.html">Blog</a>
                <a href="../contacto.html">Contacto</a>
            </nav>
            <div class="two columns u-pull-right">
                <ul>
                    <li class="submenu">
                        <img src="media/cart.png" id="img-carrito" />
                        <div id="carrito">
                            <table id="lista-carrito" class="u-full-width">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <section id="purchasing-description">
        <div class="product-container">
            <div id="product-image" class="product-image">
                <img id="zoomImage" src="../media/Productos/torta-pokemon.png" alt="torta compromiso">
            </div>
            <div class="product-details">
                <h2>Torta Temática Pokémon: "Aventura en Cada Capa"</h2>
                <p>¡Embárcate en una emocionante expedición dulce con nuestra cautivadora Torta Temática Pokémon, una creación que captura la magia y la diversión del universo Pokémon en cada delicioso detalle!

                    La base de la torta, meticulosamente esculpida, transporta a los comensales al mundo de Pokémon con elementos emblemáticos como Pokébolas, Pikachu y otros adorables Pokémon. Cada capa de bizcocho, suave y deliciosa, es una capa de aventura que espera ser descubierta.

                    El exterior de la torta está cubierto con un glaseado vibrante que refleja la paleta de colores alegres y distintivos de Pokémon. Detalles como las figuras de Pokémon en fondant o creaciones de azúcar añaden autenticidad y un toque de diversión a la obra maestra.</p>
            </div>
        </div>
    </section>

    <div class="comentarios">
        <section>
            <h3>Valoraciones</h3>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required><br><br>

                <label for="comentario">Comentario:</label><br>
                <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>

                <label for="puntuacion">Puntuación (1-5 estrellas):</label><br>
                <select id="puntuacion" name="puntuacion" required>

                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>

                </select><br><br>


                <!-- Agrega un campo oculto para el ID de la página -->
                <input type="hidden" name="id_pagina" value="30">

                <button type="submit">Enviar Comentario</button>
            </form>

            <!-- Caja para mostrar las valoraciones y comentarios -->
            <div id="comentarios-container">
                <table>
                    <tr>
                        <!-- <th><h1>ID</h1></th> -->
                        <th>
                            <h4>Nombre</h4>
                        </th>
                        <th>
                            <h4>Comentario</h4>
                        </th>
                        <th>
                            <h4>Puntuación</h4>
                        </th>
                        <th>
                            <h4>Fecha de Publicación</h4>
                        </th>
                    </tr>

                    <?php
                    if ($result) {
                        while ($colum = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            // echo "<td><h2>" . $colum['id'] . "</h2></td>";
                            echo "<td><h4>" . $colum['nombre'] . "</h4></td>";
                            echo "<td><h4>" . $colum['comentario'] . "</h4></td>";
                            echo "<td><h4>" . $colum['puntuacion'] . "</h4></td>";
                            echo "<td><h4>" . $colum['fecha_publicacion'] . "</h4></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay comentarios disponibles.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
    </div>

    <section id="third">
        <div class="container">
            <div class="img-container"></div>
            <div class="texto">
                <h2>¡Cada Torta es única como tú!</h2>
                <p>"¡Cada Torta es única como tú! En UtepiPastry, no solo horneamos tortas deliciosas, sino que también
                    creamos obras de arte que reflejan tu estilo y personalidad. Cada torta está diseñada para ser tan
                    única como tú, con ingredientes frescos y una atención meticulosa a los detalles. ¡Celebra tus
                    momentos especiales con nuestras creaciones irresistibles!"</p>
            </div>
        </div>
    </section>

    <section id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15609.383060287677!2d-76.89472409956021!3d-12.019700311437994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c3c864ac48f5%3A0xed1bde4c798d786e!2sUTP!5e0!3m2!1ses-419!2spe!4v1694564427004!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <footer>
        <div class="container">
            <div id="c1">
                <div id="c1-1">
                    <h2>UTPastry</h2>
                    <p>Somos una pastelería dedicada a crear experiencias dulces y deliciosas para nuestros clientes.
                        Nuestra pasión por la repostería nos impulsa a explorar nuevas tendencias y sabores, y a
                        compartirlos contigo. En UTPastry, cada pastel es una obra maestra de sabor y diseño.
                        ¡Permítenos endulzar tus momentos especiales!</p>
                </div>
                <div id="c1-2">
                    <h2>ENLACES DE INTERÉS</h2>
                    <ul>
                        <li><a href="#">✔️ Suscríbete a nuestro Boletín</a></li>
                        <li><a href="#">✔️ Términos y Condiciones</a></li>
                        <li><a href="#">✔️ Servicio al Cliente</a></li>
                        <li><a href="#">✔️ Libro de Reclamaciones</a></li>
                        <li><a href="#">✔️ Trabaja con Nosotros</a></li>
                        <li><a href="#">✔️ Catálogo UTPastry</a></li>
                    </ul>
                </div>
            </div>
            <div id="c2">
                <p>&copy; 2023 UTPastry. Todos los Derechos Reservados.</p>
            </div>
        </div>
        <script src="baseproductos.js"></script>
        <script src="../menuEffects.js"></script>
    </footer>
</body>

</html>