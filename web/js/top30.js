jQuery(document).ready(function($){

    $('#mainform').formToWizard({
        submitButton: '#submitbutton'
    });

    $('#input1').change(function(){
        $('.inputname').html($('#input1').val());
    })
});