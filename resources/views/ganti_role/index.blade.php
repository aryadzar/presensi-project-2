<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ganti Role</title>
    <link rel="shortcut icon" href="{{ asset('/assets/logo_unila/unila.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-blue-500 to-blue-950 overflow-hidden">
    <div class="w-full max-w mx-auto rounded-lg shadow-lg p-2">
        <div class="flex items-center p-3">
            <img src="{{ asset('assets/logo_absensi/image.png') }}" alt="Logo Unila" class="h-12 mr-4">
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center w-full">
        <!-- Container for Form and Content -->
        <div
            class="flex flex-col justify-center items-center backdrop-blur-lg rounded-lg overflow-hidden relative z-10 max-w-md mx-auto w-full p-8">
            <!-- Form Section -->
            <div class="w-full bg-blue-400 rounded-lg shadow-md p-10">
                <div class="flex items-center mb-7 text-black">
                    <i class="fa-solid fa-arrow-right-arrow-left fa-rotate-by" style="--fa-rotate-angle: 135deg;"></i>
                    <h2 class="text-2xl font-semibold ml-2">Ganti Role</h2>
                </div>

                <div class="text-center space-y-5 ">
                    @foreach ($roles as $setRole)
                        <li>
                            <form action="{{ route('set_role') }}" method="POST">
                                @csrf
                                <input type="hidden" name="role_id" value="{{ $setRole->role->id }}">
                                <button type="submit"
                                    class="block bg-green-200 text-green-800 py-4 px-6 rounded-lg border border-green-800 hover:bg-green-300 transition w-full">{{ $setRole->role->nama_role }}
                                    || {{ $setRole->unitKerja->nama_unit }}</button>
                            </form>
                        </li>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</body>

</html>
