$(document).ready(function(){
    $('.btn').click(function(){
        var id = $(this).data('li'); // Récupère l'ID de la catégorie ou "all"
        $.ajax({
            url: '/etudes/filter/' + id,
            method: 'GET',
            success: function(data){
                console.log(data); 
                var container = $('#blog-container');
                container.empty();
                $.each(data, function(index, etude){
                    var createdAtDate = new Date(etude.created_at);
                    var formattedDate = createdAtDate.toLocaleDateString('fr-FR', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });

                    var blogBox = `
                    <div class="blog-box">
                        <div class="blog-img">
                            <a href="etudeDetailer/${etude.id}">
                                <img src="${etude.img}" alt="">
                            </a>
                        </div>
                        <div class="blog-text">
                            <span>
                                <i class="fa-solid fa-calendar-days"></i> ${formattedDate}
                                <i class="bi bi-alarm" style="position: relative;left: 60px;"> ${etude.durré} Minute</i>
                                <i class="fa-solid fa-award" style="position: relative;left: 100px;"> ${etude.durré}</i>
                            </span>
                            <a href="etudeDetailer/${etude.id}" class="blog-title">
                                ${etude.libelle}
                                ${etude.categorie_etude ? `<span class="badge">${etude.categorie_etude.libelle}</span>` : ''}
                            </a>
                            <p>${etude.description.substring(0, 100)}</p>
                        </div>
                    </div>`;
                    container.append(blogBox);
                });
            }
        });
    });
});
