jQuery(document).ready(function($){
    $('form').submit(function(){
        buttons = $('input[type="submit"], button[type="submit"]');
        buttons.prop('disabled', true);
        buttons.val('Submitting...');
        return true;
    });
});