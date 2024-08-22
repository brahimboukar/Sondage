<!DOCTYPE html>
<html lang="en">


<!-- molla/category-4cols.html  22 Nov 2019 10:02:52 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Application Sondage</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/main.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/snack.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/user/css/blog.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/etudeDetailer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/nouislider/nouislider.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
.button_grp {
    max-height: 300px; /* Ajustez la hauteur en fonction de vos besoins */
    overflow-y: auto; /* Ajoute une scrollbar verticale lorsque le contenu dépasse la hauteur */
}

.button_grp ul {
    list-style: none; /* Supprime les puces des éléments de liste */
    padding: 0;
    margin: 0;
}

.button_grp ul li {
    background: #fff;
    margin: 10px;
    padding: 10px 15px;
    min-width: 80px;
    text-align: center;
    border-radius: 20px;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 1px 1px 3px rgba(0,0,0,0.125);
}

.button_grp ul li.active,
.button_grp ul li:hover {
    background: #A6C76C;
    color: #fff;
}


    </style>
</head>

<body>
    <div class="page-wrapper">
        <header class="header">

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">

                        <a href="{{route('home')}}" class="logo">
                            <img src="{{asset('assets/admin/asset/images/terrain360.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li>
                                    <a href="{{route('home')}}" >Liste Des Produits</a>
                                </li>
                                <li>
                                    <a href="{{route('etude')}}" >Liste Des Etudes</a>
                                </li>
                                <li class="megamenu-container active">
                                    <a href="#" >Liste Des Événements</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" style="position: relative;right: 60px;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Profile" aria-label="Compare Products">
                                <i class="bi bi-person"></i><h6 style="position: relative;top:8px;">{{ $user->nom }} {{ $user->prenom }}</h6>
                            </a>
                            
                                <i class="me-2 fa-solid fa-award"></i><h6 style="position: relative;top:8px;left: 2px;"> {{ $user->points }} </h6>
                          
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="compare-products">
                                    <li class="compare-product">
                                        <h4 class="compare-product-title"><a href="{{route('profile')}}">Consulter Votre Profil</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        <h4 class="compare-product-title"><a href="{{route('produitCart')}}">Panier Mes Produit</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        
                                        <h4 class="compare-product-title"><a href="{{route('logout')}}">Logout</a></h4>
                                    </li>
                                </ul>
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .compare-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('{{('assets/user/images/page-header-bg.jpg')}}')">
        		<div class="container">
                    @if(Session::get('success'))
                    <div id="snackbar" class="snackbar">
                    <i style="position: relative;right: 5px;color: #34d30cb6;font-size: 25px;" class="me-2 bi bi-check2-circle"></i> {{ Session::get('success') }} <i class="bi bi-hand-thumbs-up-fill" style="position: relative;left: 2px;font-size: 18px;"></i>
                        <button class="close-btn" onclick="hideSnackbar()">×</button>
                    </div>
                    @endif
        			<h1 class="page-title">Liste Des Événements<span>Disponible</span></h1>
                    {{-- <img src="{{ asset($recomponse->img) }}" alt="Product image" class="product-image"> --}}
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="page-content">

                {{-- <div class="button_grp" >
                    <ul class="d-flex justify-content-center">
                        <li data-li="all" class="btn">Tout</li>
                        @foreach($categorieEtude as $cat)
                        <li data-li="{{ $cat->id }}" class="btn">{{ $cat->libelle }}</li>
                        @endforeach
                    </ul>
                </div> --}}
                
                	{{-- @if($etude->count() ==0)
                		<h1><span> Aucun Etude correspand Pour Votre profile</span></h1>
                    @endif --}}
                   
                    <section id="blog">
                        {{-- <div class="dropdowna" style="position: relative;left: 980px;">
                            <input type="text" class="textBox" placeholder="Trier Par : " readonly>
                            <div class="option">
                                <a href="#" data-sort="point" data-order="asc"><div onclick="show('De - aux + Point')">De - aux + Point</div></a>
                                <a href="#" data-sort="point" data-order="desc"><div onclick="show('De + aux - Point')">De + aux - Point</div></a>
                                <a href="#" data-sort="durré" data-order="asc"><div onclick="show('De - aux + Durré')">De - aux + Durré</div></a>
                                <a href="#" data-sort="durré" data-order="desc"><div onclick="show('De + aux - Durré')">De + aux - Durré</div></a>
                                <a href="#" data-sort="created_at" data-order="asc"><div onclick="show('La Date De Publication')">La Date De Publication</div></a>
                            </div>
                        </div> --}}
                        <div class="blog-heading"></div>
                        <div class="blog-container" id="blog-container">
                            @foreach($evenement as $eve)
                            <div class="blog-box">
                                <div class="blog-img">
                                    <a href="{{ url('evenementDetailer/'.$eve->id) }}">
                                        <img src="{{ $eve->img }}" alt="">
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <span>
                                        <i class="fa-solid fa-calendar-days"></i> {{ $eve->created_at->locale('fr')->translatedFormat('d F Y') }}
                                    </span>
                                    <a href="{{ url('evenementDetailer/'.$eve->id) }}" class="blog-title">
                                        {{ $eve->libelle }}
                                    </a>
                                    <p>{{ Str::limit($eve->description, 100) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                     

                			
                		
                		
                	
            
        </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer">

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © 2024 Terrain360. All Rights Reserved.</p><!-- End .footer-copyright -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Plugins JS File -->
    <script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/user/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/user/js/superfish.min.js')}}"></script>
    <script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/user/js/wNumb.js')}}"></script>
    <script src="{{asset('assets/user/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('assets/user/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/user/js/nouislider.min.js')}}"></script>
    <script src="{{asset('assets/user/js/etudeFilter.js')}}"></script>
    <script src="{{asset('assets/user/js/trieEtude.js')}}"></script>
    <script src="{{asset('assets/js/snack.js')}}"></script>
    
    
    <!-- Main JS File -->
    <script src="{{asset('assets/user/js/main.js')}}"></script>
    <script>
        function show(anything){
            document.querySelector('.textBox').value = anything;
        }
        let dropdowna = document.querySelector('.dropdowna');
        dropdowna.onclick = function(){
            dropdowna.classList.toggle('active');
        }
        
    </script>
    
    
    
</body>
</html>