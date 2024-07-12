$(document).ready(function() {
    $('.dropdowna .option a').on('click', function(e) {
        e.preventDefault();
        let sortBy = $(this).data('sort');
        let order = $(this).data('order');

        $.ajax({
            url: '/etude',
            method: 'GET',
            data: {
                sortBy: sortBy,
                order: order,
                ajax: true
            },
            success: function(data) {
                var blogContainer = $('#blog-container');
                blogContainer.empty();

                data.forEach(function(etu) {
                    var html = `
                        <div class="blog-box">
                            <div class="blog-img">
                                <a href="/etudeDetailer/${etu.id}">
                                    <img src="${etu.img}" alt="">
                                </a>
                            </div>
                            <div class="blog-text">
                                <span>
                                    <i class="fa-solid fa-calendar-days"></i> ${new Date(etu.created_at).toLocaleDateString('fr-FR', { day: 'numeric', month: 'long', year: 'numeric' })}
                                    <i class="bi bi-alarm" style="position: relative; left: 60px;"> ${etu.durré} Minute</i>
                                    <i class="fa-solid fa-award" style="position: relative; left: 100px;"> ${etu.point}</i>
                                </span>
                                <a href="/etudeDetailer/${etu.id}" class="blog-title">
                                    ${etu.libelle}
                                    ${etu.categorie_etude ? `<span class="badge">${etu.categorie_etude.libelle}</span>` : ''}
                                </a>
                                <p>${etu.description.substring(0, 100)}</p>
                            </div>
                        </div>
                    `;
                    blogContainer.append(html);
                });
            }
        });
    });
});
