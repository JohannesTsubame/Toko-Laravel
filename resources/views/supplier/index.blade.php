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
    <h1>TABLE SUPPLIER :</h1>

    <form action="{{ route('supplier.add') }}" class="AddData" >
        <button class="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </form>
</div>

<table style="width: 100%" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width:7%">ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>Kota</th>
            <th style="width:10%; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supplier as $s)
            <tr>
                <td>{{$s->id_supplier}}</td>
                <td>{{$s->nama}}</td>
                <td>{{$s->alamat}}</td>
                <td>{{$s->kode_pos}}</td>
                <td>{{$s->kota}}</td>
                <td class="action">
                    <form action="{{route('supplier.edit', $s->id)}}">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form 
                    action="{{route('supplier.delete', $s->id)}}"
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini? id item : {{$s->id_supplier}}');">
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