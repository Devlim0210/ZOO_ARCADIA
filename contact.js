

    // interception de la soumission du formulaire
    document.getElementById("contact-form").addEventListener("submit", function (event) {
      event.preventDefault(); //Empeche le rechargement de la page
      alert ("Formulaire intercepté, première étaoe réussue !");
    
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
    // Traitement de la réponse du serveur après envoi avec fetch
    .then((data) => {
      console.log("Réponse du serveur :", data);
       // Affiche le message de confirmation sous le formulaire(au lieu d'une alerte)
  const responseElement = document.getElementById("response-message");
  responseElement.textContent = data;
  responseElement.style.color = "green";;
  //reinitialise des champs du formulaire
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
