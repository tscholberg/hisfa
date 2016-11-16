$(document).ready(function () {
    //tel aantal items die aangevinkt moeten zijn om in aanmerking te komen voor admin rechten
    var permissionItems = $('.checkalladmin').length;

    //indien een permissionitem van status wijzigt
    $(".checkalladmin").change(function () {
        //controleer of alle items om admin te kunnen worden aangevinkt zijn
        if ($('.checkalladmin:checked').length == permissionItems) {
            //indien ja, vink admin vakje aan
            $('#checkboxAdmin').prop('checked', true);
        } else {
            //indien nee, vink admin vakje uit
            $('#checkboxAdmin').prop('checked', false);
        }
    });

    //wanneer admin vakje aangeklikt wordt
    $('#checkboxAdmin').click(function () {
        //indien adminvakje aangevinkt is
        if ($("#checkboxAdmin").is(':checked')) {
            //ja, geef alle andere (behalve #checkboxAdmin) permissievakjes een vinkje
            $('input:checkbox').not(this).prop('checked', this.checked);
        } else {
            //nee, vink alle modify vakjes uit
            $('.permissionmodify').prop('checked', false);
        }
    });

});