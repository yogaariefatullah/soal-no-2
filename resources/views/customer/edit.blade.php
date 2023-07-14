<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('user.update',$id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="cst_name" value="{{ $data->cst_name }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="cst_dob" value="{{ $data->cst_dob }}">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kewarganegaraan</label>
                                <select name="nationality" class="form-control">
                                    <option value="">---Pilih Negara---</option>
                                    @foreach($negara as $val)
                                    <option value="{{ $val->nationality_id }}" {{ $val->nationality_id == $data->nationality ? 'selected' : '' }}>{{ $val->nationality_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-md btn-primary" id="add-input">Tambah Keluarga</button>
                            <div id="input-container"></div>
                            @foreach($keluarga as $val)
                            <div class="form-group input-container">
                                <label class="font-weight-bold">Nama Keluarga</label>
                                <input type="text" class="form-control" value="{{$val->fl_name}}" name="fam_name[]">
                             </div>

                            <div class="form-group input-container">
                                <label class="font-weight-bold">Tanggal Lahir Keluarga</label>
                                <input type="date" class="form-control" value="{{$val->fl_dob}}" name="fam_dob[]">
                            </div>
                            @endforeach
                            <br />
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $("#add-input").click(function() {
            $("#input-container").append(
                `<div class="form-group input-container">
                <label class="font-weight-bold">Nama Keluarga</label>
                <input type="text" class="form-control" name="fam_name[]">
            </div>
            <div class="form-group input-container">
                <label class="font-weight-bold">Tanggal Lahir Keluarga</label>
                <input type="date" class="form-control" name="fam_dob[]">
            </div>`
            );
        });

        $(document).on("click", ".remove", function() {
            $(this).closest(".input-container").remove();
        });
    </script>

</body>

</html>