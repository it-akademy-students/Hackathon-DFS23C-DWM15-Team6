<?php
global $wpdb;
$acheteur_table = $wpdb->prefix . 'acheteur';

if($_POST) {
	$nom = sanitize_text_field($_POST['nom']);
	$adresse = sanitize_text_field($_POST['adresse']);
	$codePostal = sanitize_text_field($_POST['codePostal']);
	$ville = sanitize_text_field($_POST['ville']);
	$email = sanitize_email($_POST['email']);
	
	$search_email = $wpdb->get_var(
		$wpdb->prepare(
			"
        SELECT *
        FROM {$acheteur_table}
        WHERE email = %s
    ",
			$email
		)
	);
	
	$errors = [];
	if(strlen($nom) < 2 && count(explode(" ", $nom)) < 2) {
	  array_push($errors, "Nom & Prénom inexistant ou incorrect.");
  }
	if(strlen($adresse) < 10) {
	  array_push($errors, "Adresse inexistante ou incorrect.");
  }
	if(strlen($codePostal) < 5) {
	  array_push($errors, "Code postal inexistant ou incorrect.");
  }
	if(strlen($ville) === 0) {
		array_push($errors, "Ville inexistante ou trop courte.");
	}
	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		array_push($errors,'Email inexistant ou incorrect.');
	}
	
	if(count($search_email) > 0){
		array_push($errors,'Email déja éxistant.');
	}
	
	if(count($errors) > 0) {
	  $listeErrors = '';
	  foreach($errors as $error) {
	    $listeErrors .= '<li>- ' . $error . '</li>';
    }
	  
		$message = '
  <div class="pr-3 alert-message">
	  <div class="alert alert-danger p-2 mb-3">
	    <h5><strong>Erreurs : </strong></h5>
	    <ul class="pl-2">
	      ' . $listeErrors . '
      </ul>
	  </div>
  </div>
	';
  }
	else {
		$wpdb->insert(
			$acheteur_table,
			array(
				'nom' => stripslashes($nom),
				'adresse' => stripslashes($adresse),
				'codePostal' => $codePostal,
				'ville' => ucwords(stripslashes($ville)),
				'email' => $email,
			),
			array(
				'%s',
				'%s',
				'%d',
				'%s',
				'%s'
			)
		);
		$message = '
  <div class="pr-3 alert-message">
	  <div class="alert alert-success p-2 mb-3 d-flex justify-content-between align-items-start">
	    <span>Enregistrement effectué avec succès !</span>
	  </div>
  </div>
	';
  }
}

?>
<h3>Ajouter un acheteur</h3>
<hr class="my-1 mb-3">
<div class="pr-3 pb-2">
  <a type="button" class="btn btn-sm btn-secondary" href="?page=liste-des-acheteurs">Retour à la liste des acheteurs</a>
</div>
<hr class="my-1 mb-3">
<?= $message; ?>
<form method="post" action="?page=ajouter-un-acheteur" class="m-0 pr-3" style="max-width: 800px;">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="email">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="nom">Nom & Prénom</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="nom" name="nom" value="<?= $nom; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="adresse">Adresse</label>
    <div class="col-sm-9">
      <textarea class="form-control" rows="4" id="adresse" name="adresse"><?= $adresse; ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="codePostal">Code postal</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" maxlength="5" id="codePostal" name="codePostal" value="<?= $codePostal; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="ville">Ville</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="ville" name="ville" value="<?= $ville; ?>">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
  </div>
</form>
<script>
  setTimeout(() => {
    const alertMessage = document.querySelector('.alert-message');
    alertMessage.remove();
  }, 9000);
</script>