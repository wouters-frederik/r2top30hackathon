jQuery(document).ready(function($){

    $('#mainform').formToWizard({
        submitButton: '#submitbutton'

    });

    $('#name').change(function(){
        $('.inputname').html($('#name').val());
    });

    $('#mainform input,#mainform select').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
});