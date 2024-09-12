<?php if (isset($_GET['error'])): ?>  <!-- vérification si une erreur est présente -->
    <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>  <!-- Affiche l'erreur de manière sécurisée -->
<?php endif; ?>  <!-- Fin de la condition -->