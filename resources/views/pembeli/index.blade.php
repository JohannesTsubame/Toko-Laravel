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
                text : `Data ID PMB-${item}`,
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
    <h1>TABLE PEMBELI :</h1>

    <div style="display: flex">
        <form action="{{ route('pembeli.print_data') }}" target="_blank">
            <button type="submit" class="btn btn-danger ml-2 w-90">
                <i class="fa fa-print"></i> Print Data
            </button>
        </form>
        <form action="{{ route('pembeli.export') }}" target="_blank">
            <button type="submit" class="btn btn-success ml-2 w-90">
                <i class="fa fa-table"></i> Export Data
            </button>
        </form>
        <form action="{{ route('pembeli.add') }}">
            <button type="submit" class ="btn btn-primary ml-2 w-90">
                <i class="fa fa-plus"></i> Add Data
            </button>
        </form>
    </div>
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
                    <form action="{{route('pembeli.delete', $p->id)}}"      
                          method="POST" 
                          id="Form{{ $p->id }}">
                        @csrf
                        @method("DELETE")
                        <button type="button" 
                                onclick="ConfirmDelete({{ $p->id_pembeli }}, {{ $p->id }})" 
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