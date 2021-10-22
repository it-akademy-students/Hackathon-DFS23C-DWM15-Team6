<?php
//require_once(plugin_dir_path(__FILE__) . "../../../../wp-load.php");
global $wpdb;
$acheteur_table = $wpdb->prefix . 'acheteur';
$acheteur_achat_billet_table = $wpdb->prefix . 'acheteur_achat_billet';
$message = "";

$liste_acheteurs = $wpdb->get_results( "SELECT email, id FROM {$acheteur_table} ORDER BY id DESC", OBJECT );

if($_POST) {
 
	$dateAchat = sanitize_text_field($_POST['dateAchat']);
	$acheteurId = sanitize_text_field($_POST['acheteur_id']);
	$dateEvenement = sanitize_text_field($_POST['dateEvenement']);
	$type = sanitize_text_field($_POST['type']);
	$details = sanitize_text_field($_POST['details']);
	$qte = sanitize_text_field($_POST['qte']);
	$prixUnitaire = sanitize_text_field($_POST['prixUnitaire']);
	$errors = [];
	
	if (strlen($dateAchat) === 0 || $dateAchat > date("Y-m-d")) {
		array_push($errors, "Date Achat inexistante ou incorrecte.");
	}
	if (strlen($acheteurId) === 0) {
		array_push($errors, "Email Acheteur non selectionné.");
	}
	if (strlen($dateEvenement) === 0) {
		array_push($errors, "Date Evènement inexistante ou incorrecte.");
	}
	if (strlen($type) < 5) {
		array_push($errors, "Formule inexistant ou trop court.");
	}
	if (strlen($details) < 10) {
		array_push($errors, "Détails Formule inexistant ou trop court.");
	}
	if (strlen($qte) <= 0) {
		array_push($errors, "Quantité nulle ou incorrecte.");
	}
	if (strlen($prixUnitaire) <= 0) {
		array_push($errors, "Prix unitaire nul ou incorrect.");
	}
	
	if (count($errors) > 0) {
		$listeErrors = '';
		foreach ($errors as $error) {
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
			$acheteur_achat_billet_table,
			array(
				'dateAchat' => $dateAchat,
				'acheteur_id' => $acheteurId,
				'dateEvenement' => $dateEvenement,
				'type' => stripslashes($type),
				'details' => stripslashes($details),
				'qte' => $qte,
				'prixUnitaire' => $prixUnitaire
			),
			array(
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%d',
				'%d'
			)
		);
		$acheteur = $wpdb->get_results( "SELECT * FROM {$acheteur_table} WHERE id = " . $acheteurId, OBJECT );
		
		wp_mail($acheteur->email, 'Validation de votre commande', '
		<p>Bonjour ' . $acheteur->nom . '</p>
		<p>Votre commande de billets viens d\'être traité. Vous le/les recevrez prochainement à votre adresse indiquez ci-dessous :</p>
		<p></p>
		<p>' . $acheteur->nom . '<br>' . $acheteur->adresse . '<br>' . $acheteur->codePosetal . ' ' . $acheteur->ville . '</p>
		<p></p>
		<p>Merci de ne pas repondre sur cette adresse email automatique car aucunes informations ne nous seront transmises.</p>
		<p></p>
		<p>Cordialement</p>
		<p>L\'équipe AFUP.</p>
		');
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
<h3>Ajouter un achat</h3>
<hr class="my-1 mb-3">
<div class="pr-3 pb-2">
	<a type="button" class="btn btn-sm btn-secondary" href="?page=billets-achetes">Retour à la liste des billets achetés</a>
</div>
<hr class="my-1 mb-3">
<?= $message; ?>
<form method="post" action="?page=ajouter-un-achat" class="m-0 pr-3" style="max-width: 800px;">
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="dateAchat">Date Achat</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="dateAchat" name="dateAchat" value="<?= $dateAchat ? $dateAchat : date("Y-m-d"); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="acheteur_id">Email Acheteur</label>
    <div class="col-sm-9">
      <select class="form-control" id="acheteur_id" name="acheteur_id">
        <option value="" selected="selected"></option>
		    <?php
			    foreach($liste_acheteurs as $acheteur) {
			      if($acheteur->id === $acheteurId) { $vu_select = ' selected="selected"'; }
			      else { $vu_select = ''; }
				    echo '<option value="' . $acheteur->id . '"' . $vu_select . '>' . $acheteur->email . '</option>';
			    }
		    ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="dateEvenement">Date Conférence</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="dateEvenement" name="dateEvenement" value="<?= $dateEvenement; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="type">Formule</label>
    <div class="col-sm-9">
		  <input type="text" class="form-control" id="type" name="type" value="<?= $type; ?>">
    </div>
	</div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="details">Details Formule</label>
    <div class="col-sm-9">
		  <textarea class="form-control" id="details" name="details"><?= $details; ?></textarea>
	  </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="qte">Quantité</label>
    <div class="col-sm-9">
			<input type="number" min="1" class="form-control" id="qte" name="qte" value="<?= $qte ? $qte : 1; ?>">
		</div>
  </div>
  <div class="form-group row">
    <label class="col-sm-3 col-form-label" for="prixUnitaire">Prix Unitaire</label>
    <div class="col-sm-9">
			<input type="number" min="0" class="form-control" id="prixUnitaire" name="prixUnitaire" value="<?= $prixUnitaire; ?>">
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