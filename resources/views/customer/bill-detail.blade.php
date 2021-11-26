<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tohoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            overflow: hidden;
            min-height: 297mm;
            padding: 2.5cm;
            margin-left: auto;
            margin-right: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 237mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        button {
            width: 100px;
            height: 24px;
        }

        .header {
            overflow: hidden;
        }

        .logo {
            background-color: #FFFFFF;
            text-align: left;
            float: left;
        }

        .company {
            padding-top: 24px;
            text-transform: uppercase;
            background-color: #FFFFFF;
            text-align: right;
            float: right;
            font-size: 16px;
        }

        .title {
            text-align: center;
            position: relative;
            color: #0000FF;
            font-size: 24px;
            top: 1px;
        }

        .footer-left {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            float: left;
            font-size: 12px;
            bottom: 1px;
        }

        .footer-right {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            font-size: 12px;
            float: right;
            bottom: 1px;
        }

        .TableData {
            background: #ffffff;
            font: 11px;
            width: 100%;
            border-collapse: collapse;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border: thin solid #d3d3d3;
        }

        .TableData TH {
            background: rgba(0, 0, 255, 0.1);
            text-align: center;
            font-weight: bold;
            color: #000;
            border: solid 1px #ccc;
            height: 24px;
        }

        .TableData TR {
            height: 24px;
            border: thin solid #d3d3d3;
        }

        .TableData TR TD {
            padding-right: 2px;
            padding-left: 2px;
            border: thin solid #d3d3d3;
        }

        .TableData TR:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .TableData .cotSTT {
            text-align: center;
            width: 10%;
        }

        .TableData .cotTenSanPham {
            text-align: left;
            width: 40%;
        }

        .TableData .cotHangSanXuat {
            text-align: left;
            width: 20%;
        }

        .TableData .cotGia {
            text-align: right;
            width: 120px;
        }

        .TableData .cotSoLuong {
            text-align: center;
            width: 50px;
        }

        .TableData .cotSo {
            text-align: right;
            width: 120px;
        }

        .TableData .tong {
            text-align: right;
            font-weight: bold;
            text-transform: uppercase;
            padding-right: 4px;
        }

        .TableData .cotSoLuong input {
            text-align: center;
        }

        @media print {
            @page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

    </style>
    <title>Bill Detail</title>
</head>

{{-- <body onload="window.print();"> --}}

<body>
    <div id="page" class="page">
        <div class="header">
            <div class="logo"><img src="{{ asset('client/img/logo.png') }}" /></div>
            <div class="company">Ogani Shop</div>
        </div>
        <br />
        <div class="title">
            Bill DeTail
            <br />
            -------oOo-------
        </div>
        <br />
        <div>
            <h3>Customer Name: {{ $billDetail[0]->customer_name }}</h3>
            <h5>Email: {{ $billDetail[0]->customer_email }}</h5>
        </div>
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Product's Name</th>
                <th>Product's Quantity</th>
                <th>Product's Price</th>
                <th>Total</th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($billDetail as $item)
                @php
                    $count++;
                @endphp
                <tr>
                    <td class=\"cotSTT\">{{ $count }}</td>
                    <td class=\"cotTenSanPham\">{{ $item->product_name }}</td>
                    <td class=\"cotGia\">
                        <div>{{ $item->quantity }}</div>
                    </td>
                    <td class=\"cotSoLuong\" align='center'>{{ number_format($item->product_price) }} VND</td>
                    <td class=\"cotSo\">{{ number_format($item->product_price * $item->quantity) }} VND</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="tong">Total Bill</td>
                <td class="cotSo">{{ number_format($billDetail[0]->bill_total) }} VND</td>
            </tr>
        </table>
        <div class="footer-left"> By At : {{ date('d-m-Y', strtotime($billDetail[0]->bill_created)) }}<br /></div>
        <div class="footer-right">
            <form action="{{ route('export.billDetail',$billDetail[0]->id) }}">
                <input type="submit" value="Export Bill" />
            </form>
        </div>
    </div>
</body>

</html>
