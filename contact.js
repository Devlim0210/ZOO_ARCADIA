//page contact
document
  .getElementById("contact-form")
  .addEventListener("submit", function (event) {
    // Empêche l'envoi du formulaire si la validation échoue
    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Vérification des champs
    if (name === "" || email === "" || message === "") {
      alert("Tous les champs doivent être remplis.");
      return;
    }

    // Vérification de la validité de l'email
    if (!validateEmail(email)) {
      alert("Veuillez entrer une adresse email valide.");
      return;
    }

    alert("Formulaire validé et prêt à être envoyé !");
  });

// Fonction  pour valider l'email
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}
