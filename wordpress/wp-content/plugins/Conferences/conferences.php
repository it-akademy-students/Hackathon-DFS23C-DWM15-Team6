<?php
/*
 * Plugin Name:		Gérer les conférences
 * Description:		
 * Version:			1.0.0
 * WordPress URI:	
 * Plugin URI:		
 * Author:			Phoung
 */



// Creation de la table dans la BDD

register_activation_hook( __FILE__, 'crudOperationsTable');
function crudOperationsTable() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $conferences_table = $wpdb->prefix . 'conferences_table';
  $sql = "CREATE TABLE `$conferences_table` (
  `conference_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `lecturer_name` varchar(220) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(220),
  PRIMARY KEY(conference_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  ";
  if ($wpdb->get_var("SHOW TABLES LIKE '$conferences_table'") != $conferences_table) {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }
}

// Creation d'une page admin

add_action('admin_menu', 'addAdminPageContent');
function addAdminPageContent() {
  add_menu_page('CRUD', 'Conférences', 'manage_options', __FILE__, 'crudAdminPage', 'dashicons-schedule', 4);
}

function crudAdminPage() {
  global $wpdb;
  $conferences_table = $wpdb->prefix . 'conferences_table';

  if (isset($_POST['newsubmit'])) {
    $name = $_POST['newname'];
    $lecturer_name = $_POST['newlecturer'];
    $date = $_POST['newdate'];
    $time_start = $_POST['newtimestart'];
    $time_end = $_POST['newtimeend'];
    $description = $_POST['newdescription'];
    $img = $_POST['newimg'];

    // $wpdb->query("INSERT INTO $conferences_table (name,lecturer_name, date, time_start, time_end, description, img) VALUES ('$name','$lecturer_name','$date','$time_start','$time_end','$description','$img')");
    $wpdb->insert(
      $conferences_table,
        array(
          // 'conference_id' => $_POST['conference_id'],
          'name' => stripslashes($_POST['newname']),
          'lecturer_name' =>  stripslashes($_POST['newlecturer']),
          'date' => $_POST['newdate'],
          'time_start' => $_POST['newtimestart'],
          'time_end' => $_POST['newtimeend'],
          'description' =>  stripslashes($_POST['newdescription']),
          'img' =>  $_POST['newimg'],
        ),
        array(
          '%s',
          '%s',
          '%s',
          '%s',
          '%s',
          '%s',
          '%s',
        )
    );
    // Actualiser la page
    echo "<script>location.replace('admin.php?page=Conferences%2Fconferences.php');</script>";
    // var_dump($_POST);

  }

  if (isset($_POST['uptsubmit'])) {
    $id = $_POST['uptid'];
    $name =  stripslashes($_POST['uptname']);
    $lecturer_name =  stripslashes($_POST['uptlecturer']);
    $date = $_POST['uptdate'];
    $time_start = $_POST['upttimestart'];
    $time_end = $_POST['upttimeend'];
    $description = stripslashes($_POST['uptdescription']);
    $img = $_POST['uptimg'];
	  $wpdb->update(
				$conferences_table,
				array(
					'name' => $name,
					'lecturer_name' => $lecturer_name,
					'date'=> $date,
					'time_start'=>$time_start,
					'time_end'=>$time_end,
					'description'=>$description,
					'img'=>$img
				),
				array(
					'conference_id'=>$id
				),
				// type des element a modifier
				array(
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s',
					'%s'
				),
				// type des element du where
				array(
					'%d'
				)
			);
//     $wpdb->query("UPDATE $conferences_table SET name='$name',lecturer_name='$lecturer_name',date='$date',time_start='$time_start',time_end='$time_end',description='$description',img='$img' WHERE conference_id='$id'");
    
    echo "<script>location.replace('admin.php?page=Conferences%2Fconferences.php');</script>";
//     var_dump($_POST);
  }

  if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $wpdb->query("DELETE FROM $conferences_table WHERE conference_id='$del_id'");
    
    echo "<script>location.replace('admin.php?page=Conferences%2Fconferences.php');</script>";
  }

  ?>
  <h1>Gérer les conférences</h1>
    <table class="wp-list-table widefat striped">
      <thead>
        <tr>
          <th width="15%">Nom de la conférence</th>
          <th width="15%">Nom du conférencier</th>
          <th width="15%">Date</th>
          <th width="15%">Heure début</th>
          <th width="15%">Heure fin</th>
          <th width="15%">URL de l'image</th>
          <th width="20%">Description</th>
          <th width="15%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <form action="" method="post">
          <tr>
            <td><input type="text" id="newname" name="newname" required></td>
            <td><input type="text" id="newlecturer" name="newlecturer" required></td>
            <td><input type="date" id="newdate" name="newdate" required></td>
            <td><input type="time" id="newtimestart" name="newtimestart" value="08:00" required></td>
            <td><input type="time" id="newtimeend" name="newtimeend" value="08:00" required></td>
            <td><input type="text" id="newimg" name="newimg"></td>
            <td><textarea id="newdescription" name="newdescription" rows='5' cols='40'></textarea></td>
            <td><button id="newsubmit" name="newsubmit" type="submit">AJOUTER</button></td>
          </tr>
        </form>
        <?php
          $result = $wpdb->get_results("SELECT * FROM $conferences_table");
          foreach ($result as $print) {
            $shortdescription = $print->description;
            if (strlen($print->description) >= 150){
              $shortdescription = substr($print->description, 0, 150) . '[...]';
            } 
            echo '
				<tr>
				  <td width="20%">' . $print->name . '</td>
				  <td width="15%">' . $print->lecturer_name . '</td>
				  <td width="15%">' . $print->date . '</td>
				  <td width="15%">' . $print->time_start . '</td>
				  <td width="15%">' . $print->time_end . '</td>
				  <td width="15%">' . $print->img . '</td>
				  <td width="20%">' . $shortdescription . '</td>
				  <td width="15%">
					<a href="admin.php?page=Conferences%2Fconferences.php&upt=' . $print->conference_id .'"><button type="button">MODIFIER</button></a>
					<a href="admin.php?page=Conferences%2Fconferences.php&del=' . $print->conference_id .'"><button type="button">SUPPR</button></a>
				  </td>
				</tr>
				';
          }
        ?>
      </tbody>  
    </table>
    <br>
    <br>
    <?php
      if (isset($_GET['upt'])) {
        $upt_id = $_GET['upt'];
        $result = $wpdb->get_results("SELECT * FROM $conferences_table WHERE conference_id='$upt_id'");
        foreach($result as $print) {
          $name = $print->name;
          $lecturer_name = $print->lecturer_name;
          $date = $print->date;
          $time_start = $print->time_start;
          $time_end = $print->time_end;
          $img = $print->img;
          $description = $print->description;
        }
		  echo '
			<table class="wp-list-table widefat striped">
			  <thead>
			  <tr>
				<th width="5%">ID de la conférence</th>
				<th width="15%">Nom de la conférence</th>
				<th width="15%">Nom du conférencier</th>
				<th width="15%">Date</th>
				<th width="15%">Heure début</th>
				<th width="15%">Heure fin</th>
				<th width="15%">URL de l\'image</th>
				<th width="20%">Description</th>
				<th width="15%">Actions</th>
			  </tr>
			  </thead>
			  <tbody>
			  <form action="" method="post">
				<tr>
				  <td width="5%">' . $print->conference_id . '<input type="hidden" id="uptid" name="uptid" value="' . $print->conference_id . '"></td>
				  <td width="15%"><input type="text" id="uptname" name="uptname" value="' . $print->name . '"></td>
				  <td width="15%"><input type="text" id="uptlecturer" name="uptlecturer" value="' . $print->lecturer_name . '"></td>
				  <td width="15%"><input type="date" id="uptdate" name="uptdate" value="' . $print->date . '"></td>
				  <td width="15%"><input type="time" id="upttimestart" name="upttimestart" min"08:00" max="20:00" value="' . $print->time_start . '"></td>
				  <td width="15%"><input type="time" id="upttimeend" name="upttimeend" min"08:00" max="20:00" value="' . $print->time_end . '"></td>
				  <td width="15%"><input type="text" id="uptimg" name="uptimg" value="' . $print->img . '"></td>
				  <td width="20%"><textarea id="uptdescription" name="uptdescription" rows="5" cols="40">' . $print->description . '</textarea></td>
				  <td width="15%">
					<button id="uptsubmit" name="uptsubmit" type="submit">MODIFIER</button>
					<a href="admin.php?page=Conferences%2Fconferences.php"><button type="button">ANNULER</button></a>
				  </td>
				</tr>
			  </form>
			  </tbody>
			</table>';
      }
}