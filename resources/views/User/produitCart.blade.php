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
    <link rel="stylesheet" href="{{asset('assets/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/main.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user/css/plugins/magnific-popup/magnific-popup.css')}}">
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
                                <li class="megamenu-container">
                                    <a href="{{route('home')}}" >Liste Des Produits</a>
                                </li>
                                <li>
                                    <a href="{{route('etude')}}" >Liste Des Etudes</a>
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
                                        <h4 class="compare-product-title"><a href="#">Panier Mes Produit</a></h4>
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
                    
        			<h1 class="page-title">Panier<span>Des Produit Demander</span></h1>
                    {{-- <img src="{{ asset($recomponse->img) }}" alt="Product image" class="product-image"> --}}
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <div class="pb-5">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        @if($demandes->isEmpty())
                            <p><strong> n'avez pas Demandé aucune Récompense.</strong></p>
                        @else
                      <!-- Shopping cart table -->
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Produit</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Libelle</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Categorie</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Point</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Etat</div>
                              </th>
                              <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Date</div>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($demandes as $demande)
                            <tr>
                              <th scope="row" class="border-0">
                                <div class="p-2">
                                  <img src="{{ $demande->recomponse->img }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                  
                                </div>
                              </th>
                              <td class="border-0 align-middle"><strong>{{ $demande->recomponse->libelle }}</strong></td>
                              <td class="border-0 align-middle">{{ $demande->recomponse->categorie_recomponse->libelle }}</td>
                              <td class="border-0 align-middle">{{ $demande->recomponse->points }}</td>
                              <td class="border-0 align-middle">{{ $demande->etat }}</td>
                              <td class="border-0 align-middle"><strong>{{ $demande->date->locale('fr')->translatedFormat('d F Y') }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- End -->
                      @endif
                    </div>
                  </div>
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
    <script src="{{asset('assets/user/js/trieMoins.js')}}"></script>
    <script src="{{asset('assets/user/js/filter.js')}}"></script>
    <script src="{{asset('assets/user/js/filterRecomponse.js')}}"></script>
    
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