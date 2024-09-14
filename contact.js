document
  .getElementById("contact-form")
  .addEventListener("submit", function (event) {
    console.log("Formulaire soumis.");
    // Désactiver le bouton de soumission après le premier clic
    document.querySelector('button[type="submit"]').disabled = true;

    //  Ajoute un message pour informer l'utilisateur
    alert("Formulaire soumis, veuillez patienter...");
    // Récupérer les champs du formulaire
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Si un champ est vide, empêcher la soumission
    if (name === "" || email === "" || message === "") {
      event.preventDefault(); // Bloquer la soumission
      alert("Tous les champs doivent être remplis.");
      return;
    }

    // Valider l'adresse email
    if (!validateEmail(email)) {
      event.preventDefault(); // Bloquer la soumission
      alert("Veuillez entrer une adresse email valide.");
      return;
    }

    // Si tout est correct, le formulaire est soumis sans blocage
    console.log("Le formulaire est soumis.");
  });

// Fonction de validation de l'email
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}
