<?php

 require_once(ABSPATH . "wp-load.php");

if ($_POST['your_name'] && $_POST['your_firstname'] && $_POST['your_email'] && $_POST['captcha'] && $_POST['your_comments']) {   

        $name = sanitize_text_field($_POST['your_name']);
        $firstname = sanitize_text_field($_POST['your_firstname']);
        $email = sanitize_email($_POST['your_email']);
        $comments = sanitize_textarea_field($_POST['your_comments']);
        $captcha = sanitize_text_field($_POST['captcha']);

        $errors = [];
        if(strlen($name) === 0){
            array_push($errors,'- Nom inexistant ou trop court !');
         }
         if(strlen($firstname) === 0){
             array_push($errors,'- Prénom inexistant ou trop court !');
         }
         if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
             array_push($errors,'- Email inexistant ou trop court !');
         }
         if ($captcha != 7 && $captcha != 'sept') {
             array_push($errors,'- Captcha incorrect !');
         }
         if(strlen($comments) < 50){
             array_push($errors,'- Commentaire inexistant ou trop court !');
         }

         if(count($errors) > 0 ) {
            $content = '';
            foreach($errors as $element){
                $content .= '<p>' . $element . '</p>';
            }
            $captureInfo = '<div class="alert alert-danger" id="form-errors" role="alert">' . $content . '</div>';
            $captureInfo .= '<script>setTimeout(()=>{
                $("#form-errors").remove();
            },4000);</script>';     
         }
         else { 
            $message = ' <br/> ' ;
            $message .= 'Nom:'.$name.'<br/>' ;
            $message .= 'Prénom'.$firstname.'<br/>';
            $message .= 'mail:'.$email.'<br>' ;
            $message .= 'message'.$comments;
    
            wp_mail('s.araissia@it-students.fr','le formulaire de contact',$message); 
            $captureInfo = '<div class="alert alert-success" id="form-valid" role="alert">Message envoyé </div>';
            $captureInfo .= '<script>setTimeout(()=>{
                $("#form-valid").remove();
            },4000);</script>';

            $name = '';
            $firstname = '';
            $email = '';
            $comments = '';
         }
         include_once(plugin_dir_path(__FILE__) . 'form.php');
         echo $captureInfo . $contents ;  
}
else {
    $captureInfo = '<div id="form-errors"> Error traitement formulaire ! </div>';
    include_once(plugin_dir_path(__FILE__) . 'form.php');
    echo $captureInfo . $contents ;    
}  
