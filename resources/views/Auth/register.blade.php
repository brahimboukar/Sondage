<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <style>
        .field {
            flex: 1;
            min-width: 0;
        }
        .error {
            color: red;
            display: none;
        }

       
        .field:not(:last-child) {
            margin-right: 1rem;
        }
        .hidden{
    display: none;
}
.show{
    display: block;
}
#fonctionDetails{
    display: none;
}
.button-container {
display: flex;
justify-content: center; /* Center the button horizontally */
margin-top: 1rem; /* Optional: space above the button */
}
.alert-container {
display: flex;
justify-content: center; /* Centre horizontalement */
margin-top: 1rem; /* Optionnel : espace au-dessus de l'alerte */
}

    </style>
</head>

<body>
    <section class="bg-gray-50 dark:bg-gray-900" style="position: relative; top: 70px;">
        <div  class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
               
            </div>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <img src="{{asset('assets/admin/asset/images/terrain360.png')}}" alt="homepage" class="light-logo mx-auto block" width="185" />
                    <div class="alert-container">
                        @if(Session::has('faile'))
                            <div class="badge bg-danger" style="font-size: 15px;" role="alert">
                                {{ Session::get('faile') }}
                            </div>
                        @endif
                    </div>
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                        Créer votre compte
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post" action="{{route('register.save')}}">
                        @csrf

                        <div class="flex flex-wrap gap-4 mb-6">
                            @error('nom')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                            </div>
                            @enderror
                            <div class="field">
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                <input type="text" name="nom" id="nom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Votre nom" required>
                            </div>
                            @error('prenom')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                            </div>
                            @enderror
                            <div class="field">
                                <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                <input type="text" name="prenom" id="prenom"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Votre prénom" required>
                            </div>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                              </div>
                            @enderror
                            <div class="field">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@company.com" required>
                            </div>
                            
                        </div>
                        <div class="flex flex-wrap gap-4 mb-6">

                            <div class="field">
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Âge</label>
                                <input type="number" name="age" min="1" max="90" id="age"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="20" required>
                            </div>
                            @error('telephone')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                            </div>
                            @enderror
                            <div class="field">
                                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                {{-- <input type="tel" name="telephone" id="telephone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 phone-input"
                                    placeholder="Votre téléphone" required> --}}
                                    <input
        type="tel"
        name="telephone"
        id="telephone"
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 phone-input"
        placeholder="+33 6 70 41 12 41"
        pattern="\+33\s6\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}\s[0-9]{2}"
        title="Numéro de téléphone français, format: +33 6 70 41 12 41"
        required
    >
                                <span class="error" id="phoneError" style="display:none; color: red;">Numéro de téléphone invalide</span>
                            </div>
                            

                            <div class="field">
                                @error('id_sexe')
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-red-600">{{$message}}</span>
                                </div>
                                @enderror
                                <label for="id_sexe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexe</label>
                                <select id="id_sexe" name="id_sexe"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 mb-6">
                            
                            @error('id_region')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                              </div>
                            @enderror
                            <div class="field">
                                <label for="id_region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                                <select id="id_region" name="id_region"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                   
                                    @foreach($data as $row)
                                    <option value="{{$row->id}}">{{$row->libelle}}</option>
                                @endforeach
                                </select>
                            </div>
                            @error('id_fonction')
                            <div class="alert alert-danger" role="alert">
                                <span class="text-red-600">{{$message}}</span>
                              </div>
                            @enderror
                            <div class="field" id="theSelect">
                                <label for="function" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Fonction</label>
                                <select  name="id_fonction" id="fonction"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                                <option selected disabled>--- Choissir votre Fonction ---</option>
                                @foreach($dataf as $row)
                                    <option value="{{$row->id}}">{{$row->libelle}}</option>
                                @endforeach
                                </select>
                                </div>
                                @error('id_fonction_details')
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-red-600">{{$message}}</span>
                                  </div>
                                @enderror
                                <div class="field" id="fonctionDetails">
                                <label for="fonctionDeatails" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fonction Details</label>
                                <select class="form-select form-select-sm2" name="id_fonction_details"  id="fonctionDeatails"  aria-label=".form-select-sm example">
                                    <option selected disabled>--- Choissir votre fonction Details ---</option>
                
                                </select>
                                </div>
                                
                                </div>
                                <div class="flex flex-wrap gap-4 mb-6">
                                    <div class="field">
                                        <label for="dateNaissance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date De Naissance</label>
                                        <input type="date" name="dateNaissance" id="dateNaissance" class="w-72 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </div>
                                    
                                    @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        <span class="text-red-600">{{$message}}</span>
                                    </div>
                                    @enderror
                                    <div class="field">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mot de Passe</label>
                                        <input type="password" name="password" id="password" style="width: 360px;"
                                                                         class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                         placeholder="••••••••" required>
                                        </div>
                                </div>
                                <div class="button-container">
                                <button type="submit"  style="width: 70%;"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                S'inscrire Maintenant</button>
                                </div>
                               
                                
                                
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Vous avez déjà un compte? <a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Connectez-vous</a>
                            </p>
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>

        
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

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
    const input = document.querySelector("#telephone");
    const iti = window.intlTelInput(input, {
        initialCountry: "fr",
        onlyCountries: ["fr"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // function validatePhoneNumber() {
    //         const phoneError = document.getElementById("phoneError");
    //         const phoneNumber = input.value;

    //         // Expression régulière pour valider les numéros de téléphone français
    //         const frenchPhoneRegex = /^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/;

    //         if (frenchPhoneRegex.test(phoneNumber)) {
    //             phoneError.style.display = "none";
    //             alert("Numéro de téléphone valide");
    //         } else {
    //             phoneError.style.display = "block";
    //         }
    //     }
    
</script>
<script src="{{ asset('assets/js/script.js') }}"></script>
{{-- <script src="{{ asset('assets/js/tele.js') }}"></script> --}}
    </body>
    </html>        