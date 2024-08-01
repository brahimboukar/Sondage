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

                        <a href="#" class="logo">
                            <img src="{{asset('assets/admin/asset/images/terrain360.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="#" >Liste Des Produits</a>
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
                    @if(Session::get('succ'))
                    <div class="alert alert-success" role="alert" >
                        {{ Session::get('succ') }}
                    </div>
                    @endif
        			<h1 class="page-title">Liste Des Produits<span>Boutique</span></h1>
                    {{-- <img src="{{ asset($recomponse->img) }}" alt="Product image" class="product-image"> --}}
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info" style="position: relative;margin-top: 57px;">
                						Affichage de <span>12 sur {{$recomponseCount}}</span> Produit
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						{{-- <label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select  class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div> --}}
                                        {{-- ['point' => $rec->points] --}}
                                        
                                        {{-- <a href="{{url('/home?sortBy=points&order=asc')}}"><button type="button" class="btn btn-primary btn-round btn-shadow" style="position: relative;top: 5px;">De - aux + Point</button></a>
                                        <a href="{{url('/home?sortBy=points&order=desc')}}"><button class="btn btn-primary btn-round btn-shadow" style="position: relative;top: 5px;left: 20px;">De + aux - Point</button></a>
                                        <a href="{{url('/home?sortBy=created_at&order=desc')}}"><button class="btn btn-primary btn-round btn-shadow" style="position: relative;top: 5px;left: 30px;">Le Plus Récent</button></a>
                                        <a href=""><button class="btn btn-primary btn-round btn-shadow" style="position: relative;top: 5px; left: 40px;">Le Plus Demander</button></a> --}}
                                        {{-- <div class="dropdowna">
                                            <input type="text" class="textBox" placeholder="Trier Par : " readonly>
                                            <div class="option">
                                                <a href="{{url('/home?sortBy=points&order=asc')}}"><div onclick="show('De - aux + Point')">De - aux + Point</div></a>
                                                <a href="{{url('/home?sortBy=points&order=desc')}}"><div onclick="show('De + aux - Point')">De + aux - Point</div></a>
                                                <a href="{{url('/home?sortBy=created_at&order=desc')}}"><div onclick="show('Le Plus Récent')">Le Plus Récent</div></a>
                                                <a href="{{url('/home?sortBy=demande_count&order=desc')}}"><div onclick="show('Le Plus Demander')">Le Plus Demander</div></a>
                                            </div>
                                        </div> --}}

                                        <div class="dropdowna" style="position: relative;margin-top: 50px;">
                                            <input type="text" class="textBox" placeholder="Trier Par : " readonly>
                                            <div class="option">
                                                <a href="#" data-sort="points" data-order="asc"><div onclick="show('De - aux + Point')">De - aux + Point</div></a>
                                                <a href="#" data-sort="points" data-order="desc"><div onclick="show('De + aux - Point')">De + aux - Point</div></a>
                                                <a href="#" data-sort="created_at" data-order="desc"><div onclick="show('Le Plus Récent')">Le Plus Récent</div></a>
                                                <a href="#" data-sort="demande_recomponses_count" data-order="desc"><div onclick="show('Le Plus Demandé')">Le Plus Demandé</div></a>
                                            </div>
                                        </div>
                                      
                					</div><!-- End .toolbox-sort -->
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->
                            
                            <div class="products mb-3" id="recomponse-container">
                                <div class="row justify-content-start">
                                    @foreach($recomponse as $rec)
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">
                                                    @if($rec->status == 0)
                                                        <span class="product-label label-out">En rupture de stock</span>
                                                    @endif
                                                    <a href="{{ url('produitDetailer/' . $rec->id) }}">
                                                        <img src="{{ asset($rec->img) }}" alt="Product image" class="product-image">
                                                    </a>
                                                    <div class="product-action">
                                                        <a href="{{ url('produitDetailer/' . $rec->id) }}" class="btn-product"><span><i class="bi bi-eye"></i> Consulter Le Produit</span></a>
                                                    </div>
                                                </figure>
                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a class="badge">{{ $rec->categorie_recomponse->libelle }}</a>
                                                    </div>
                                                    <h3 class="product-title"><a>{{ $rec->libelle }}</a></h3>
                                                    <div class="product-price">
                                                        <i class="me-2 fa-solid fa-award" style="position: relative; right: 3px;"></i> {{ $rec->points }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="pagination-container" class="d-flex justify-content-center">
                                {{ $recomponse->links() }}
                            </div>
                            
                            
                            
                            
                            
                            
                            <!-- End .products -->
                            {{-- @if(isset($recomponses))
                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                   @foreach($recomponse as $rec)
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                @if($rec->status ==0)
                                                <span class="product-label label-out">En rupture de stock</span>
                                                @endif
                                                <a href="{{url ('produitDetailer/'.$rec->id.'')}}">
                                                    <img src="{{ asset($rec->img) }}" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action">
                                                    <a href="{{url ('produitDetailer/'.$rec->id.'')}}" class="btn-product "><span><i class="bi bi-eye"> </i>Consulter Le Produit</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a>{{$rec->categorie_recomponse[0]->libelle}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a >{{$rec->libelle}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                <i class="me-2 fa-solid fa-award" style="position: relative;right: 3px;"></i> {{$rec->points}} 
                                                </div><!-- End .product-price -->
                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->
                            @endif --}}

                			<nav aria-label="Page navigation">
							    {{-- <ul class="pagination justify-content-center">
							        {{$recomponse->links()}}
							    </ul> --}}
							</nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			<div class="sidebar sidebar-shop" style="position: relative;margin-top: 50px;">
                				<div class="widget widget-clean">
                					<label>Filtrer Par :</label>
                					{{-- <a href="{{ route('profile') }}" class="sidebar-filter-clear">Nettoie tout</a> --}}
                                    <a href="{{url ('/home')}}">Nettoie tout</a>
                				</div><!-- End .widget widget-clean -->
                				<div class="widget widget-collapsible">
    								<h3 class="widget-title">
									    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
									        Categorie
									    </a>
									</h3><!-- End .widget-title -->
                                    
									<div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <div class="filter-item">
                                                    <ul class="list-unstyled">
                                                        @foreach($CatReco as $cat)
                                                            <div class="checkbox-wrapper-21">
                                                                
                                                                    <input type="checkbox"  class="category-filter" id="category_{{ $cat->id }}" value="{{ $cat->id }}" />
                                                                    
                                                                    <label  for="category_{{ $cat->id }}">{{ $cat->libelle }}</label>
                                                                    
                                                                    <span  style="position: absolute; left: 250px;">{{ $cat->recompenses->count() }}</span>
                                                                
                                                            </div><!-- End .custom-checkbox -->
                                                        @endforeach
                                                        
                                                          
                                                    </ul>
                                                </div><!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div>
                                    <!-- End .collapse -->
        						</div><!-- End .widget -->
                                <div class="widget widget-collapsible">
    								<h3 class="widget-title">
                                        
									    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
									        Point
									    </a>
									</h3><!-- End .widget-title -->
                                    <div class="collapse show" id="widget-5">
                                        <form id="filterForm" method="GET" action="{{ url('/home') }}">
                                            <label for="min_points">Points minimum :</label>
                                            <input type="range" id="min_points" name="min_points" class="slider" min="0" max="{{ $minPoints }}" value="0" oninput="this.nextElementSibling.value = this.value">
                                            <output>0</output>
                                            <br>
                                            
                                            <label for="max_points">Points maximum :</label>
                                            <input type="range" id="max_points" name="max_points" class="slider" min="{{ $minPoints }}" max="{{ $maxPoints }}" value="{{ $maxPoints }}" oninput="this.nextElementSibling.value = this.value">
                                            <output style="position: absolute;">{{ $maxPoints }}</output>
                                            <br>
                                            
                                            <button type="submit" class="btn btn-primary btn-round btn-shadow">Filtrer</button>
                                        </form>
                                    </div>
        						</div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
            </div>
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