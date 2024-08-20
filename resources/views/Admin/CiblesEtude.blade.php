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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
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
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
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
                  <i class="fa fa-user-circle fa-stack-2x" style="position: relative;top: 10px;" aria-hidden="true" ></i>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
				  <div class="dropdown-divider"></div>
                  
          <a class="dropdown-item" href="{{ route('admin.profile') }}">
            <i class="fa fa-user-circle fa-stack" aria-hidden="true"></i> Consulter Le Profile
        </a>
        
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
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="{{route('admin.utilisateur')}}"
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
                  class="sidebar-link waves-effect waves-dark sidebar-link active"
                  href="#"
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
                  ><i class="me-2 fa-solid fa-paper-plane" aria-hidden="true"></i>
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
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Gestion Des Etudes Cible</h4>
            </div>
            @if(Session::get('success'))
            <div class="alert alert-success" role="alert" >
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::get('succ'))
            <div class="alert alert-success" role="alert" >
                {{ Session::get('succ') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-patch-plus"></i> Ajouter Un Nouvaux Etude Cible
              </button>
              <hr style="position: relative;bottom: 5px;">
              <!-- Ajouter -->
              <div class="modal fade" id="exampleModal" style="min-height: 550px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" style="position: relative;left: 270px;" id="exampleModalLabel">Ajouter Un Nouvaux Etude Cible</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('admin.addeduteCible')}}">
                        @csrf
                          <div class="form-group" style="width: 40%;position: relative;left: 260px;">
                            <label>List Des Etudes</label>
                            <select class="form-select form-select-sm" name="id_etude" aria-label="Small select example" required>
                              <option selected disabled></option>
                              @foreach($etudelist as $etu)
                              <option value="{{$etu->id}}">{{$etu->libelle}}</option>
                              @endforeach
                            </select>
                        </div>
                      <div class="container">
                        <fieldset class="border rounded-5 p-5" style="height: 100%; max-height: 500px;">
                            <legend class="float-none w-auto px-3" >Cible</legend>
                            <label style="position: relative;bottom: 60px;right: 40px;font-size: 17px;">Sexe</label>
                            <div class="form-check" style="position: relative;right: 40px;bottom: 60px;">
                              @foreach($sexes as $sex)
                              <input class="form-check-input" type="checkbox" name="sexes[]" value="{{$sex->id}}" id="flexCheckIndeterminate">
                              
                                {{$sex->libelle}}<br>
                             
                              @endforeach
                            </div>
                            <label for="" style="position: relative;bottom: 138px;left: 35px;font-size: 17px;">Region</label>
                            <div class="form-check" style="position: relative;left: 35px;bottom: 136px;">
                              @foreach($regions as $reg)
                              <input class="form-check-input" type="checkbox" name="regions[]" value="{{$reg->id}}" id="flexCheckIndeterminate">
                              
                                {{$reg->libelle}}<br>
                             
                              @endforeach
                            </div>
                            <div class="row-1" id="theSelect">
                              <label for="" style="position: relative;bottom: 450px;left: 330px;font-size: 17px;">Fonction</label>
                              <div class="form-check" style="position: relative;left: 330px;bottom: 445px;">
                                @foreach($fonctions as $fon)
                                    @if($fon->id == 1 || $fon->id == 2)
                                        <input class="form-check-input fcd-show" name="fonctions[]" type="checkbox" value="{{$fon->id}}">
                                        {{$fon->libelle}}<br>
                                    @else
                                        <input class="form-check-input fcd-hide" name="fonctions[]" type="checkbox" value="{{$fon->id}}">
                                        {{$fon->libelle}}<br>
                                    @endif
                                @endforeach
                            </div>
                            </div>
                            <div id="fonctionDetails">
                              <label for="" style="position: relative;bottom: 445px;left: 310px;font-size: 17px;">Fonction Détailer</label>
                              <div class="form-check" style="position: relative;left: 310px;bottom: 455px;">
                                  @foreach($foncDe as $fond)
                                      <input class="form-check-input" name="fonctionDetailes[]" type="checkbox" value="{{$fond->id}}">
                                      {{$fond->libelle}}<br>
                                  @endforeach
                              </div>
                          </div>
                          

                            <div>
                              <label for="" id="age" style="position: relative;bottom: 320px;left: 35px;font-size: 17px;">Age</label>
                              <div class="form-check" id="listage" style="position: relative;bottom: 330px;left: 35px;">
                                @foreach($age as $ag)
                                  <input class="form-check-input" name="ages[]" type="checkbox" value="{{$ag->id}}" >
                                  
                                  {{$ag->libelle}}<br>
                                  
                        
                              @endforeach
                              </div>
                            </div>
                            
                        </fieldset>
                    </div>
                    <button type="submit" id="add" class="btn btn-primary" style="position: relative;width: 90%;left: 20px;top: 10px;">AJOUTER</button>
                      </form>
                    </div>
                   
                  </div>
                </div>
              </div>
              <!-- End Ajouter -->
              <!-- resources/views/etudes/index.blade.php -->
              <div class="table-responsive" style="position: relative;bottom: 30px;">
<table class="table table-striped">
  <thead>
      <tr>
          <th>ID</th>
          <th >Libellé</th>
          <th>Sexes</th>
          <th>Ages</th>
          <th>Régions</th>
          <th>Fonctions</th>
          <th>Fonctions Detailes</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($etudes as $etude)
      <tr>
          <td>{{ $etude->id }}</td>
          <td>{{ $etude->libelle }}</td>
          <td>
              @foreach($etude->sexes as $sexe)
                  {{ $sexe->libelle }},
              @endforeach
          </td>
          <td>
            @foreach($etude->ages as $age)
                {{ $age->libelle }},
            @endforeach
        </td>
          <td>
              @foreach($etude->regions as $region)
                  {{ $region->libelle }},
              @endforeach
          </td>
          <td>
              @foreach($etude->fonctions as $fonction)
                  {{ $fonction->libelle }},
              @endforeach
          </td>
          <td>
            @foreach($etude->fonctionDetailes  as $fonctionDetailes )
                {{ $fonctionDetailes->libelle }},
            @endforeach
        </td>
        <td>
          <form method="POST" action="{{ route('admin.suppEduteCible', $etude->id) }}"  onsubmit="return confirm('Vous-Voullez Supprimer Etude {{$etu->libelle}}')" class="float-right text-red-800">
            @csrf
            @method('DELETE')
            <button><i class="bi bi-x-lg"></i></button>
          </form>
          {{-- <a href="" data-bs-toggle="modal" data-bs-target="#modificationModal{{$etu->id}}" style="position: relative;left: 40px;bottom: 33px;font-size: 27px;"><i class="bi bi-pencil-square" style="color: darkolivegreen"></i></a> --}}
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
              </div>
              {{$etudes->links()}}
            </div>
                  
            </div>
          </div>
        
      </div>
      
    </div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
     jQuery(document).ready(function (){
        jQuery('.fcd-show').click(function(){
            
          jQuery('#fonctionDetails').show();
          const age = document.getElementById("age");
          const listage = document.getElementById("listage");
          age.style.position = "relative";
          age.style.bottom = "480px";

          listage.style.position = "relative";
          listage.style.bottom = "490px";

        });

        jQuery('.fcd-hide').click(function(){
            
            jQuery('#fonctionDetails').hide();
            const age = document.getElementById("age");
            const listage = document.getElementById("listage");
            age.style.position = "relative";
            age.style.bottom = "320px";

            listage.style.position = "relative";
            listage.style.bottom = "330px";
          });

        
    });

    
</script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
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
    <script src="{{asset('assets/admin/dist/js/fonction.js')}}"></script>
  </body>
</html>
