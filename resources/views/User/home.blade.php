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

                        <a href="index.html" class="logo">
                            <img src="{{asset('assets/admin/asset/images/terrain360.png')}}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="#" >Liste Des Produits</a>
                                </li>
                                <li>
                                    <a href="#" >Liste Des Etudes</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="dropdown compare-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Profile" aria-label="Compare Products">
                                <i class="bi bi-person"></i><h6 style="position: relative;top:8px;">BOUKAR BRAHIM</h6>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="compare-products">
                                    <li class="compare-product">
                                        <a href="#"  title="Remove Product"></a>
                                        <h4 class="compare-product-title"><a href="product.html">Consulter Votre Profil</a></h4>
                                    </li>
                                    <li class="compare-product">
                                        <a href="#"  title="Remove Product"></a>
                                        <h4 class="compare-product-title"><a href="product.html">Logout</a></h4>
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
                					<div class="toolbox-info">
                						Affichage de <span>12 sur {{$recomponseCount}}</span> Produits
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select  class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->

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


                			<nav aria-label="Page navigation">
							    <ul class="pagination justify-content-center">
							        {{$recomponse->links()}}
							    </ul>
							</nav>
                		</div><!-- End .col-lg-9 -->
                		<aside class="col-lg-3 order-lg-first">
                			<div class="sidebar sidebar-shop">
                				<div class="widget widget-clean">
                					<label>Filtrer Par :</label>
                					<a href="#" class="sidebar-filter-clear">Clean All</a>
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
                                                    @foreach($CatReco as $cat)
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" id="{{$cat->libelle}}" value="{{$cat->id}}">
														<label class="custom-control-label" for="{{$cat->libelle}}">{{$cat->libelle}}</label>
													</div><!-- End .custom-checkbox -->
													{{-- <span class="item-count">3</span> --}}
                                                    @endforeach
												</div><!-- End .filter-item -->
			
											</div><!-- End .filter-items -->
										</div><!-- End .widget-body -->
									</div><!-- End .collapse -->
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
    <!-- Main JS File -->
    <script src="{{asset('assets/user/js/main.js')}}"></script>
</body>
</html>