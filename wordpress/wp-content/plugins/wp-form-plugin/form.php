<?php

$content = '
                 <form id="form-contact" method="post" action="">
                    <div class="form-row">
                        <div class="col-sm-6 mb-3">
                            <label for="your_name"></label>
                            <input type="text" name="your_name" id="your_name" class="form-control" placeholder="Entrer votre nom" value="' . $name . '"/>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="your_firstname"></label>
                            <input type="text" name="your_firstname" id="your_firstname" class="form-control" placeholder="Entrer votre prénom" value="' . $firstname . '" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="your_email"></label>
                        <input type="email" name="your_email" id="your_email" class="form-control" placeholder="Entrer votre mail" value="' . $email . '"/>
                    </div>
                    <div class="form-group">
                        <label for="your_comments"></label>
                        <textarea name="your_comments" class="form-control" id="your_comments" placeholder="Entrer vos questions">'. $comments .'</textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-9 mb-3 d-flex align-items-center justify-content-end pr-2">
                            <span>Cinq + Deux =</span>
                        </div>
                        <div class="col-3 mb-3">
                            <input type="text" class="form-control" id="captcha" name="captcha">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" name="formContactSubmit" class="btn btn-sm btn-send" id="formContactSubmit" "value="ENVOYER" />
                    </div>
                </form>
' ;
