<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

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
                <th style="width: fit-content">Foto</th>
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
                <td>
                    @if ($s->pic)
                        <a href="{{ asset('uploads/supplier_pic/' . $s->pic) }}" target=_blank>
                            <img src="{{ asset('uploads/supplier_pic/' . $s->pic) }}"
                                style="width: 100px; height: auto;" />
                        </a>
                    @else
                        No Foto
                    @endif
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
