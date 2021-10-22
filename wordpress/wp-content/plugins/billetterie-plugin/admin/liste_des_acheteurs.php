<?php
global $wpdb;
$acheteur_table = $wpdb->prefix . 'acheteur';

if($_GET['delete']) {
	$wpdb->delete(
		$acheteur_table,
		array('id' => $_GET['delete']),
		array('%d')
  );
	$message = '
	<div class="pr-3 alert-message">
	  <div class="alert alert-success p-2 mb-3 d-flex justify-content-between align-items-start">
	    <span>Acheteur effacé avec succès !</span>
	  </div>
  </div>
	';
}

elseif($_GET['active']) {
	$wpdb->update(
		$acheteur_table,
    array('etat' => true),
    array('id' => $_GET['active']),
    array('%d'),
    array('%d')
  );
	$message = '
	<div class="pr-3 alert-message">
	  <div class="alert alert-success p-2 mb-3 d-flex justify-content-between align-items-start">
	    <span>Etat de l\'acheteur modifié avec succès !</span>
	  </div>
  </div>
	';
}

elseif($_GET['desactive']) {
	$wpdb->update(
		$acheteur_table,
    array('etat' => false),
    array('id' => $_GET['desactive']),
    array('%d'),
    array('%d')
  );
	$message = '
	<div class="pr-3 alert-message">
	  <div class="alert alert-success p-2 mb-3 d-flex justify-content-between align-items-start">
	    <span>Etat de l\'acheteur modifié avec succès !</span>
	  </div>
  </div>
	';
}
$liste_acheteurs = $wpdb->get_results( "SELECT * FROM {$acheteur_table} ORDER BY id DESC", OBJECT );

?>
<h3>Liste des acheteurs</h3>
<hr class="my-1 mb-3">
<div class="pr-3 pb-2">
  <a href="?page=ajouter-un-acheteur"><button type="button" class="btn btn-sm btn-primary">Ajouter un acheteur</button></a>
</div>
<hr class="my-1 mb-3">
<?= $message; ?>
<div class="table-responsive pr-3">
  <table class="table table-sm table-hover table-bordered p-0 m-0">
    <thead class="thead-light">
    <tr>
      <th style="width: 60px;" class="text-left">Etat</th>
      <th class="col-2 text-left">Nom & Prenom</th>
      <th class="text-left">Adresse</th>
      <th style="width: 80px;" class="text-left">CP</th>
      <th class="text-left">Ville</th>
      <th class="text-left">Email</th>
      <th style="width: 60px;" class="text-right"></th>
    </tr>
    </thead>
    <tbody>
		<?php
			if(count($liste_acheteurs) > 0) {
				foreach($liste_acheteurs as $acheteur) {
				  if($acheteur->etat) {
					  $acheteur_etat_class = " text-success";
					  $acheteur_etat_link = " desactive";
					  $acheteur_etat_btn_class = " fa-user-times";
				  }
				  else {
					  $acheteur_etat_class = " text-danger";
					  $acheteur_etat_link = " active";
					  $acheteur_etat_btn_class = " fa-user-check";
				  }
				  
					echo'
          <tr>
            <td class="text-center align-middle">
              <a href="?page=liste-des-acheteurs&' . $acheteur_etat_link . '=' . $acheteur->id . '"> <i  class="fas fa-circle' . $acheteur_etat_class . '"></i></a>
            </td>
            <td class="text-left align-middle">' . $acheteur->nom . '</td>
            <td class="text-left align-middle">' . $acheteur->adresse . '</td>
            <td class="text-left align-middle">' . $acheteur->codePostal . '</td>
            <td class="text-left align-middle">' . $acheteur->ville . '</td>
            <td class="text-left align-middle">' . $acheteur->email . '</td>
            <td class="text-center align-middle">
              <a href="?page=liste-des-acheteurs&delete=' . $acheteur->id . '" type="button" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
          ';
				}
			}
			else {
				echo '
        <tr>
          <th colspan="7">Aucun acheteur enregistré !</th>
        </tr>
      ';
			}
		?>
    </tbody>
  </table>
</div>
<script>
  setTimeout(() => {
    const alertMessage = document.querySelector('.alert-message');
    alertMessage.remove();
  }, 5000);
</script>