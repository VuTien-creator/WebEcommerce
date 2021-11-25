<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="visible-print text-center">
	<h1> Laravel QR Code Generator Example </h1>

    {{-- <img src="{{ asset($path) }}"> --}}
    {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} "> --}}
{!! QrCode::size(250)->generate('http://127.0.0.1:8000/bill-detail-10'); !!}

    {{-- {!! QrCode::size(250)->generate('test'); !!} --}}
</div>

</body>
</html>

