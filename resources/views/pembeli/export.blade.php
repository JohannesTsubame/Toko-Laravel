<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Pembeli </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width:7%">ID Pembeli</th>
                <th style="width: 20%">Nama Pembeli</th>
                <th>Kelamin</th>
                <th>Kota</th>
                <th>Kode Pos</th>
                <th>Alamat</th>
                <th style="width: 10%">Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $p)
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
