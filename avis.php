<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Avis visiteurs</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <!-- Header -->
  <?php include 'header.php'; ?>
  <body>
    <div class="avis-page">
      <h1 class="text-center">Avis des visiteurs</h1>

      <!-- Formulaire d'avis -->
      <div class="form-container">
        <!--Ajout de action="submit_avis.php" pour indiquer au formulaire où envoyer les données et method="POST" pour envoyer les données en toute sécurité-->
        <form id="avis-form" action="submit_avis.php" method="POST">
          <label for="name">Nom</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Votre nom"
            required
          />

          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Votre email"
            required
          />

          <!--<label for="rating">Note</label>
          <div class="rating">⭐⭐⭐⭐⭐</div>-->

          <label for="comment">Votre commentaire</label>
          <textarea
            id="comment"
            name="comment"
            rows="4"
            placeholder="Votre avis"
            required
          ></textarea>

          <button type="submit">Envoyer</button>
        </form>
      </div>
     
    </div>
     <!-- Footer -->
     <?php include 'footer.php'; ?>
  </body>
</html>
