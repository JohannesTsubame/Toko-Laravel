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
        <h2 style="color:white">Tambah Data Barang</h2>
        <a href="{{route('barang.index')}}">
            <i class="fa fa-arrow-left" style="color: white; font-size:40px"></i>
        </a>
    </div>
    <div class="card-body">
        <form id="Form" action="{{route('barang.save')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2">ID Barang :</label>
                <div class="col-sm-10">
                    <input type="text" name="id_barang" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Nama Barang :</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Varian :</label>
                <div class="col-sm-10">
                    <input type="text" name="varian" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">Harga Beli (Rp) :</label>
                <div class="col-sm-10">            
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-2">Harga Jual (Rp) :</label>
                <div class="col-sm-10">            
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class ="error" style="margin-top: 10px">
                    @error('id_barang')
                    {{$message}}
                    @enderror
                </div>
            </div>

            <div class="action">
                <button type="button" 
                        class="btn btn-primary" 
                        style="font-size: 20px"
                        onclick="ConfirmAdd()">
                    <i class="fa fa-save mr-2"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection