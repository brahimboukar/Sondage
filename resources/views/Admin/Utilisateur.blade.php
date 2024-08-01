<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Admin</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16" href="{{asset('assets/admin/assets/images/favicon.png')}}"
    />
    <!-- Custom CSS -->
    <link href="{{asset('assets/admin/dist/css/style.min.css')}}" rel="stylesheet" />
  </head>

  <body>
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand">
              <!-- Logo icon -->
              <b class=" logo-icon ">
                <img
                  src="{{asset('assets/admin/asset/images/terrain360.png')}}"
                  alt="homepage"
                  class="light-logo"
                  width="185" 
                />
              </b>
            </a>
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              
            </ul>
            <ul class="navbar-nav float-end">
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="{{asset('assets/admin/asset/images/users/1.jpg')}}"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
				  <div class="dropdown-divider"></div>
                  <div class="ps-4 p-10">
                    <a
                      href="javascript:void(0)"
                      class="btn btn-sm btn-success btn-rounded text-white"
                      >View Profile</a
                    >
                  </div>
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="mdi mdi-settings me-1 ms-1"></i> Account
                    Setting</a
                  >
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('logout')}}"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin')}}"
                  aria-expanded="false"
                  ><i class="me-2 mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link active"
                  href="#"
                  aria-expanded="false"
                  ><i class="me-2 mdi mdi-account"></i
                  ><span class="hide-menu">Gestion Des Panélistes</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.categorieRecomponse')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa-sharp fa-solid fa-list"></i>
                  <span class="hide-menu">Gestion Des Catégories</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.recomponse')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa-solid fa-award"></i>
                  <span class="hide-menu">Gestion Des Récomponses</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.categorieEtude')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa-sharp fa-solid fa-list"></i>
                  <span class="hide-menu">Gestion Des Catégories Etudes</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.edute')}}"
                  aria-expanded="false"
                  ><i class="me-2 bi bi-clipboard2-pulse-fill"></i
                  ><span class="hide-menu">Gestion Des Etudes</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.eduteCible')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa fa-pie-chart" aria-hidden="true"></i>
                  <span class="hide-menu">Gestion Des Etudes Cible</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.DemandeRecomponse')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa fa-pie-chart" aria-hidden="true"></i>
                  <span class="hide-menu">Gestion Des Demandes</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.evenement')}}"
                  aria-expanded="false"
                  ><i class="fas fa-calendar-day"></i>
                  <span class="hide-menu">Gestion Des Événements</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.ParticipantEvenement')}}"
                  aria-expanded="false"
                  ><i class="me-2 fa-solid fa-users"></i>
                  <span class="hide-menu">Gestion Des Participants</span></a
                >
              </li>
              
              
              
              
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      
      <div class="page-wrapper">
        
        <div class="page-breadcrumb">
          @if(Session::get('success'))
          <div class="badge bg-success" style="font-size: 15px;" role="alert" >
              {{ Session::get('success') }}
          </div>
          @endif
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Gestion Des Panélistes</h4>
            </div>
                   

                    @if(Session::has('fail'))
                    <div  class="badge bg-danger" style="font-size: 15px;" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    <!-- suppresion -->
                    @if(Session::get('succe'))
                    <div class="badge bg-success" style="font-size: 15px;"  role="alert" >
                        {{ Session::get('succe') }}
                    </div>
                    @endif
                    <!-- End suppresion -->
                    <!-- Email Already Exist -->

                    @if(Session::has('faile'))
                    <div class="badge bg-danger" style="font-size: 15px;" role="alert">
                        {{ Session::get('faile') }}
                    </div>
                    @endif 
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="bi bi-person-add"></i> Ajouter Un Nouvaux Panélistes
</button>
<div class="input-group" style="position: absolute;left: 500px;top: 60px;">
  <form method="GET" action="{{ route('admin.utilisateur') }}">
    @csrf
  <div class="form-outline" data-mdb-input-init>
    <input type="text" id="searchTerm" name="searchTerm" style="position: relative;width: 250px;right: 30px;" class="form-control" placeholder="Chercher Par Nom ou Prénom" />
    <button type="submit" style="position: relative;left: 182px;bottom: 35px;" class="btn btn-primary" data-mdb-ripple-init>
      <i class="fas fa-search"></i>
    </button>
  </div>
</form>
</div>
<a href="{{route('admin.utilisateur')}}" class="btn btn-primary" style="position: relative;left: 500px;bottom: 2px;">Réinitialiser</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" style="min-height: 550px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" style="position: relative;left: 300px;" id="exampleModalLabel">Ajouter Un Nouvaux Panélistes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('admin.utilisateurAdd')}}">
          @csrf
        <div class="form-group" style="width: 40%">
          <label>Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Saisir Nom" required>
      </div>
      <div class="form-group" style="width: 40%;position: relative;left: 400px;bottom: 78px;">
        <label>Prenom</label>
      <input type="text" name="prenom" class="form-control" placeholder="Saisir Prenom" required>
    </div>
    <div class="form-group" style="width: 40%;position: relative;bottom: 80px;">
      <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Saisir Email" required>
  </div>
  <div class="form-group" style="width: 40%;position: relative;left: 400px;bottom: 160px;">
    <label>Telephone</label>
  <input type="text" name="telephone" class="form-control" placeholder="Saisir Telephone" required>
</div>
        @error('id_sexe')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
<div class="form-group" style="width: 40%;position: relative;bottom: 160px;">
  <label>Sexe</label>
  <select class="form-select form-select-sm" name="id_sexe" aria-label="Small select example" required>
    <option selected disabled></option>
    <option value="1">Homme</option>
    <option value="2">Femme</option>
  </select>
</div>
<div class="form-group" style="width: 40%;position: relative;left: 400px;bottom: 238px;">
  <label>Region</label>
  <select class="form-select form-select-sm" name="id_region" aria-label="Small select example" required>
    <option selected disabled></option>
    @foreach($dataRegion as $row)
            <option value="{{$row->id}}">{{$row->libelle}}</option>
    @endforeach
  </select>
</div>
<div class="form-group" id="theSelect" style="width: 40%;position: relative;bottom: 230px;">
  <label>Fonction</label>
  <select class="form-select form-select-sm" name="id_fonction" id="fonction" aria-label="Small select example" required>
    <option selected disabled></option>
    @foreach($dataf as $row)
            <option value="{{$row->id}}">{{$row->libelle}}</option>
    @endforeach
  </select>
</div>
<div class="form-group" id="fonctionDetails" style="width: 40%;position: relative;left: 400px;bottom: 308px; display: none;">
  <label>Fonction Detailer</label>
  <select class="form-select form-select-sm" name="id_fonction_details"  id="fonctionDeatails" aria-label="Small select example" required>
    <option selected disabled></option>
    
  </select>
</div>
<div class="form-group" id="password" style="width: 40%;position: relative;bottom: 230px;">
  <label>Password</label>
<input type="password" class="form-control" name="password" placeholder="Saisir Password" required>
</div>
<div class="form-group" id="age" style="width: 40%;position: relative;left: 400px;bottom: 310px;">
  <label>Age</label>
<input type="number" class="form-control" name="age" placeholder="Saisir Age" required>
</div>
<button type="submit" id="add" class="btn btn-primary" style="position: relative;bottom: 300px;width: 100%;">AJOUTER</button>
        </form>
      </div>
     
    </div>
  </div>
</div>
@if (!empty($message))
<div class="alert alert-info" style="font-size: 30px;position: relative;top: 100px;">
    {{ $message }}
</div>
@else
<div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Point</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Region</th>
                        <th scope="col">Fonction</th>
                        <th scope="col">Fonction Detailer</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $us)
                        <tr>
                            <th scope="row">{{$us->id}}</th>
                            <td>{{$us->nom}}</td>
                            <td>{{$us->prenom}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->age}}</td>
                            <td>{{$us->telephone}}</td>
                            <td>{{$us->points}}</td>
                            <td>
                              @if($us->blocked)
                              <a href="{{ route('users.unblock', ['id' => $us->id]) }}"><span class="badge bg-danger" style="font-size: 15px;">Bloqué</span></a>         
                          @else
                              <a href="{{ route('users.block', ['id' => $us->id]) }}"><span class="badge bg-success" style="font-size: 15px;">Débloquer</span></a>
                          @endif
                            </td>
                            <td>{{$us->sexes[0]->libelle}}</td>
                            <td>{{$us->regions[0]->libelle}}</td>
                            <td>{{$us->fonctions[0]->libelle}}</td>
                            <td>{{$us->fonctionsDetails[0]->libelle}}</td>
                            <td>
                              {{-- <a href="{{route('admin.utilisateurSupp,$us->id')}}" class="danger" >
                                <i class="bi bi-x-lg"></i>
                                </a> --}}
                                <form method="POST" action="{{route('admin.utilisateurSupp',$us->id)}}" onsubmit="return confirm('Supprimer?')" class="float-right text-red-800">
                                  @csrf
                                  @method('DELETE')
                                  <button><i class="bi bi-x-lg"></i></button>
                                </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                  {{$user->links()}}
                  @endif
                  
            </div>
          </div>
        
      </div>
      
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
                  {{-- @if(Session::has('faile'))
                  <script>
                    toastr.options = {
                      "positionClass": "toast-bottom-left",
                      "closeButton": true,
                      "progressBar": true,
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    };
                    toastr.error("{{ Session::get('faile') }}");
                    </script>                                    
                  @endif  --}}
    <script src="{{ asset('assets/js/scriptAdminUser.js') }}"></script>
    <script src="{{asset('assets/admin/asset/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/admin/asset/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/admin/asset/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/asset/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/admin/dist/js/custom.min.js')}}"></script>
  </body>
</html>
