function show(text) {
    $('.textBox').val(text);
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('a').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                $('.recomponses-list').html('');
                $.each(data.recomponses, function(index, recomponse) {
                    $('.recomponses-list').append('<div>' + recomponse.libelle + ' (' + recomponse.demande_recomponses_count + ')</div>');
                });
            }
        });
    });
});