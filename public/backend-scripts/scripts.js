/**
 * control show and hide inputs
 * @param id
 */

function hideShowBySelect(id) {
        $('.hideShow').prop("disabled", true);
        $('.hideShow').addClass("hidden");
        var classToShow = $("#"+id).val();
        if (classToShow != 'no'){
            $('.'+classToShow).prop("disabled", false);
            $('.'+classToShow).removeClass("hidden");
        }



}






