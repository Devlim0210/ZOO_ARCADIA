<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Zoo Arcadia</title>
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <!--Pour eviter le conflit de style ds css utilisons wrapper-->
    <div class="contact-page">
      <!-- Header -->
      <?php include 'header.php'; ?>

      <!-- Formulaire de contact -->
      <section class="contact-form">
        <h1>Contactez-nous</h1>
        <!--permet au formulaire de soumettre les données à "submit_contact.php "qui traitera les informations.-->
        <form id="contact-form" action="submit_contact.php" method="POST">
          <div class="form-group">
            <label for="name">Pseudo :</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Pseudo"
              required
            />
          </div>
          <div class="form-group">
            <label for="email">Adresse email :</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Votre adresse email"
              required
            />
          </div>
          <div class="form-group">
            <label for="message">Message :</label>
            <textarea
              id="message"
              name="message"
              rows="5"
              placeholder="Écrire un avis"
              required
            ></textarea>
          </div>
          <button type="submit" id="submit-btn">Envoyer</button>
        </form>
      </section>

      <!-- Informations de contact -->
      <section class="contact-info">
        <div class="info-block">
          <p>
            <img src="images/icons/address-icon.png" alt="Adresse" /> Adresse :
            123 Rue de la lionne, 75000 Paris
          </p>
          <p>
            <img src="images/icons/phone-icon.png" alt="Téléphone" /> Téléphone
            : +33 1 23 45 67 89
          </p>
          <p>
            <img src="images/icons/hours-icon.png" alt="Horaires" /> Horaires
            d'ouverture : 9h - 18h (du lundi au dimanche)
          </p>
          <p>
            <img src="images/icons/email-icon.png" alt="Email" /> Email :
            contact@zooarcadia.fr
          </p>
        </div>
      </section>

      <!-- Footer -->
      <?php include 'footer.php'; ?>
    </div>
    <!-- Lien vers le fichier JavaScript -->
    <script src="contact.js"></script>
  </body>
</html>
