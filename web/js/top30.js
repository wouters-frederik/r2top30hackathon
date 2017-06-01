jQuery(document).ready(function($){

    $('#mainform').formToWizard({
        submitButton: '#submitbutton'

    });

    console.log('koekoek');
    $('.input1').change(function(){
        console.log('inp');
        $('.inputname').html($('.input1').val());
    })
});