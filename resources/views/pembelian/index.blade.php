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

<div class="Header">
    <h1>TABLE PEMBELIAN :</h1>

    <form action="{{ route('pembelian.add') }}" class="AddData" >
        <button type="submit" class ="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </form>
</div>

<table style="width: 100%; font-size: 15px" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 3%">No </th>
            <th style="width:9%">ID Pembelian</th>
            <th>Nama Barang</th>
            {{-- <th>Varian</th> --}}
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Tanggal Pembelian</th>
            <th style="width:10%; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelian as $pmb)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>PMBN-{{$pmb->id_pembelian}}</td>
                <td>{{$pmb->nama_barang}}</td>
                {{-- <td>{{$pmb->varian}}</td> --}}
                <td>{{$pmb->nama_supplier}}</td>
                <td>{{$pmb->qty}}</td>
                <td>{{$pmb->tgl}}</td>
                <td class="action">
                    <form action="{{route('pembelian.edit', $pmb->id_pembelian)}}">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form 
                    action="{{route('pembelian.delete', $pmb->id_pembelian)}}"
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini? id item : {{$pmb->id_pembelian}}');">
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