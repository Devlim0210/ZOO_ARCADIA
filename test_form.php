<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Formulaire soumis avec succès !";
    var_dump($_POST);
} else {
    echo "Formulaire non soumis.";
}