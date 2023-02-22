$('.result').html($('input[type="range"]').val());

let progress = $('#range').html() ;
if (progress != 0){
    progress = 100-progress;
    $('.result').html(progress);
}


$(document).on('input change', 'input[type="range"]', function() {
    progress = 100-$(this).val();
    $('.result').html(progress);
});
