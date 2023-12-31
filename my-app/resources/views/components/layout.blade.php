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
    <main>
        <!-- Main Wrapper -->
        <div id="right-div-col" class="container-fluid g-0 mx-0">
            <div class="row g-0">
                <div class="col-lg-9 order-last order-lg-first" data-collapsed-sidebar-classes="col-lg-12">
                    <x-navbar />
                    <!-- Items Menu / Main Content -->
                    <div class="container-fluid text-center">
                        <div class="row justify-content-center">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div id="sidebar" class="col-lg-3 collapse collapse-horizontal show ">
                    <x-sidebar :cartItems="$cartItems" />
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://unpkg.com/axios/dist/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="{{ asset('js/javascript.js') }}"></script>

</html>
