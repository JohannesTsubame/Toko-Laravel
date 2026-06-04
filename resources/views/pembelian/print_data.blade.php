<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pembelian </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width:9%">ID Pembelian</th>
                <th>Nama Barang</th>
                {{-- <th>Varian</th> --}}
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $pmb)
            <tr>
                <td>PMBN-{{$pmb->id_pembelian}}</td>
                <td>{{$pmb->nama_barang}}</td>
                {{-- <td>{{$pmb->varian}}</td> --}}
                <td>{{$pmb->nama_supplier}}</td>
                <td>{{$pmb->qty}}</td>
                <td>{{$pmb->tgl}}</td>
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
