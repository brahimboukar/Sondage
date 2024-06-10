
<!--Website: wwww.codingdung.com-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodingDung | Profile Template</title>
    <link rel="stylesheet" href="{{asset('assets/user/css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                <li class="megamenu-container">
                                    <a href="{{route('home')}}" >Liste Des Produits</a>
                                </li>
                                <li>
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
    </div>
    <div class="container light-style flex-grow-1 container-p-y" style="position: relative;bottom: 450px;">
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form method="POST" action="/profile/{{ $user->id }}/update">
                                @csrf
                                @method('PUT')
                            <hr class="border-light m-0">
                            <div class="card-body">
                                @if(Session::get('success'))
                                <div class="alert alert-success" role="alert" >
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control mb-1" value="{{ $user->nom }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Prenom</label>
                                    <input type="text" name="prenom" class="form-control" value="{{ $user->prenom }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" name="email" class="form-control mb-1" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Numero Telephone</label>
                                    <input type="number" name="telephone" class="form-control" value="{{ $user->telephone }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sexe</label>
                                    <select class="form-control" name="id_sexe"   required>
                                        @if($user->sexes[0]->libelle == 'Homme')
                                        <option value="1">Homme</option>
                                        <option value="2">Femme</option>
                                        @endif
                                        @if($user->sexes[0]->libelle == 'Femme')
                                        <option value="2">Femme</option>
                                        <option value="1">Homme</option>
                                        @endif 
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Region</label>
                                    <select class="form-control"  name="id_region" required >
                                        <option value="{{ $user->id_region }}">{{ $user->regions[0]->libelle }}</option>
                                        @foreach($region as $row)
                                        <option value="{{$row->id}}">{{$row->libelle}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group" id="theSelect">
                                    <label class="form-label">Fonction</label>
                                    <select class="form-control"  name="id_fonction" id="fonction"  required>
                                        <option value="{{ $user->id_fonction }}">{{ $user->fonctions[0]->libelle }}</option>
                                        @foreach($fonction as $row)
                                        <option value="{{$row->id}}">{{$row->libelle}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group" id="fonctionDetails">
                                    <label class="form-label">Fonction Detailer</label>
                                    <select class="form-control" name="id_fonction_details"  id="fonctionDeatails"  required >
                                        <option value="{{ $user->id_fonction_details }}">{{ $user->fonctionsDetails[0]->libelle }}</option>
                                       
                                      </select>
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="text-right mt-3">
                                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        jQuery(document).ready(function (){
            jQuery('#fonction').change(function(){
                let fon = jQuery(this).val();
                jQuery.ajax({
                    url : '/getfonctionDetails',
                    type : 'post',
                    data : 'fon='+fon+'&_token={{csrf_token()}}',
                    success : function(result){
                        jQuery('#fonctionDeatails').html(result);
                    }
                });
    
            });
    
            
        });
        
    </script>
</body>

</html>