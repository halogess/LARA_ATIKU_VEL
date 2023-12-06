<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JJHC</title>
    <script src="/style/cdn.tailwindcss.com_3.3.3"></script>
    <style>
        table,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    {{-- <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Pass</th>
            <th>Saldo</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id_pembeli'] }}</td>
                <td>{{ $user['username_pembeli'] }}</td>
            </tr>
        @endforeach

    </table> --}}

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register</h2>
            <a href="{{ url('/') }}">Back</a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" method="POST">
                @csrf

                @yield('form')

            </form>
        </div>
    </div>
</body>

</html>
