<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

                @if (session('SUCCESS'))
                    <div class="bg-yellow-100 px-4 py-2 border border-blue-600 text-center text-yellow-500 m-5 text-lg">
                        {{ session('SUCCESS') }}
                    </div>
                @endif

                @if (session('ERROR'))
                    <div class="bg-red-100 px-4 py-2 border border-blue-600 text-center text-red-500 m-5 text-lg">
                        {{ session('ERROR') }}
                    </div>
            @endif

                @if (session()->has('failures'))
                    <table class="table table-danger w-50 mx-auto">
                        <tr>
                            <th>Row</th>
                            <th>Attributes</th>
                            <th>Errors</th>
                            <th>Value</th>
                        </tr>
                        @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td>{{$validation->row()}}</td>
                                <td>{{$validation->attribute() }}</td>
                                <td>
                                    {{-- <ul> --}}
                                    @foreach ($validation->errors() as $e)
                                        {{-- <li>{{$e}}</li> --}}
                                        <p>{{$e}}</p>
                                    @endforeach
                                    {{-- </ul> --}}
                                </td>
                                <td>{{$validation->values()[$validation->attribute()]}}</td>
                            </tr>
                        @endforeach

                    </table>

            @endif

            <!-- Page Content -->
                <form id="delete-form" action="" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">

                </form>
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script>
            $(document).on("click", ".delete-row", function (e) {
                e.preventDefault();
                    let href = $(this).attr("href");
                    $("#delete-form").attr("action", href);
                    $("#delete-form").submit();
                // }
            })
        </script>
    </body>
</html>
