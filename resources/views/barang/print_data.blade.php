<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Barang </h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Nama</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
            <tr>
                <td>{{ $b->id_barang }}</td>
                <td>{{ $b->nama }}</td>
                <td>
                    <div class="beli">
                        <span>Rp</span>
                        <span>{{number_format($b->harga_beli,2,",",".")}}</span>
                    </div>
                </td>
                <td>
                    <div class="beli">
                        <span>Rp</span>
                        <span>{{number_format($b->harga_jual,2,",",".")}}</span>
                    </div>
                </td>
                <td>
                    <img src="{{ asset('uploads/barang_pic/' . $b->pic) }}" 
                         style="width: 100px; height: auto;" />
                </td>
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
