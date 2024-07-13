<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Mahasiswa</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body style="background-color: #eee">
    {{-- Header --}}
    <header>
        <div class="my-5">
            <h1 class="text-center">Sistem Pencatatan Data Mahasiswa</h1>
        </div>
    </header>
    {{-- End of Header --}}

    {{-- Content --}}
    <div class="container bg-light p-3 mb-5">
        <form action="{{ route('mahasiswa.update', $mhs->nim) }}" method="POST">
            @csrf
            @method('PUT')
            <h3>Edit Mahasiswa</h3> <hr>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $mhs->nim) }}" disabled>

                        @error('nim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mhs->nama_mhs) }}" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="tempat_lahir">Tempat Lahir</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $mhs->tempat_lahir) }}">

                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mhs->tgl_lahir) }}">

                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $mhs->jns_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $mhs->alamat) }}">

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-sm-4">
                        <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="number" class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" value="{{ old('jumlah_saudara_kandung', $mhs->jlh_saudara_kandung) }}">

                        @error('jumlah_saudara_kandung')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong> 
                            </span>
                        @enderror
                    </div>
                </div>
                <hr>

            <a href="/" class="btn btn-danger"><i class="bi bi-x-square"></i> Batal</a>
            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        </form>
    </div>
    {{-- End of Content --}}

    {{-- Footer --}}
    <footer>
        <div class="bg-dark p-3 text-center text-white">
            Copyright &copy; 2022 Kelompok 5 Kom-A
        </div>
    </footer>
    {{-- End of Footer --}}

    {{-- Sweetalert --}}
    @include('sweetalert::alert')

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>