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
                text : `Data ID B-${item}`,
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

<div class ="Header">
    <h1>TABLE BARANG :</h1>

    <form action="{{ route('barang.add') }}">
        <button type="submit" class ="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </form>
</div>

<table style="width: 100%; font-size: 15px" class="table table-bordered table-hover">
    <thead>
        <tr >
            <th style="width: 3%">No</th>
            <th style="width: 7%">ID Barang</th>
            <th>Nama Barang</th>
            <th>Varian</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th style="width:10%; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $b)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>B-{{$b->id_barang}}</td>
                <td>{{$b->nama}}</td>
                <td>{{$b->varian}}</td>
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
                <td class="action">
                    <form action="{{route('barang.edit', $b->id_barang)}}">
                        <button type="submit" class="btn btn-info ml-2 mr-2">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form action="{{route('barang.delete', $b->id_barang)}}"
                          method="POST"
                          id="Form{{ $b->id }}">
                        @csrf
                        @method("DELETE")
                        <button type="button" 
                                onclick="ConfirmDelete({{ $b->id_barang }}, {{ $b->id }})" 
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