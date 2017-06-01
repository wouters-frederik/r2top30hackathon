jQuery(document).ready(function($){

    $('#mainform').formToWizard({
        submitButton: '#submitbutton'

    });

    $('#name').change(function(){
        $('.inputname').html($('#name').val());
    });

    $('.index fieldset input').focus();

    
});