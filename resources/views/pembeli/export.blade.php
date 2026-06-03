<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pembeli </h1>
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
                <td>{{$p->nama}}</td>
                <td>{{$p->jns_kelamin}}</td>
                <td>{{$p->kota}}</td>
                <td>{{$p->kode_pos}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->tgl_lahir}}</td>
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
