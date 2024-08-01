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
                  class="sidebar-link waves-effect waves-dark sidebar-link active"
                  href="#"
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
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Gestion Des Etudes</h4>
            </div>
            @if(Session::get('success'))
            <div class="alert alert-success" role="alert" >
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('fail') }}
            </div>
            @endif
              <!-- suppresion -->
              @if(Session::get('succe'))
              <div class="alert alert-success" role="alert" >
                  {{ Session::get('succe') }}
              </div>
              @endif
              <!-- End suppresion -->
              @if(Session::get('status'))
              <div class="alert alert-success" role="alert" >
                  {{ Session::get('status') }}
              </div>
              @endif
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
               <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-patch-plus"></i> Ajouter Un Nouvaux Etude
              </button>
              <hr style="position: relative;bottom: 5px;">
              <!-- Ajouter -->
              <div class="modal fade" id="exampleModal" style="min-height: 550px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" style="position: relative;left: 300px;" id="exampleModalLabel">Ajouter Un Nouvaux Etude</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('admin.createEdute') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="width: 40%">
                            <label>Libelle</label>
                            <input type="text" name="libelle" class="form-control" placeholder="Saisir Libelle" required>
                        </div>
                        <div class="form-group" style="width: 40%; position: relative; left: 400px; bottom: 78px;">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="Saisir Description" required></textarea>
                        </div>
                        <div class="form-group" style="width: 40%; position: relative; bottom: 80px;">
                            <label>Durée</label>
                            <input type="number" name="durré" class="form-control" placeholder="Saisir La Durée" required>
                        </div>
                        <div class="form-group" style="width: 40%; position: relative; left: 400px; bottom: 160px;">
                            <label>Nombre de Point</label>
                            <input type="number" name="point" class="form-control" placeholder="Saisir Le Nombre de Point" required>
                        </div>
                        <div class="form-group" style="width: 40%; position: relative; bottom: 150px;">
                            <label>Lien</label>
                            <textarea name="lien" class="form-control" placeholder="Saisir Le Lien" required></textarea>
                        </div>
                        <div class="form-group" style="width: 40%; position: relative; bottom: 150px;">
                            <label>Categorie</label>
                            <select class="form-select form-select-sm" name="id_categorie" required>
                                <option selected disabled></option>
                                @foreach($categorieEtudes as $row)
                                    <option value="{{ $row->id }}">{{ $row->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- image -->
                      <label style="position: relative;bottom: 150px;">Image</label>
                      <div class="containner">
                        <div class="img-area">
                          <i class="bi bi-cloud-plus-fill icon"></i>
                          <h3>Inserer Image</h3>
                          <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <div class="file btn btn-lg btn-primary" style=" position: relative;width: 210px;overflow: hidden;bottom: 105px;">
                          <i class="bi bi-cloud-arrow-up-fill icon"></i> Choissir Image
                          <input class="select-image" style="position: absolute;font-size: 100px;opacity: 0;right: 0;top: 0;" type="file" id="img" name="img" required/>
                        </div>
                      </div>
                        <button type="submit" class="btn btn-primary" style="position: relative; bottom: 100px; width: 90%; left: 20px;">AJOUTER</button>
                    </form>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
              <!-- End Ajouter -->
              <!-- modification -->
              @foreach($etude as $etu)
              <div class="modal fade" id="modificationModal{{$etu->id}}" style="min-height: 550px;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" style="position: relative;left: 300px;" id="exampleModalLabel">Modifier Un Etude</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/etude/{{ $etu->id }}/update" >
                        @csrf
                        @method('PUT')
                      <div class="form-group" style="width: 40%">
                        <label>Libelle</label>
                      <input type="text" name="libelle" value="{{$etu->libelle}}" class="form-control" placeholder="Saisir Libelle" required>
                    </div>
                    <div class="form-group" style="width: 40%;position: relative;left: 400px;bottom: 78px;">
                      <label>Description</label>
                      <textarea  name="description" class="form-control"  >{{$etu->description}}</textarea>
                  </div>
                  <div class="form-group" style="width: 40%;position: relative;bottom: 80px;">
                    <label>Durré</label>
                  <input type="number" name="durré" value="{{$etu->durré}}" class="form-control" placeholder="Saisir La Durré" required>
                </div>
                <div class="form-group" style="width: 40%;position: relative;left: 400px;bottom: 160px;">
                  <label>Nombre de Point</label>
                  <input type="number" name="point" value="{{$etu->point}}" class="form-control" placeholder="Saisir Le Nombre de Point" required>
              </div>
              <div class="form-group" style="width: 40%;position: relative;bottom: 150px;">
                <label>Lien</label>
                <textarea type=""  name="lien" class="form-control" placeholder="Saisir Le Lien" required>{{$etu->lien}}</textarea>
            </div>
             
              <button type="submit" id="add" class="btn btn-success" style="position: relative;bottom: 100px;width: 90%;left: 20px;">Modifier</button>
                      </form>
                    </div>
                   
                  </div>
                </div>
              </div>
              @endforeach
              <!-- End modification -->
              <div class="table-responsive" style="position: relative;bottom: 30px;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Img</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Description</th>
                    <th scope="col">Lien</th>
                    <th scope="col">Durré</th>
                    <th scope="col">Point</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($etude as $etu)
                    <tr>           
                        <th scope="row">{{$etu->id}}</th>
                        <td>{{$etu->libelle}}</td>
                        <td><img src="{{ asset($etu->img) }}" style="width: 70px;height: 70px;" alt="Img"/></td>
                        <td>{{$etu->categorie_etude->libelle}}</td>
                        <td>{{ Str::limit($etu->description, 50) }}</td>
                        <td>{{$etu->lien}}</td>
                        <td>{{$etu->durré}} Min</td>
                        <td>{{$etu->point}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.etudeSupp',$etu->id)}}"  onsubmit="return confirm('Supprimer?')" class="float-right text-red-800">
                              @csrf
                              @method('DELETE')
                              <button><i class="bi bi-x-lg"></i></button>
                            </form>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modificationModal{{$etu->id}}" style="position: relative;left: 40px;bottom: 33px;font-size: 27px;"><i class="bi bi-pencil-square" style="color: darkolivegreen"></i></a>
                            
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
              {{$etude->links()}}
              </div>
            </div>
                  
            </div>
          </div>
        
      </div>
      
    </div>
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
