$(document).ready(function() {
    $('#filterForm').on('submit', function(e) {
        e.preventDefault();

        let minPoints = $('#min_points').val();
        let maxPoints = $('#max_points').val();

        $.ajax({
            url: '/home',
            type: 'GET',
            data: {
                min_points: minPoints,
                max_points: maxPoints,
                ajax: true
            },
            success: function(data) {
                let recompensesContainer = $('#recomponse-container .row');
                recompensesContainer.empty();

                data.forEach(function(recompense) {
                    recompensesContainer.append(`
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    ${recompense.status == 0 ? '<span class="product-label label-out">En rupture de stock</span>' : ''}
                                    <a href="/produitDetailer/${recompense.id}">
                                        <img src="${recompense.img}" alt="Product image" class="product-image">
                                    </a>
                                    <div class="product-action">
                                        <a href="/produitDetailer/${recompense.id}" class="btn-product"><span><i class="bi bi-eye"></i> Consulter Le Produit</span></a>
                                    </div>
                                </figure>
                                <div class="product-body">
                                    <div class="product-cat">
                                        ${recompense.categorie_recomponse && recompense.categorie_recomponse[0] ? '<a>' + recompense.categorie_recomponse[0].libelle + '</a>' : '<a>Non catégorisé</a>'}
                                    </div>
                                    <h3 class="product-title"><a>${recompense.libelle}</a></h3>
                                    <div class="product-price">
                                        <i class="me-2 fa-solid fa-award" style="position: relative; right: 3px;"></i> ${recompense.points}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        });
    });
});