<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pesanan </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width:10%">ID Pesanan</th>
                <th>Nama Barang</th>
                <th>Varian</th>
                <th>Nama Pembeli</th>
                <th>Quantity</th>
                <th>Tanggal Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan as $psn)
            <tr>
                <td>PSN-{{$psn->id_pesanan}}</td>
                <td>{{$psn->nama_barang}}</td>
                <td>{{$psn->varian}}</td>
                <td>{{$psn->nama_pembeli}}</td>
                <td>{{$psn->qty}}</td>
                <td>{{$psn->tgl_pesan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function closeWindow() {
            window.close();
        }
    </script>
</body>
