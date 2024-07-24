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
    <style>
        a{
    text-decoration: none;
}
ul{
    list-style: none;
}
#blog{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 40px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.blog-heading{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.blog-heading span {
    color: #f33c3c;
}
.blog-heading h3 {
    font-size: 7.4rem;
    color: #2b2b2b;
    font-weight: 900;
}
.blog-container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0px;
    flex-wrap: wrap;
}
.blog-box{
    width: 800px;
    height: 100%;
    bottom: 50px;
    background-color: #ffffff;
    border: 1px solid #ececec;
    margin: 20px;
}
.blog-text{
    padding: 30px;
    display: flex;
    flex-direction: column;
}
.blog-text span{
    color: #f33c3c;
    font-size: 1.8rem;
}
.blog-text .blog-title{
    font-size: 2.9rem;
    font-weight: 500;
    color: #272727;
}
.blog-text .blog-title:hover{
    color: #f33c3c;
    transition: all ease 0.3s;
}
.img-fluid{
    width: 100%;
    height: 300px;
    object-fit: cover;
    margin-bottom: 20px;
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
                                <li class="megamenu-container active">
                                    <a href="#" >Liste Des Etudes</a>
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
        
                {{-- <section id="blog">

                    <div class="blog-container">
                        <div class="blog-box">
                            <div class="blog-text">
                                <a href="#" class="blog-title">{{$etude->libelle}}</a>
                                <span>{{$etude->description}}</span>
                                <span><i class="fa-solid fa-stopwatch"></i> {{$etude->durré}}min  <i class="me-2 fa-solid fa-award" style="left:100px;position: relative;"></i> <span style="left:100px;position: relative;">{{$etude->point}}</span></span>
                                <form method="POST" action="{{route('EtudeUsers',['etudeId' => $etude->id, 'userId' => Auth::id(), 'idEtude' => $etude->id])}}">
                                    @csrf
                                    <input type="hidden" name="etude_id" value="{{$etude->id}}" />
                                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                                    <input type="hidden" name="lien" value="{{$etude->lien}}" />
                                <button type="submit" class="btn btn-primary btn-round btn-shadow" style="position: relative;top:10px;">Passer</button>
                                </form>
                                {{-- href="{{$etude->lien}}?id={{$user->id}}&&idEtude={{$etude->id}}" --}}
                            {{-- </div> --}}
                           
                        {{-- </div> --}}
                    {{-- </div> --}}
                    
                {{-- </section>  --}}

                 <!-- Page content-->
        {{-- <div class="container mt-7">
            <div class="row">
                <div class="col-lg-15">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset($etude->img) }}" /></figure>
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$etude->libelle}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Publier en {{ $etude->created_at->locale('fr')->translatedFormat('d F Y') }}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary" href="#!">{{ $etude->categorie_etude->libelle }}</a>
                            
                        </header>
                        
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$etude->description}}</p>
                            
                            
                        </section>
                    </article>
                    <!-- Comments section-->
                    
                </div>
                <!-- Side widgets-->
              
            </div>
        </div> --}}
        <section class="section-sm">
            <div class="container">
              <div class="row">
                <div class="col-12 mb-4">
                  <!-- course thumb -->
                  <img src="{{ asset($etude->img) }}" class="img-fluid w-100">
                  
                </div>
              </div>
              <!-- course info -->
              <div class="row align-items-center mb-5">
                <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
                  <h2>{{$etude->libelle}}</h2>
                </div>
                <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
                  <ul class="list-inline text-xl-center">
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                      <div class="d-flex align-items-center">
                        <i class="ti-book text-primary icon-md mr-2"></i>
                        <div class="text-left">
                          <h6 class="mb-0">CATÉGORIE</h6>
                          <p class="mb-0">{{ $etude->categorie_etude->libelle }}</p>
                        </div>
                      </div>
                    </li>
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                      <div class="d-flex align-items-center">
                        <i class="ti-alarm-clock text-primary icon-md mr-2"></i>
                        <div class="text-left">
                          <h6 class="mb-0">DURRÉ</h6>
                          <p class="mb-0">{{$etude->durré}} Minute</p>
                        </div>
                      </div>
                    </li>
                    <li class="list-inline-item mr-4 mb-3 mb-sm-0">
                      <div class="d-flex align-items-center">
                        <i class="ti-wallet text-primary icon-md mr-2"></i>
                        <div class="text-left">
                          <h6 class="mb-0">POINT</h6>
                          <p class="mb-0">{{$etude->point}}</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
                    <form method="POST" action="{{route('EtudeUsers',['etudeId' => $etude->id, 'userId' => Auth::id(), 'idEtude' => $etude->id])}}">
                        @csrf
                        <input type="hidden" name="etude_id" value="{{$etude->id}}" />
                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <input type="hidden" name="lien" value="{{$etude->lien}}" />
                    <button type="submit" class="btn btn-primary">Passer Maintenant</button>
                    </form>
                  {{-- <a href="course-single.html" class="btn btn-primary">Passer Maintenant</a> --}}
                </div>
                
                <!-- border -->
                <div class="col-12 mt-4 order-4">
                    <div class="text-muted fst-italic mb-2">Publier en {{ $etude->created_at->locale('fr')->translatedFormat('d F Y') }}</div>
                  <div class="border-bottom border-primary"></div>
                </div>
              </div>
              <!-- course details -->
              <div class="row">
                <div class="col-12 mb-4">
                  <h3>Description</h3>
                  <p>{{$etude->description}}</p>
                </div>
                
                
                
                <!-- teacher -->
                
              </div>
            </div>
          </section>
        
                  
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