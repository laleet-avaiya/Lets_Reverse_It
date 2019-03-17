

$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$('document').ready(function()
{
    $('textarea').each(function(){
            $(this).val($(this).val().trim());
        }
    );
}); 



        

function textCounter(field,field2,maxlimit)
{
var countfield = document.getElementById(field2);
if ( field.value.length > maxlimit ) {
field.value = field.value.substring( 0, maxlimit );
return false;
} else {
countfield.value = maxlimit - field.value.length;
}
}

