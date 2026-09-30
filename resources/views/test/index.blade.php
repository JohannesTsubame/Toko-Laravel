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
                text : `Data ID S-${item}`,
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
    <h1>TABLE MHS1 :</h1>

    {{-- <div style="display: flex">
        <form action="{{ route('supplier.print_data') }}" target="_blank">
            <button type="submit" class="btn btn-danger ml-2 w-90">
                <i class="fa fa-print"></i> Print Data
            </button>
        </form>
        <form action="{{ route('supplier.export') }}" target="_blank">
            <button type="submit" class="btn btn-success ml-2 w-90">
                <i class="fa fa-table"></i> Export Data
            </button>
        </form>
        <form action="{{ route('supplier.add') }}">
            <button type="submit" class ="btn btn-primary ml-2 w-90">
                <i class="fa fa-plus"></i> Add Data
            </button>
        </form>
    </div> --}}
</div>

<table style="width: 100%" class="table table-bordered table-hover">
    <thead>
        <tr>
        <th style="width: 5%">No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Prodi</th>
        <th>No HP</th>
        <th>Kelas</th>
        <th>Update At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
            <tr>
                <td>{{$loop -> iteration }}</td>
                <td>{{ $d["nim"] }}</td>
                <td>{{ $d["nama"] }}</td>
                <td>{{ $d["prodi"] }}</td>
                <td>{{ $d["telpon"] }}</td>
                <td>{{ $d["kelas"] }}</td>
                <td>{{ $d["updated_at"] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection 