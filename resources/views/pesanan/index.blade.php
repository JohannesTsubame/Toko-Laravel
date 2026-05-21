@vite(['resources/css/app.css', 'resources/js/app.js'])

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

@extends("menu")
@section("content")

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
                <td class="action">
                    <form action="{{route('pesanan.edit', $psn->id_pesanan)}}">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form 
                    action="{{route('pesanan.delete', $psn->id_pesanan)}}"
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini? id item : {{$psn->id_pesanan}}');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

@endsection