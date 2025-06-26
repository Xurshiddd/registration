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
        <h2>Registrations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ismi</th>
                    <th>Tugatgan talim muassasasi</th>
                    <th>Talim darajasi</th>
                    <th>Amal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td>{{ $registration->id }}</td>
                        <td>{{ $registration->first_name }}</td>
                        <td>{{ $registration->education }}</td>
                        <td>{{ $registration->education_livel }}</td>
                        <td>
                            <a href="{{ route('admin.show', $registration->id) }}" class="btn btn-primary btn-sm">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $registrations->links('pagination::bootstrap-5') }}
    </div>
    <footer>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJw=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    </footer>
   </body>
</html>
