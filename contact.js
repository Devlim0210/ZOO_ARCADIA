/*document
  .getElementById("contact-form")
  .addEventListener("submit", function (event) {
    console.log("Formulaire soumis.");
    // Désactiver le bouton de soumission après le premier clic
    document.querySelector('button[type="submit"]').disabled = true;

    //  Ajoute un message pour informer l'utilisateur
    alert("Formulaire soumis, veuillez patienter...");*/

    // interception de la soumission du formulaire
    document.getElementById("contact-form").addEventListener("submit", function (event) {
      event.preventDefault(); //Empeche le rechargement de la page
      alerte("Formulaire intercepté, première étaoe réussue !");
    
    // Récupérer les champs du formulaire
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Si un champ est vide, empêcher la soumission
    if (!name  || !email || !message ) {
     alert("Tous les champs doivent être remplis.");
      return;
    }

    // Verifier l'adresse email si cest au bon format
    if (!validateEmail(email)) {
     alert("Veuillez entrer une adresse email valide.");
      return;
    }

   // ➤ Préparer les données à envoyer avec FormData
  const formData = new FormData();
  formData.append("name", name);
  formData.append("email", email);
  formData.append("message", message);

  // ➤ Envoyer les données avec fetch()
  fetch("submit_contact.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log("Réponse du serveur :", data);
      alert(data);
      document.getElementById("contact-form").reset();
    })
    .catch((error) => {
      console.error("Erreur lors de l'envoi :", error);
      alert("Une erreur est survenue.");
    });
});


// Fonction de validation de l'email
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}
