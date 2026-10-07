@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
        }

        .action {
            display: flex;
            justify-content: flex-end;
        }

        label {
            font-size: 20px
        }

        button {
            width: 120px;
        }
    </style>

    <script>
        function ConfirmAdd() {
            Swal.fire({
                icon : 'question',
                iconColor : "#ffae5a",
                title : 'Are You Sure You Want to Add the Data?',
                confirmButtonText : 'Add',
                confirmButtonColor : "#446fff",
                showCancelButton : true,
                theme : "dark",
                background : "#202a3e",
                reverseButtons : true,
            }).then((result) => {
                if (result.isConfirmed){
                    document.getElementById("Form").submit()
                }
            });
        }

        document.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                ConfirmAdd();
            }
        });
    </script>
</head>

@extends("menu")
@section("content")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Tambah Data Mahasiswa 2</h2>
        <a href="{{route('mhs2.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('mhs_api2.save')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2">NIM :</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('nim')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('nama')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Jenis Kelamin :</label>
                <div class="col-sm-10">
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">- - Select - -</option>
                        <option value="P">Pria</option>
                        <option value="W">Wanita</option>
                    </select>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('jenis_kelamin')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Lahir :</label>
                <div class="col-sm-10">            
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('tanggal_lahir')
                    {{$message}}
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2">No. Telpon:</label>
                <div class="col-sm-10">            
                    <input type="text" name="telpon" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('telpon')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Prodi</label>
                <div class="col-sm-10">
                    <select name="prodi" class="form-control" required>
                        <option value="">- - Select - -</option>
                        <option value="TI">TI</option>
                        <option value="SI">SI</option>
                    </select>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('prodi')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kelas :</label>
                <div class="col-sm-10">            
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('kelas')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="action">
                <button type="button" 
                        class="btn btn-primary" 
                        style="font-size: 20px"
                        onclick="ConfirmAdd()">
                    <i class="fa fa-save mr-2"> </i> Save
                </button>
            </div>
            {{-- <button type="submit" class="btn btn-primary">
                <i class="fa fa-save mr-2"></i> Save
            </button> --}}
        </form>
    </div>
</div>
@endsection