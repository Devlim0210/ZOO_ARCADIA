
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zoo Arcadia - Page d'accueil</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  </head>
  <body>
    <div class="homepage">
      <!-- Header -->
      <?php include 'header.php'; ?>

      <!-- Hero Section -->
      <section class="hero">
        <h1>Bienvenue au Zoo Arcadia</h1>
        <p>Le zoo écoresponsable qui vous connecte à la nature</p>

        <!-- redirection pages des habitats-->
        <a href="habitats.php">
          <button>Découvrir les habitats</button>
        </a>
      </section>
      <!-- Section Nos Habitats -->
      <section class="habitats">
        <h2>Nos Habitats</h2>
        <div class="habitat-container">
          <div class="habitat">
            <img src="images/savane.jpg" alt="Savane" />
            <h3>Savane</h3>
            <p>Découvrez la savane africaine, où vivent lions et éléphants.</p>
          </div>
          <div class="habitat">
            <img src="images/jungle.png" alt="Jungle" />
            <h3>Jungle</h3>
            <p>
              Plongez dans la jungle tropicale abritant des singes et des
              oiseaux tropicaux.
            </p>
          </div>
          <div class="habitat">
            <img src="images/Marais.jpg" alt="Marais" />
            <h3>Marais</h3>
            <p>Explorez les marais où cohabitent crocodiles et tortues.</p>
          </div>
        </div>
      </section>

      <!-- Section Nos Services -->
      <section class="services">
        <h2>Nos Services</h2>
        <div class="service-container">
          <div class="service">
            <img src="images/restaurant 2.png" alt="Restauration" />
            <h3>Restauration</h3>
            <p>Découvrez notre offre bio et locale dans nos restaurants.</p>
          </div>
          <div class="service">
            <img
              src="images/tour-guide-6816049_1280.jpg"
              alt="Visites guidées"
            />
            <h3>Visites guidées</h3>
            <p>
              Explorez le zoo avec un guide expert pour en apprendre plus sur
              les animaux.
            </p>
          </div>
          <div class="service">
            <img src="images/petit train.jpg" alt="Petit train" />
            <h3>Petit train</h3>
            <p>
              Montez à bord du petit train pour découvrir le zoo sans effort.
            </p>
          </div>
        </div>
      </section>

      <!--section avis des visiteurs -->
      <section class="avis">
        <h2>Avis des visiteurs</h2>
        <div class="avis-container">
          <div class="avis-item">
            <p class="avis-text">
              “Super expérience au Zoo Arcadia ! Les habitats sont incroyables,
              et on voit vraiment que les animaux sont bien soignés. Mes enfants
              ont adoré la visite guidée, et le personnel était très
              accueillant. Nous reviendrons bientôt !”
            </p>
            <p class="avis-author">Carla</p>
            <p class="avis-rating">⭐⭐⭐⭐⭐</p>
          </div>
          <div class="avis-item">
            <p class="avis-text">
              "Belle visite au Zoo Arcadia ! J’ai particulièrement aimé la
              diversité des animaux et le cadre naturel. Par contre, le parking
              était un peu difficile à trouver."
            </p>
            <p class="avis-author">KevinFan94</p>
            <p class="avis-rating">⭐⭐⭐⭐</p>
          </div>
          <div class="avis-item">
            <p class="avis-text">
              "Un magnifique endroit ! Nous avons adoré la savane africaine,
              c’était impressionnant de voir les lions si proches. Le concept
              écoresponsable du zoo est un gros plus."
            </p>
            <p class="avis-author">CamilleBella</p>
            <p class="avis-rating">⭐⭐⭐⭐⭐</p>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
