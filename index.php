<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, beatae! Eos quos laudantium, maxime accusantium, quae, minima molestiae debitis voluptatem nostrum et nobis adipisci perspiciatis? Hic dolorem a modi amet!</p>
    </section>
    <!--seccion-->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay muted loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">

      </video>
        </div>
        <!--.contenedor-video-->

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del Evento</h2>

                    <?php
                        try {
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = " SELECT * FROM `categoria_evento` ";
                            $resultado = $conn->query($sql);
                        } catch (\Exception $e) {
                            echo $e->getMessage();
                        }
                    ?>

                    <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                            <a href="#<?php echo strtolower($categoria); ?>"><i class="fa <?php echo $cat['icono']; ?>"></i><?php echo $categoria; ?></a>
                        <?php } ?>
                        
                        
                    </nav>

                    <div id="talleres" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>HTML5, CSS y JS</h3>
                            <p><i class="fas fa-clock"></i>16:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Eliseo Vazquez Muñoz</p>
                        </div>

                        <div class="detalle-evento">
                            <h3>Responsive Web Design</h3>
                            <p><i class="fas fa-clock"></i>20:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Eliseo Vazquez Muñoz</p>
                        </div>

                        <a href="#" class="button float-right">Ver Todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="conferencias" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Como ser freelancer</h3>
                            <p><i class="fas fa-clock"></i>10:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Pedro Picapiedra</p>
                        </div>

                        <div class="detalle-evento">
                            <h3>Tecnologías del Futuro</h3>
                            <p><i class="fas fa-clock"></i>17:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>10 de Dic</p>
                            <p><i class="fas fa-user"></i>Daniela Cruz Chavez</p>
                        </div>

                        <a href="#" class="button float-right">Ver Todos</a>
                    </div>
                    <!--#talleres-->

                    <div id="seminarios" class="info-curso ocultar clearfix">
                        <div class="detalle-evento">
                            <h3>Diseño UI/UX para móviles</h3>
                            <p><i class="fas fa-clock"></i>17:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>11 de Dic</p>
                            <p><i class="fas fa-user"></i>Juan Jose</p>
                        </div>

                        <div class="detalle-evento">
                            <h3>Aprende a Programar en una mañana</h3>
                            <p><i class="fas fa-clock"></i>10:00 hrs</p>
                            <p><i class="fas fa-calendar-times"></i>11 de Dic</p>
                            <p><i class="fas fa-user"></i>Susana Rivera</p>
                        </div>

                        <a href="#" class="button float-right">Ver Todos</a>
                    </div>
                    <!--#talleres-->
                </div>
                <!--.programa-evento-->
            </div>
            <!--.contenedor-->
        </div>
        <!--.contenido-programa-->
    </section>
    <!--.programa-->

    <?php include_once 'includes/templates/invitados.php'; ?>

    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p> Invitados</li>
                <li>
                    <p class="numero"></p> Talleres</li>
                <li>
                    <p class="numero"></p> Días</li>
                <li>
                    <p class="numero"></p> Conferencias</li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 día</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div class="mapa" id="mapa"></div>

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A natus eius pariatur quisquam rem, amet repudiandae iste nulla quos numquam. Impedit qui neque ipsam modi ipsa voluptate tempore nisi aut.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->

            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A natus eius pariatur quisquam rem, amet repudiandae iste nulla quos numquam. Impedit qui neque ipsam modi ipsa voluptate tempore nisi aut.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->

            <div class="testimonial">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A natus eius pariatur quisquam rem, amet repudiandae iste nulla quos numquam. Impedit qui neque ipsam modi ipsa voluptate tempore nisi aut.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="Testimonio">
                        <cite>Oswaldo Aponte Escobedo <span>Diseñador en @Prisma</span> </cite>
                    </footer>
                </blockquote>
            </div>
            <!--.testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Regístrate al newsletter:</p>
            <h3>cancunwebcamp</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
        <!--.contenido-->
    </div>
    <!--.newsletter-->

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li><p id="dias" class="numero"></p> días</li>
                <li><p id="horas" class="numero"></p> horas</li>
                <li><p id="minutos" class="numero"></p> minutos</li>
                <li><p id="segundos" class="numero"></p> segundos</li>
            </ul>
        </div>
    </section>

<?php include_once 'includes/templates/footer.php'; ?>