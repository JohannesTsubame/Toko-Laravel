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

    /* .action button {
        width: 70px;
        margin: 0 5px 0 5px;
    } */

    i {
        width: 15px;
        height: 15px;
    }
</style>

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
        <tr>
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
                    <form action="{{route('barang.edit', $b->id)}}">
                        <button type="submit" class="btn btn-info ml-2 mr-2">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form 
                    action="{{route('barang.delete', $b->id)}}"
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini? id item : {{$b->id_barang}}');">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger ml-2 mr-2">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

@endsection