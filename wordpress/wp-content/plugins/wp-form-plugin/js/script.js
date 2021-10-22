
verifEmail = (email) => {
  const regEmail = new RegExp('^[0-9a-z._-]{2,}[@]{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,}$','i');
  return regEmail.test(email);
}

 $(document).ready(function () {
    $('#formContactSubmit').on('click', function(e) {
        e.preventDefault();
        let errors = []; 
        $('#form-errors').remove();

        const name = $('#your_name').val();
        const firstname = $('#your_firstname').val();
        const email = $('#your_email').val();
        const message = $('#your_comments').val();

        const captcha = $('#captcha').val();

        if(name.length === 0){
           errors.push('- Nom inexistant ou trop court !');
        }
        if(firstname.length === 0){
            errors.push('- Prénom inexistant ou trop court !');
        }
        if(verifEmail(email) === false){
            errors.push('- Email inexistant ou trop court !');
        }
        if (captcha  != '7' && captcha != 'sept') {
            errors.push('- Captcha incorrect !');

        }
        if(message.length < 50){
            errors.push('- Commentaire inexistant ou trop court !');
        }
        if(errors.length > 0 ) {
            let content = '';
            errors.forEach(element => {
                content += '<p>' + element + '</p>';
            });
            $('#form-contact').before('<div class="alert alert-danger" id="form-errors"  role="alert">' + content + '</div>');
           setTimeout(()=>{
                $("#form-errors").remove();
            },7000);
        }
        else {
            $('#form-contact').submit();
        }
    });
});




