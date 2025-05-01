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

    // Si tout est correct, le formulaire est soumis sans blocage
    //console.log("Le formulaire est soumis.");
alert("Tout est ok,prêt pour l'envoi avec fetch");
  });

// Fonction de validation de l'email
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}
