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
        <h2 style="color:white">Edit Data Supplier</h2>
        <a href="{{route('supplier.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('supplier.update', $supplier->id)}}" method="POST">
            @csrf
            @method("PUT")

            <div class="form-group row">
                <label class="col-sm-2">ID Supplier : </label>
                <div class="col-sm-10">
                    <input type="text" name="id_supplier" class="form-control" required readonly value="{{old('id_supplier', $supplier->id_supplier)}}">
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("id_supplier")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama : </label>
                <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" required value="{{old('nama', $supplier->nama)}}">
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("nama")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Alamat : </label>
                <div class="col-sm-10">
                <input type = "text" name="alamat" class="form-control" required value="{{old('alamat', $supplier->alamat)}}">
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("alamat")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kode Pos :</label>
                <div class="col-sm-10">
                <input type="text" name="kode_pos" class="form-control" required value="{{old('kode_pos', $supplier->kode_pos)}}">
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("kode_pos")
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Kota :</label>
                <div class="col-sm-10">
                <input type="text" name="kota" class="form-control" required value="{{old('kota', $supplier->kota)}}">
                </div>
                <div class="error" style="margin-top: 10px">
                    @error("kota")
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