<?php
global $wpdb;
$acheteur_table = $wpdb->prefix . 'acheteur';
$acheteur_achat_billet_table = $wpdb->prefix . 'acheteur_achat_billet';
	
	
	if($_GET['delete']) {
		$wpdb->delete(
			$acheteur_achat_billet_table,
			array('id' => $_GET['delete']),
			array('%d')
		);
		$message = '
	<div class="pr-3 alert-message">
	  <div class="alert alert-success p-2 mb-3 d-flex justify-content-between align-items-start">
	    <span>Les informations du/des billet(s) acheté(s) ont été effacées avec succès !</span>
	  </div>
  </div>
	';
	}


$liste_acheteur_achat_billet = $wpdb->get_results( "
    SELECT m.nom, m.email, mt.id, mt.type, mt.details, mt.qte, mt.prixUnitaire, mt.prixUnitaire, mt.dateEvenement
    FROM {$acheteur_achat_billet_table} AS mt
    INNER JOIN {$acheteur_table} AS m
    ON m.id = mt.acheteur_id
    ORDER BY mt.etat DESC, m.nom ASC, m.email ASC", OBJECT );
?>
<h3>Billets achetés</h3>
<hr class="my-1 mb-3">
<div class="pr-3 pb-2">
  <a href="?page=ajouter-un-achat"><button type="button" class="btn btn-sm btn-primary">Ajouter un achat</button></a>
</div>
<hr class="my-1 mb-3">

<div class="table-responsive pr-3">
  <table class="table table-sm table-hover table-bordered p-0 m-0">
    <thead class="thead-light">
    <tr>
      <th style="width: 140px;" class="text-left align-middle">Date Achat</th>
      <th class="col-3 text-left align-middle">Email Acheteur</th>
      <th style="width: 140px;" class="text-left align-middle">Date Conférence</th>
      <th class="col-2 text-left align-middle">Formule</th>
      <th class="text-left align-middle">Details Formule</th>
      <th style="width: 80px;" class="text-left align-middle">Qte</th>
      <th style="width: 80px;" class="text-left align-middle">P.U.</th>
      <th style="width: 60px;"></th>
    </tr>
    </thead>
    <tbody>
		<?php
			if(count($liste_acheteur_achat_billet) > 0) {
				foreach($liste_acheteur_achat_billet as $acheteur_achat_billet) {
				  $dateAchatBrut = new DateTime($acheteur_achat_billet->dateAchat);
				  $dateAchat = $dateAchatBrut->format("d/m/Y");
				  $dateEvenementBrut =  new DateTime($acheteur_achat_billet->dateEvenement);
				  $dateEvenement = $dateEvenementBrut->format("d/m/Y");
					echo'
          <tr>
            <td class="text-center align-middle">' . $dateAchat . '</td>
            <td class="text-left align-middle">' . $acheteur_achat_billet->email . '</td>
            <td class="text-center align-middle">' . $dateEvenement . '</td>
            <td class="text-left align-middle">' . $acheteur_achat_billet->type . '</td>
            <td class="text-left align-middle">' . $acheteur_achat_billet->details . '</td>
            <td class="text-center align-middle">' . $acheteur_achat_billet->qte . '</td>
            <td class="text-right align-middle">' . $acheteur_achat_billet->prixUnitaire . '</td>
            <td class="text-center align-middle">
              <a href="?page=billets-achetes&delete=' . $acheteur_achat_billet->id . '" type="button" class="btn btn-danger m-1"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
          ';
				}
			}
			else {
				echo '
        <tr>
          <th colspan="9">Aucun billet acheté !</th>
        </tr>
      ';
			}
		?>
    </tbody>
  </table>
</div>
