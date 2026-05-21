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
    <h1>TABLE PEMBELI :</h1>
    <form action="{{ route('pembeli.add') }}" class="AddData" >
        <button type="submit" class ="btn btn-primary">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
    </form>
</div>

<table style="width: 100%" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 3%">No</th>
            <th style="width:7%">ID Pembeli</th>
            <th style="width: 20%">Nama Pembeli</th>
            <th>Kelamin</th>
            <th>Kota</th>
            <th>Kode Pos</th>
            <th>Alamat</th>
            <th style="width: 10%">Tanggal Lahir</th>
            <th style="width:10%; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembeli as $p)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>PMB-{{$p->id_pembeli}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->jns_kelamin}}</td>
                <td>{{$p->kota}}</td>
                <td>{{$p->kode_pos}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->tgl_lahir}}</td>
                <td class="action">
                    <form action="{{route('pembeli.edit', $p->id)}}">
                        <button type="submit" class="btn btn-info ml-2 mr-2">
                            <i class="fa fa-edit"></i>
                        </button>
                    </form>
                    <form 
                    action="{{route('pembeli.delete', $p->id)}}"
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini? id item : {{$p->id_pembeli}}');">
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