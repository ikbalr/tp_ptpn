<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            @if(session()->has('success'))
            Swal.fire(
            'Berhasil!',
            '{{ session("success") }}',
            'success'
            );
            @endif
            @if(session()->has('error'))
            Swal.fire(
            'Gagal!',
            '{{ session("error") }}',
            'error'
            );
            @endif
            @if(session()->has('warning'))
            Swal.fire(
            'Peringatan!',
            '{{ session("warning") }}',
            'warning'
            );
            @endif
            let elementsArray = document.querySelectorAll("#delete-karyawan-btn");

            elementsArray.forEach(function(elem) {
                elem.addEventListener("click", function() {
                    var itemId = $(this).data('pers');
                    
                    Swal.fire({
                        title: 'Hapus nih?',
                        text: "Yakin mau hapus item?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yakin'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var deleteForm = $('.delete-karyawan-' + itemId);
                            deleteForm.submit();
                        }
                    });
                });
            });
            $('.edit-karyawan-btn').on('click', function () {
                $('#ininama').val($(this).data('nama'));
                $('#inipers').val($(this).data('pers'));
                $('#iniposisi').val($(this).data('posisi'));
                $('#inigolongan').val($(this).data('golongan'));
            
                //If you want to pass data to for action for a form, you can do this 
                $('#update-karyawan').attr('action', $(this).data('link-update'));
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>
