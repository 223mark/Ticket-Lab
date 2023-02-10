@props(['title', 'formTitle'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }}</title>
</head>

<body>
    <div class="min-h-screen flex pt-5 flex-col items-center justify-center bg-gray-100">
        <div class="flex justify-center items-center -m-4 z-10  ">
            <img src="{{ asset('img/codelab.png') }}" alt="logo"
                class=" h-28 w-28 border-1 border-gray-500 rounded-full shadow-lg ">
        </div>
        <div
            class="
          flex flex-col
          bg-white
          shadow-md
          px-4
          sm:px-6
          md:px-8
          lg:px-10
          py-8
          rounded-3xl
          w-50
          max-w-md
        ">

            <div class="font-medium self-center text-xl sm:text-3xl text-green-500">
                {{ $formTitle }}
            </div>
            <div class="mt-4 self-center text-xl text-sm text-indigo-400 md:text-lg">
                Enter your credentials to get access account
            </div>

            <div class="mt-10">
                {{ $slot }}
            </div>
        </div>

    </div>

</body>

</html>
