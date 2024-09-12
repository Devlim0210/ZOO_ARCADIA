<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos services - Zoo Arcadia</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="services-page">
      <!-- Header -->
      <?php include 'header.php'; ?>

      <!-- Section des services -->
      <section class="services">
        <h1>Nos services</h1>

        <div class="service service-restauration">
          <img src="images/icone/icone resto.png" alt="Icône de restauration" />
          <div class="service-text">
            <h2>Restauration</h2>
            <p>
              Découvrez notre offre de restauration bio et locale, avec des
              options végétariennes et vegan. Savourez vos repas tout en
              profitant d'une vue sur les animaux.
            </p>
          </div>
        </div>

        <div class="service service-guide">
          <img
            src="images/icone/Rectangle 19.svg"
            alt="Icône de visite guidée"
          />
          <div class="service-text">
            <h2>Visite guidée</h2>
            <p>
              Explorez le zoo avec nos guides experts et apprenez-en plus sur
              les animaux et leurs habitats. Une aventure enrichissante pour
              petits et grands.
            </p>
          </div>
        </div>

        <div class="service service-train">
          <img
            src="images/icone/icone petit train.png"
            alt="Icône de petit train"
          />
          <div class="service-text">
            <h2>Petit train</h2>
            <p>
              Faites le tour du zoo sans effort grâce à notre petit train, idéal
              pour découvrir les animaux tout en se relaxant.
            </p>
          </div>
        </div>

        <div class="service-button">
          <a href="#" class="btn">En savoir plus</a>
        </div>
      </section>

      <!-- Footer -->
      <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
