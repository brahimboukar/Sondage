$(document).ready(function() {
    $('.dropdowna .option a').on('click', function(e) {
        e.preventDefault();
        let sortBy = $(this).data('sort');
        let order = $(this).data('order');

        $.ajax({
            url: '/home',
            method: 'GET',
            data: {
                sortBy: sortBy,
                order: order,
                ajax: true
            },
            success: function(response) {
                let recompensesContainer = $('#recomponse-container .row');
                recompensesContainer.empty();

                $.each(response, function(index, rec) {
                    let statusLabel = rec.status == 0 ? '<span class="product-label label-out">En rupture de stock</span>' : '';
                    let categoryLabel = rec.categorie_recomponse && rec.categorie_recomponse.length > 0 ? rec.categorie_recomponse[0].libelle : 'Non catégorisé';
                    recompensesContainer.append(`
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3 recomponse-item">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    ${statusLabel}
                                    <a href="produitDetailer/${rec.id}">
                                        <img src="${rec.img}" alt="Product image" class="product-image">
                                    </a>
                                    <div class="product-action">
                                        <a href="produitDetailer/${rec.id}" class="btn-product">
                                            <span><i class="bi bi-eye"></i> Consulter Le Produit</span>
                                        </a>
                                    </div>
                                </figure>
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a>${categoryLabel}</a>
                                    </div>
                                    <h3 class="product-title"><a>${rec.libelle}</a></h3>
                                    <div class="product-price">
                                        <i class="me-2 fa-solid fa-award" style="position: relative; right: 3px;"></i> ${rec.points}
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
