<?php
require 'db_connection.php';//connexion a la base de donnée

$sql = "SELECT * FROM avis ORDER BY date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Affichage des avis -->
<div class="avis-liste">
  <?php if ($avis): ?>
    <?php foreach ($avis as $a): ?>
      <div class="avis-item">
        <h3><?= htmlspecialchars($a['nom']) ?></h3>
        <p><strong><?= htmlspecialchars($a['email']) ?></strong></p>
        <p><?= nl2br(htmlspecialchars($a['commentaire'])) ?></p>
        <small>Posté le <?= date("d/m/Y H:i", strtotime($a['date'])) ?></small>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Aucun avis pour le moment.</p>
  <?php endif; ?>
</div>