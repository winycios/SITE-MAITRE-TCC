
$(document).ready(function() {

    $('#link1').on('change', function() {

        
        var url = $(this).val();
        if (url == '#adicionar') {
            window.open(url, '_top');
        }
        return false;
    });
});


$(document).ready(function() {

    $('#link2').on('change', function() {
        
        
        var url = $(this).val();
        if (url == '#adicionar') {
            window.open(url, '_top');
        }
        return false;
    });
});
