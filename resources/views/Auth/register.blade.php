<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>Sondage Application</title>
</head>
<body>
<div class="card mt-50 mb-50">
    <div class="card-title mx-auto">
        Créer Votre Compte
    </div>

    <form action="{{route('register.save')}}" method="POST">
        @csrf
        @error('nom')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Nom : </span>
            </div>
            <div class="row row-2">
                <input type="text" name="nom" id="nom">
            </div>
        </div>
        @error('prenom')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Prenom : </span>
            </div>
            <div class="row row-2">
                <input type="text" name="prenom" id="prenom">
            </div>
        </div>
        @error('email')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Email : </span>
            </div>
            <div class="row row-2">
                <input type="email" name="email" id="email">
            </div>
        </div>
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Age : </span>
            </div>
            <div class="row row-2">
                <input type="number" name="age" id="age" required>
            </div>
        </div>
        @error('telephone')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Telephone : </span>
            </div>
            <div class="row row-2">
                <input type="number" name="telephone" id="telephone">
            </div>
        </div>
        @error('id_sexe')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <!-- Checks Of Sexe -->
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Sexe : </span>
            </div>
            <div class="row row-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="id_sexe" id="id_sexe" value="1">
                    <label class="form-check-label" for="inlineRadio1">Homme</label>
                    <div class="form-check form-check-inline" style="position: relative; left: 80px;">
                        <input class="form-check-input" type="radio" name="id_sexe" id="id_sexe" value="2">
                        <label class="form-check-label" for="inlineRadio2">Femme</label>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Checks Of Sexe -->
        <!-- Select Of Region -->
        @error('id_region')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Region : </span>
            </div>
            <div class="row row-2" style="position: relative;top: 0.7px;">
                <select class="form-select form-select-sm2" name="id_region" id="id_region" aria-label=".form-select-sm example" >
                    <option selected disabled>--- Choissir votre Region ---</option>
                    @foreach($data as $row)
                        <option value="{{$row->id}}">{{$row->libelle}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- End Select Of Region -->
        <!-- Select Of fonction -->
        @error('id_fonction')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1" id="theSelect">
            <div class="row row-2">
                <span id="card-inner">Votre Fonction : </span>
            </div>
            <div class="row row-2" style="position: relative;top: 0.7px;">
                <select class="form-select form-select-sm2" name="id_fonction" id="fonction" aria-label=".form-select-sm example">
                    <option selected disabled>--- Choissir votre Fonction ---</option>
                    @foreach($dataf as $row)
                        <option value="{{$row->id}}">{{$row->libelle}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- End Select Of fonction -->

        <!-- Select Of fonction Details -->
        @error('id_fonction_details')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1"  id="fonctionDetails">
            <div class="row-1">
                <div class="row row-2">
                    <span id="card-inner">Votre fonction Details : </span>
                </div>
                <div class="row row-2" style="position: relative;top: 0.7px;" >
                    <select class="form-select form-select-sm2" name="id_fonction_details"  id="fonctionDeatails"  aria-label=".form-select-sm example">
                        <option selected disabled>--- Choissir votre fonction Details ---</option>
    
                    </select>
                </div>
            </div>
        </div>
        <!-- End Select Of fonction Details -->
        @error('password')
        <div class="alert alert-danger" role="alert">
            <span class="text-red-600">{{$message}}</span>
          </div>
        @enderror
        <div class="row-1">
            <div class="row row-2">
                <span id="card-inner">Votre Paasword : </span>
            </div>
            <div class="row row-2">
                <input type="password" name="password" id="password">
            </div>
        </div>



        <button class="btn btn-danger" type="submit"><b>Creer Compte</b></button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
