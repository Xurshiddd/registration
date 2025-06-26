<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>TTYSI</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="">
    @include('navbar')
<div class="container mt-4">
    <div class="card">
        <div class="card-header flex justify-between">
            <h3>{{ $registration->last_name }} {{ $registration->first_name }} {{ $registration->father_name }}</h3>
            <a href="{{ route('admin.index') }}" class="btn btn-success">Ortga</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>@lang('form.last_name')</th>
                    <td>{{ $registration->last_name }}</td>
                </tr>
                <tr>
                    <th>@lang('form.first_name')</th>
                    <td>{{ $registration->first_name }}</td>
                </tr>
                <tr>
                    <th>@lang('form.father_name')</th>
                    <td>{{ $registration->father_name }}</td>
                </tr>
                <tr>
                    <th>@lang('form.email')</th>
                    <td>{{ $registration->email }}</td>
                </tr>
                <tr>
                    <th>@lang('form.phone')</th>
                    <td>{{ $registration->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('form.second_phone')</th>
                    <td>{{ $registration->phone_2 }}</td>
                </tr>
                <tr>
                    <th>@lang('form.birth_date')</th>
                    <td>{{ $registration->birth_date }}</td>
                </tr>
                <tr>
                    <th>@lang('form.gender')</th>
                    <td>
                        {{ $registration->gender ? __('form.male') : __('form.female') }}
                    </td>
                </tr>
                <tr>
                    <th>@lang('form.image')</th>
                    <td>
                        <a href="{{ asset('storage/' . $registration->avatar) }}" target="_blank">
                            <img src="{{ asset('storage/' . $registration->avatar) }}" alt="Avatar" width="100">
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>@lang('form.passport_serial')</th>
                    <td>{{ $registration->passport_series }}</td>
                </tr>
                <tr>
                    <th>@lang('form.passport_number')</th>
                    <td>{{ $registration->passport_number }}</td>
                </tr>
                <tr>
                    <th>@lang('form.passport')</th>
                    <td>
                        <a href="{{ asset('storage/' . $registration->passport_pdf) }}" target="_blank">@lang('form.download')</a>
                    </td>
                </tr>
                <tr>
                    <th>@lang('form.end_education_from')</th>
                    <td>{{ $registration->education }}</td>
                </tr>
                <tr>
                    <th>@lang('form.diploma_serial')</th>
                    <td>{{ $registration->diploma_series }}</td>
                </tr>
                <tr>
                    <th>@lang('form.diploma_number')</th>
                    <td>{{ $registration->diploma_number }}</td>
                </tr>
                <tr>
                    <th>@lang('form.diploma_pdf')</th>
                    <td>
                        <a href="{{ asset('storage/' . $registration->diploma_pdf) }}" target="_blank">@lang('form.download')</a>
                    </td>
                </tr>
                <tr>
                    <th>@lang('form.education_dagree')</th>
                    <td>{{ $registration->education_livel }}</td>
                </tr>
                <tr>
                    <th>@lang('form.education_direction')</th>
                    <td>{{ $registration->course_direction }}</td>
                </tr>
                <tr>
                    <th>@lang('form.orientation')</th>
                    <td>{{ $registration->educate_direction }}</td>
                </tr>
                <tr>
                    <th>@lang('form.passport_rus')</th>
                    <td>
                        @if($registration->passport_rus)
                            <a href="{{ asset('storage/' . $registration->passport_rus) }}" target="_blank">@lang('form.download')</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>@lang('form.propiska')</th>
                    <td>
                        @if($registration->propiska)
                            <a href="{{ asset('storage/' . $registration->propiska) }}" target="_blank">@lang('form.download')</a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<footer>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJw=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    </footer>
   </body>
</html>