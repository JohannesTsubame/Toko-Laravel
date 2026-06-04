<head>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
          crossorigin="anonymous">
</head>

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
                <th style="width: fit-content">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $p)
            <tr>
                <td>{{ $p->id_pembeli }}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->jns_kelamin}}</td>
                <td>{{$p->kota}}</td>
                <td>{{$p->kode_pos}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->tgl_lahir}}</td>
                <td>
                    @if ($p->pic)
                        <a href="{{ asset('uploads/pembeli_pic/' . $p->pic) }}" target=_blank>
                            <img src="{{ asset('uploads/pembeli_pic/' . $p->pic) }}"
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
