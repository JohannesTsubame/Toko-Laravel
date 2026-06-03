<body onload="window.print(); window.onafterprint = closeWindow;">
    <h6>JONATHAN ANDREW WIJAYA - 310124023844</h4>
    <h1>Data Supplier </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="width:7%">ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Kota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $s)
            <tr>
                <td>S-{{$s->id_supplier}}</td>
                <td>{{$s->nama}}</td>
                <td>{{$s->alamat}}</td>
                <td>{{$s->kode_pos}}</td>
                <td>{{$s->kota}}</td>
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
