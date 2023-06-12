<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoostappTask</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{ csrf_field() }}
    <script>
        window.axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        };
    </script>
    <main>
        <!-- Main Wrapper -->
        <div class="container-fluid g-0 mx-0">
            <div class="row g-0">
                <div class="col-9" data-collapsed-sidebar-classes="col-12">
                    <x-navbar />
                    <!-- Items Menu / Main Content -->
                    <div class="row m-auto ">
                        {{ $slot }}
                    </div>
                </div>
                <!-- Sidebar -->
                <x-sidebar :cartItems="$cartItems" />
    </main>
</body>

<script src="https://unpkg.com/axios/dist/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="{{ asset('js/javascript.js') }}"></script>


</html>
