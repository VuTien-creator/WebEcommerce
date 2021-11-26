<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani Shop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/style.css" type="text/css">

    @livewireStyles

</head>

<body>

    <div>
        {{-- <div> --}}

        <livewire:customer.widgets.header>
            <livewire:customer.widgets.search>
                <!-- Breadcrumb Section Begin -->
                <section class="breadcrumb-section ">
                    <img src="{{ asset('client') }}/img/breadcrumb.jpg" alt="">
                </section>
                <!-- Breadcrumb Section End -->
                {{-- </div> --}}
    </div>
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="">Total</th>
                                    <th>Ordered date</th>
                                    <th>QR Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="">
                                            {{ number_format($item['total_price']) }} VND
                                        </td>
                                        <td class="">
                                            {{ $item['date'] }}
                                        </td>
                                        <td class="">
                                            @if (!empty($item['path']))
                                                <img src="{{ asset($item['path']) }}" alt=""
                                                    style="height: 100px; width: 100;">
                                            @else
                                                <img src="{{ asset('qrcode/Donthave.png') }}" alt=""
                                                    style="height: 100px; width: 100;">
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shoping Cart Section End -->





    <livewire:customer.widgets.footer>

        <!-- Js Plugins -->
        <script src="{{ asset('client') }}/js/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('client') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('client') }}/js/jquery.nice-select.min.js"></script>
        <script src="{{ asset('client') }}/js/jquery-ui.min.js"></script>
        <script src="{{ asset('client') }}/js/jquery.slicknav.js"></script>
        <script src="{{ asset('client') }}/js/mixitup.min.js"></script>
        <script src="{{ asset('client') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('client') }}/js/main.js"></script>



        @livewireScripts
</body>

</html>
