$(document).ready(function () { //alert();

    $('.Submitter').click(function (e) { 
        e.preventDefault();
        ruta=$(this).attr('href');
        ruta_nueva='actions/'+ruta+'.php';
        $(this).attr('href',ruta_nueva);
        window.location=$(this).attr('href');
    });
    

});

