//console.log("JavaScript marche cooooooool !");

// Sélectionne le bouton et la section des animaux
const button = document.getElementById("discover-animals");
const animalsSection = document.getElementById("animals-section");

// Ajoute un événement au clic sur le bouton
button.addEventListener("click", () => {
  //console.log("Bouton cliqué !"); // Affiche ce message quand le bouton est cliqué

  // Affichage de la la section des animaux
  animalsSection.style.display = "block";
  console.log("Section des animaux affichée");

  // Fais défiler la page jusqu'à la section des animaux
  animalsSection.scrollIntoView({ behavior: "smooth" });
});
