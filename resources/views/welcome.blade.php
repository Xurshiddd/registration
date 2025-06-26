<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Laravel</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="">
    @include('navbar')
    <div class="flex justify-between items-center mb-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 transition-all">
            {{ session('success') }}
        </div>
        @endif
        
    </div>
    <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-sm p-6 relative">
                    <button 
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl font-bold"
                        onclick="document.getElementById('loginModal').classList.add('hidden')"
                        aria-label="Close"
                    >&times;</button>
                    <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2" for="email">Email</label>
                            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400" type="email" name="email" id="email" required autofocus>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 mb-2" for="password">Password</label>
                            <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400" type="password" name="password" id="password" required>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                            Login
                        </button>
                    </form>
                </div>
            </div> 
    <main class="container mx-auto p-4">
        <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h1 class="text-2xl text-center font-bold">{{ __('form.form_header') }}</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="last_name" class="form-label">{{ __('form.last_name') }}</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="{{ __('form.last_name') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="first_name" class="form-label">{{ __('form.first_name') }}</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="{{ __('form.first_name') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="father_name" class="form-label">{{__('form.father_name')}}</label>
                            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="{{ __('form.father_name') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="email" class="form-label">{{ __('form.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('form.email') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">{{ __('form.phone') }}<span class="text-red-600">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="{{ __('form.phone') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="phone2" class="form-label">{{ __('form.second_phone') }}</label>
                            <input type="tel" class="form-control" id="phone2" name="phone_2" placeholder="{{ __('form.second_phone') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="birth_date" class="form-label">{{__('form.birth_date')}}<span class="text-red-600">*</span></label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date">
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4">
                                <label class="form-label d-block">{{ __('form.gender') }}<span class="text-red-600">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male">
                                    <label class="form-check-label" for="gender_male">{{ __('form.male') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female">
                                    <label class="form-check-label" for="gender_female">{{ __('form.female') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label">{{ __('form.image') }} (<small class="text-amber-700">{{ __('form.image_help') }}</small>)<span class="text-red-600">*</span></label>
                            <input type="file" class="form-control" id="image" name="avatar" accept="image/jpeg,image/png,image/webp">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-3 card">
                <div class="card-header">
                    <h1 class="text-2xl text-center font-bold">{{ __('form.education_info') }}</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="end_education_from" class="form-label">{{ __('form.end_education_from') }}<span class="text-red-600">*</span></label>
                            <select class="form-select" id="end_education_from" name="education">
                                <option value="school">{{ __('form.end_education_dagree') }}</option>
                                <option value="college">{{ __('form.end_education_dagree_college') }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="diploma_serial" class="form-label">{{ __('form.diploma_serial') }}<span class="text-red-600">*</span></label>
                            <input type="text" class="form-control" id="diploma_serial" name="diploma_series" placeholder="_-________" maxlength="10">
                        </div>
                        <div class="col-md-4">
                            <label for="diploma_pdf" class="form-label">{{ __('form.diploma_pdf') }}<span class="text-red-600">*</span></label>
                            <input type="file" class="form-control" id="diploma_pdf" name="diploma_pdf" accept="application/pdf">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 card">
                <div class="card-header">
                    <h1 class="text-2xl text-center font-bold">{{ __('form.education_direction') }}</h1>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="education_dagree" class="form-label">{{ __('form.education_dagree') }}<span class="text-red-600">*</span></label>
                            <select class="form-select" id="education_dagree" name="education_livel">
                                <option value="">{{ __('form.select_education_dagree') }}</option>
                                <option value="bachelor">{{ __('form.bachelor') }}</option>
                                <option value="master">{{ __('form.master') }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="education_direction" class="form-label">{{ __('form.education_direction_select_help') }}<span class="text-red-600">*</span></label>
                            <select class="form-select" id="education_direction" name="course_direction">
                                {{-- <option value="">{{ __('form.education_direction_select') }}</option>
                                <option value="computer_science">{{ __('form.math_informatics') }}</option>
                                <option value="economics">{{ __('form.uzb_and_world_language') }}</option>
                                <option value="engineering">{{ __('form.auto_control') }}</option> --}} 
                                <option value="Q'shma ta`lim">{{ __('form.joint_education') }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="orientation" class="form-label">{{ __('form.orientation') }}<span class="text-red-600">*</span></label>
                            <select class="form-select" id="orientation" name="educate_direction">
                                <option value="">{{ __('form.select_orientation') }}</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 card">
                <div class="card-header">
                    <h1 class="text-2xl text-center font-bold">{{ __('form.passport_information') }}</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="passport_serial" class="form-label">{{ __('form.passport_serial') }}<span class="text-red-600">*</span></label>
                            <input type="text" class="form-control text-uppercase" id="passport_serial" name="passport_series" placeholder="{{ __('form.passport_serial') }}" maxlength="2" style="text-transform:uppercase;" oninput="this.value = this.value.toUpperCase();">
                        </div>
                        <div class="col-md-4">
                            <label for="passport_number" class="form-label">{{ __('form.passport_number') }}<span class="text-red-600">*</span></label>
                            <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="{{ __('form.passport_number') }}" maxlength="7">
                        </div> 
                        <div class="col-md-4">
                            <label for="passport" class="form-label">{{ __('form.passport') }}<span class="text-red-600">*</span></label>
                            <input type="file" class="form-control" id="passport" name="passport_pdf" accept="application/pdf">
                        </div>
                    </div>
                    <div class="row mb-3" id="passport_date_row">
                    </div>
                </div>
                <div class="card-footer p-3">
                    <button type="submit" class="btn btn-primary">{{__('form.save')}}</button>
                </div>
            </div>
            
        </form>
    </main>
    <footer>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJw=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('diploma_serial');
            
            input.addEventListener('input', function () {
                let val = input.value.toUpperCase().replace(/[^A-Z0-9]/g, ''); // faqat harf va raqam
                
                let letter = '';
                let digits = '';
                
                if (val.length > 0) {
                    // 1-harfni ajratib olamiz
                    letter = val[0].replace(/[^A-Z]/g, ''); 
                }
                
                if (val.length > 1) {
                    // qolgan raqamlarni olamiz
                    digits = val.slice(1).replace(/\D/g, '').slice(0, 8); 
                }
                
                input.value = letter + (digits ? '-' + digits : '');
            });
        });
        
        document.addEventListener('DOMContentLoaded', function () {
            var educationDagree = document.getElementById('education_dagree');
            var orientation = document.getElementById('orientation');
            
            educationDagree.addEventListener('change', function () {
                var selectedValue = this.value;
                var options = '<option value="">' + "{{ __('form.select_orientation') }}" + '</option>';
                if (selectedValue === 'bachelor') {
                    options += '<option value="paris">' + "{{ __('form.paris') }}" + '</option>';
                    options += '<option value="ural">' + "{{ __('form.ural') }}" + '</option>';
                    options += '<option value="ural_2">' + "{{ __('form.ural_2') }}" + '</option>';
                    options += '<option value="Changshu">' + "{{ __('form.Changshu') }}" + '</option>';
                } else if (selectedValue === 'master') {
                    options += '<option value="paris">' + "{{ __('form.paris') }}" + '</option>';
                    options += '<option value="ural">' + "{{ __('form.ural') }}" + '</option>';
                }
                orientation.innerHTML = options;
            });
            
        });
        document.addEventListener('DOMContentLoaded', function () {
            var orientation = document.getElementById('orientation');
            var passportDateRow = document.getElementById('passport_date_row');
            
            orientation.addEventListener('change', function () {
                var selectedValue = this.value;
                if (selectedValue === 'ural' || selectedValue === 'ural_2') {
                    passportDateRow.innerHTML = `
                        <div class="col-md-4">
                            <label for="passport_rus" class="form-label">{{ __('form.passport_rus') }}<span class="text-red-600">*</span></label>
                            <input type="file" class="form-control" id="passport_rus" name="passport_rus" accept="application/pdf">
                        </div>
                        <div class="col-md-4">
                            <label for="propisk_rus" class="form-label">{{ __('form.propisk_rus') }}<span class="text-red-600">*</span></label>
                            <input type="file" class="form-control" id="propisk_rus" name="propiska" accept="application/pdf">
                        </div>
                    `;
                } else {
                    passportDateRow.innerHTML = '';
                }
            });
            var input = document.querySelector("#phone");
            var input2 = document.querySelector("#phone2");
            if (input) {
                var iti = window.intlTelInput(input, {
                    initialCountry: "uz",
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input/build/js/utils.js"
                });
            }
            if (input2) {
                var iti2 = window.intlTelInput(input2, {
                    initialCountry: "uz",
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input/build/js/utils.js"
                });
            }
        });
    </script>
</body>
</html>
