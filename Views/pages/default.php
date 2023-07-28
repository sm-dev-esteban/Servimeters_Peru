<!--Bloqueo Admin-->
<?php if ($_SESSION['rol'] === 'Admin'): ?>
<section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
		<div class="carousel-inner" role="listbox">

      <!-- Slide I -->
			<div class="carousel-item active" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)"  loading="lazy">
        <div class="carousel-container">
          <div class="container">
            <img src="<?= SERVERSIDE ?>Views/resources/dist/img/servimeters.png" class="img-fluid animated">
            <h2 class="animated fadeInDown">Homologación de <span>proveedores</span></h2>
            <p class="animated fadeInUp">Garantizamos la calidad de los proveedores para empresas del sector público y privado
                                         mediante<br> un proceso de evaluación exhaustivo.</p>
          </div>
        </div>
			</div>

			<!-- Slide II -->
			<div class="carousel-item" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)">
				<div class="carousel-container">
					<div class="container">
            <h2 class="animated fadeInDown">Creación del usuario </h2>
            <p class="animated fadeInUp">El administrador podrá ingresar la información personal de los usuarios, como nombre de usuario,<br> dirección de correo electrónico y contraseña </p>
            <a href="https://youtu.be/JbsaCm0qNHo" class="glightbox play-btn mb-4"></a>
          </div>
				</div>
			</div>

			<!-- Slide III -->
			<div class="carousel-item" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)">
				<div class="carousel-container">
					<div class="container">
            <h2 class="animated fadeInDown">Asignar procesos</h2>
            <p class="animated fadeInUp">El administrador asegurará que cada auditor esté a cargo de tareas específicas y contribuyendo a mejorar<br> la calidad y la eficiencia del proceso de evaluación.</p>
            <a href="https://youtu.be/pTjQYUtZEUg" class="glightbox play-btn mb-4"></a>
					</div>
				</div>
			</div>
		</div>

    <!--Bótones-->
		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>
	</div>
</section>


<!--Bloqueo Cliente-->
<?php elseif ($_SESSION['rol'] === 'Cliente'): ?>
<section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
		<div class="carousel-inner" role="listbox">
			
      <!-- Slide I -->
			<div class="carousel-item active" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)"  loading="lazy">
        <div class="carousel-container">
          <div class="container">
            <img src="<?= SERVERSIDE ?>Views/resources/dist/img/servimeters.png" class="img-fluid animated">
            <h2 class="animated fadeInDown">Homologación de <span>proveedores</span></h2>
            <p class="animated fadeInUp">Garantizamos la calidad de los proveedores para empresas del sector público y privado
                                         mediante<br> un proceso de evaluación exhaustivo.</p>
          </div>
        </div>
			</div>

			<!-- Slide II -->
			<div class="carousel-item" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)">
				<div class="carousel-container">
					<div class="container">
            <h2 class="animated fadeInDown">Creación de Homologación </h2>
            <p class="animated fadeInUp">El cliente podrá ingresar los datos de manera sencilla y precisa, asegurándote de proporcionar<br> La información necesaria para nuestros servicios.</p>
            <a href="https://youtu.be/sHysSaxdtK8" class="glightbox play-btn mb-4"></a>
          </div>
				</div>
			</div>

      <!-- Slide II -->
			<div class="carousel-item" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)">
				<div class="carousel-container">
					<div class="container">
            <h2 class="animated fadeInDown">Ingreso del cliente</h2>
            <p class="animated fadeInUp">El auditor tendrá la capacidad de observar los procesos que se te asignen.<br>
                                         Esto te permitirá acceder a la información relevante y realizar una evaluación 
                                         exhaustiva de cada tarea específica</p>
            <a href="https://youtu.be/Cv1ogj9KzJk" class="glightbox play-btn mb-4"></a>
           </div>
				</div>
			</div>
		</div>

    <!--Bótones-->
		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>
	</div>
</section>


<!--Bloqueo Auditor-->
<?php elseif ($_SESSION['rol'] === 'Auditor'): ?>
  <section id="hero">
	<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
		<div class="carousel-inner" role="listbox">
			
      <!-- Slide I -->
			<div class="carousel-item active" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)"  loading="lazy">
        <div class="carousel-container">
          <div class="container">
            <img src="<?= SERVERSIDE ?>Views/resources/dist/img/servimeters.png" class="img-fluid animated">
            <h2 class="animated fadeInDown">Homologación de <span>proveedores</span></h2>
            <p class="animated fadeInUp">Garantizamos la calidad de los proveedores para empresas del sector público y privado
                                         mediante<br> un proceso de evaluación exhaustivo.</p>
          </div>
        </div>
			</div>


			<!-- Slide II-->
			<div class="carousel-item" style="background-image: url(<?= SERVERSIDE ?>Views/resources/dist/img/fondo.jpg)">
				<div class="carousel-container">
					<div class="container">
            <h2 class="animated fadeInDown">Evaluación Auditor</h2>
            <p class="animated fadeInUp">El auditor podrás acceder a los datos ingresados y realizar una evaluación minuciosa de cada aspecto relevante.</p>
            <a href="https://youtu.be/fgWvWJGCMXI" class="glightbox play-btn mb-4"></a>
					</div>
				</div>
			</div>
		</div>

    <!--Bótones-->
		<a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
			<span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
			<span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
		</a>
	</div>
</section>
<?php endif; ?>