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
        function ConfirmUpdate() {
            Swal.fire({
                icon : 'question',
                iconColor : "#ffae5a",
                title : 'Are You Sure You Want to Update the Data?',
                confirmButtonText : 'Update',
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
                ConfirmUpdate();
            }
        });
    </script>
</head>

@extends("menu")
@section("content")

<div class="card">
    <div class="card-header" style="background: #303a4e">
        <h2 style="color:white">Edit Data Pembeli</h2>
        <a href="{{route('pembeli.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" class="form-grid" action="{{route('pembeli.update', $pembeli->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group row">
                <label class="col-sm-2">ID Pembeli :</label>
                <div class="col-sm-10">
                    <input type="text" name="id_pembeli" class="form-control" required readonly value='{{old("id_pembeli", $pembeli->id_pembeli)}}'>
                </div>
                <div class="error">
                    @error("id_pembeli")
                        {{$message}}
                    @enderror   
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required value='{{old("nama", $pembeli->nama)}}'>
                </div>
                <div class="error">
                    @error("nama")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kelamin :</label>
                <div class="col-sm-10">
                    <select name="jns_kelamin" class="form-control" required>
                        <option>
                            Male
                        </option>
                        <option value="Female">
                            Female
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kode Pos :</label>
                <div class="col-sm-10">
                    <input type="text" 
                    name="kode_pos" 
                    class="form-control" 
                    value='{{old("kode_pos", $pembeli->kode_pos)}}'
                    required>
                </div>
                <div class="error">
                    @error("kode_pos")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kota :</label>
                <div class="col-sm-10">
                    <input type="text" name="kota" class="form-control" required value='{{old("kota", $pembeli->kota)}}'>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Tanggal Lahir :</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control" required value='{{old("tgl_lahir", $pembeli->tgl_lahir)}}'>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Alamat :</label>
                <div class="col-sm-10">
                    <textarea name="alamat" 
                              class="form-control" 
                              required>{{old("alamat", $pembeli->alamat)}} 
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="pic" class="form-control" accept=".jpg, .jpeg, .png, .webp"> 
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('pic')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="action">
                <button type="button"
                        class="btn btn-primary" 
                        style="font-size: 20px"
                        onclick="ConfirmUpdate()">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection