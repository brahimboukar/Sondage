<!DOCTYPE html>
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Application Sondage</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/nouislider/nouislider.css')}}">
    
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
                                <li class="megamenu-container active">
                                    <a href="{{route('produit')}}" >Liste Des Produits</a>
                                </li>
                                <li>
                                    <a href="{{route('etude')}}" >Liste Des Etudes</a>
                                </li>
                                <li>
                                    <a href="{{route('evenement')}}" >Liste Des Evenements</a>
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
                                        <a href="#"  title="Remove Product"></a>
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
            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image" style="position: relative;right: 150px;">
                                            <img id="product-zoom" src="{{ asset($recomponse->img) }}" data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image">
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details" style="position: relative;top:40px;right: 40px;">
                                    <h1 class="product-title">{{$recomponse->libelle}}</h1><!-- End .product-title -->

                                    <div class="product-price">
                                        <i class="me-2 fa-solid fa-award" style="position: relative;right: 3px;"></i> {{$recomponse->points}}
                                    </div><!-- End .product-price -->

                                    

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Status:</label>
                                        <div class="product-details-quantity">
                                            @if($recomponse->status ==1)
                                                <span class="badge bg-success" style="font-size: 15px;color: wheat;">En Stock</span>
                                            @endif
                                             @if($recomponse->status ==0)
                                                <span class="badge bg-danger" style="font-size: 15px;color: wheat;">Epuisé</span>
                                            @endif
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        @if($recomponse->status == 1)
    <span style="position: relative; font-size: 20px; bottom: 20px;">
        <i class="fa-solid fa-circle-check" style="color: #BFD641;"></i> Disponible
    </span>

    @if($recomponse->points > $user->points)
        <span class="badge bg-danger" style="font-size: 15px;color: wheat;position: relative;right: 120px;top:20px;">votre solde de point n'est pas suffisant </span>
        <button disabled class="btn btn-primary btn-round btn-shadow" style="position: relative; top: 30px; cursor: not-allowed;">Demander</button>
    @else
    <form action="{{route('DemandeRecomponse')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}" />
        <input type="hidden" name="recomponse_id" value="{{$recomponse->id}}" />
        <button type="submit" class="btn btn-primary btn-round btn-shadow" id="btn1" style="position: relative; top: 20px; right: 130px;">Demander</button>
    </form>
    @endif
@endif

                                        @if($recomponse->status ==0)
                                        <span style="position: relative;font-size: 20px;bottom: 20px;"><i class="fa-regular fa-circle-xmark" style="color: #D20103"></i> Non Disponible</span>
                                        <button hidden class="btn btn-primary btn-round btn-shadow" style="position: relative;top: 20px;">Demander</button>
                                        
                                        @endif

                                       
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer" style="position: relative;top: 50px;">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <span>{{$recomponse->categorie_recomponse->libelle}}</span>
                                        </div><!-- End .product-cat -->
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    

                    

                    
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer">

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>