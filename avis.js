// Cible le formulaire avec l'ID "avis-form" et écoute la soumission
document.getElementById("avis-form").addEventListener("submit", function (event) {

    // Empêche le rechargement automatique de la page
    event.preventDefault();
  
    // Récupère les valeurs des champs du formulaire et enlève les espaces
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const comment = document.getElementById("comment").value.trim();
  
    // Si l'un des champs est vide, on affiche un message d'erreur et on arrête
    if (!name || !email || !comment) {
      document.getElementById("avis-message").textContent = "Tous les champs sont requis.";
      document.getElementById("avis-message").style.color = "red";
      return;
    }
  
    // Prépare les données à envoyer avec l'objet FormData (comme un vrai formulaire)
    const formData = new FormData();
    formData.append("name", name);
    formData.append("email", email);
    formData.append("comment", comment);
  
    // Envoie les données au fichier PHP en arrière-plan via fetch()
    fetch("submit_avis.php", {
      method: "POST",
      body: formData,
    })
      // Convertit la réponse PHP en texte
      .then((response) => response.text())
  
      // Quand on reçoit la réponse PHP :
      .then((data) => {
        // Affiche la réponse sous le formulaire dans <p id="avis-message">
        document.getElementById("avis-message").textContent = data;
        document.getElementById("avis-message").style.color = "green";
  
        // Réinitialise le formulaire pour tout vider
        document.getElementById("avis-form").reset();
      })
  
      // Si une erreur se produit (ex : serveur inaccessible), affiche une erreur
      .catch((error) => {
        console.error("Erreur :", error);
        document.getElementById("avis-message").textContent = "Une erreur est survenue.";
        document.getElementById("avis-message").style.color = "red";
      });
  });