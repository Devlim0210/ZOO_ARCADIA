<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page des Habitats - Zoo Arcadia</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="habitats-page">
      <!-- Header -->
      <?php include 'header.php'; ?>
      <!-- Section des habitats -->
      <section class="habitats">
        <h1>Nos Habitats</h1>
        <div class="habitat-container">
          <div class="habitat">
            <img src="images/savane.jpg" alt="Savane" />
            <h3>Savane</h3>
            <p>
              Découvrez la savane africaine avec ses lions, girafes et
              éléphants.
            </p>
          </div>
          <div class="habitat">
            <img src="images/jungle.png" alt="Jungle" />
            <h3>Jungle</h3>
            <p>
              La jungle tropicale abrite des singes, des oiseaux et des reptiles
              fascinants.
            </p>
          </div>
          <div class="habitat">
            <img src="images/marais.jpg" alt="Marais" />
            <h3>Marais</h3>
            <p>
              Les marais sont le refuge des crocodiles, tortues et grenouilles.
            </p>
          </div>
        </div>
        <!-- Bouton pour découvrir les animaux -->
        <button id="discover-animals">Découvrir nos animaux</button>
      </section>

      <!-- Section des animaux (cachée par défaut) -->
      <section id="animals-section" style="display: none">
        <h2>Nos animaux</h2>
        <div class="animal-container">
          <div class="animal">
            <img src="images/elephant.jpg" alt="Éléphant" />
            <h3>Éléphant</h3>
            <p>
              Majestueux éléphant africain, le plus grand mammifère terrestre.
            </p>
          </div>
          <div class="animal">
            <img src="images/lion.jpg" alt="Lion" />
            <h3>Lion</h3>
            <p>
              Le roi de la savane, connu pour sa puissance et son rugissement.
            </p>
          </div>
          <div class="animal">
            <img src="images/serpent.jpg" alt="Serpent" />
            <h3>Serpent</h3>
            <p>
              Le roi de la savane, connu pour sa puissance et son rugissement.
            </p>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <?php include 'footer.php'; ?>
    </div>
    <!-- Lien vers le fichier JavaScript externe -->
    <script src="scripts.js"></script>
  </body>
</html>
