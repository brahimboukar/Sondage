$(document).ready(function() {
    // Fonction pour récupérer les récomponses avec les filtres
    function fetchRecompenses() {
        let minPoints = $('#min_points').val();
        let maxPoints = $('#max_points').val();
        let sortBy = $('#sortBy').val();
        let order = $('#order').val();
        let categoryIds = [];
        $('.category-filter:checked').each(function() {
            categoryIds.push($(this).val());
        });

        $.ajax({
            url: '/home',
            type: 'GET',
            data: {
                min_points: minPoints,
                max_points: maxPoints,
                sortBy: sortBy,
                order: order,
                id_categories: categoryIds, // Passer le tableau des ids de catégorie
                ajax: true
            },
            success: function(response) {
                let recompensesContainer = $('#recomponse-container .row');
                recompensesContainer.empty();

                $.each(response.data, function(index, rec) {
                    let statusLabel = rec.status == 0 ? '<span class="product-label label-out">En rupture de stock</span>' : '';
                    let categoryLabel = rec.categorie_recomponse ? rec.categorie_recomponse.libelle : 'Non catégorisé';
                    recompensesContainer.append(`
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    ${statusLabel}
                                    <a href="/produitDetailer/${rec.id}">
                                        <img src="${rec.img}" alt="Product image" class="product-image">
                                    </a>
                                    <div class="product-action">
                                        <a href="/produitDetailer/${rec.id}" class="btn-product"><span><i class="bi bi-eye"></i> Consulter Le Produit</span></a>
                                    </div>
                                </figure>
                                <div class="product-body">
                                    <div class="product-cat">
                                        <a class="badge">${categoryLabel}</a>
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

                $('#pagination-container').html(response.links);
            }
        });
    }

    // Écoute les changements des cases à cocher pour le filtrage par catégorie
    $(document).on('change', '.category-filter', function() {
        fetchRecompenses();
    });

    // Déclenche la soumission du formulaire lors du changement des filtres
    $('#filterForm').on('submit', function(e) {
        e.preventDefault();
        fetchRecompenses();
    });

    // Écoute les changements du tri
    $('#sortBy, #order').on('change', function() {
        fetchRecompenses();
    });

    // Écoute les changements des curseurs
    $('#min_points, #max_points').on('input', function() {
        $(this).next('output').text($(this).val());
    });

    // Déclenche le filtrage au chargement initial
    fetchRecompenses();
});
