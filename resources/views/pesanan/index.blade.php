@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <style>
        .Header {
            display: flex;
            justify-content: space-between;
        }

        .action {
            display: flex;
            justify-content: space-evenly
        }

        th {
            background: rgb(70, 84, 111) !important;
            color: white !important;
        }

        .Header i, .action i {
            width: 15px;
            height: 15px;
        }
    </style>

    <script>
        function ConfirmDelete(item, id) {
            Swal.fire({
                icon : 'warning',
                iconColor : "#ff2222",
                title : "Are You Sure You Want to Delete this Data?",
                text : `Data ID PSN-${item}`,
                confirmButtonText : 'Delete',
                confirmButtonColor : "#ff2222",
                showCancelButton : true,
                theme : "dark",
                background : "#202a3e",
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed){
                    document.getElementById(`Form${id}`).submit()
                }
            });
        }
    </script>
</head>

@extends("menu")
@section("content")

@if(session('save'))
    <script>
        Swal.fire({
            title: "{{session('save')['judul']}}",
            theme : "dark",
            text: "{{session('save')['pesan']}}",
            icon: "{{session('save')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@elseif(session("update"))
    <script>
        Swal.fire({
            title: "{{session('update')['judul']}}",
            theme: "dark",
            text: "{{session('update')['pesan']}}",
            icon: "{{session('update')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@elseif(session("delete"))
    <script>
        Swal.fire({
            title: "{{session('delete')['judul']}}",
            theme: "dark",
            text: "{{session('delete')['pesan']}}",
            icon: "{{session('delete')['icon']}}",
            toast : true,
            showConfirmButton : false,
            timer : 2800,
            timerProgressBar : true,
            position :  "bottom-end"
        });
    </script>
@endif

<div class ="Header">
    <h1>TABLE PESANAN :</h1>

    <form action="{{ route('pesanan.add') }}" class="AddData" >
        <button type="submit" class ="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </form>
</div>

<table style="width: 100%; font-size: 15px" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 3%">No</th>
            <th style="width:10%">ID Pesanan</th>
            <th>Nama Barang</th>
            <th>Varian</th>
            <th>Nama Pembeli</th>
            <th>Quantity</th>
            <th>Tanggal Pesanan</th>
            <th style="width:10%; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan as $psn)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>PSN-{{$psn->id_pesanan}}</td>
                <td>{{$psn->nama_barang}}</td>
                <td>{{$psn->varian}}</td>
                <td>{{$psn->nama_pembeli}}</td>
                <td>{{$psn->qty}}</td>
                <td>{{$psn->tgl_pesan}}</td>
                {{-- <td>{{ dd($psn->id_pesanan) }}</td> --}}
                <td class="action">
                    <form action="{{route('pesanan.edit', $psn->id_pesanan)}}">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{route('pesanan.delete', $psn->id_pesanan)}}"
                          method="POST" 
                          id="Form{{ $psn->id }}">
                          @csrf
                        @method("DELETE")
                        <button type="button" 
                                onclick="ConfirmDelete({{ $psn->id_pesanan }}, {{ $psn->id }})" 
                                class="btn btn-danger ml-2 mr-2">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

@endsection