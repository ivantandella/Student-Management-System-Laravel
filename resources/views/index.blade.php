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
        <div class="row mb-3">
            <div class="col-md-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMhs"><i class="bi bi-plus-square"></i> Tambah</button>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <form action="/" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                        <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <th class="text-center">NIM</th>
                <th class="text-center">Nama Mahasiswa</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Jumlah Saudara Kandung</th>
                <th class="text-center">Aksi</th>
            </thead>
            <tbody class="table-group-divider">
                @if ($mahasiswa->count())
                    @foreach ($mahasiswa as $mhs)    
                    <tr>
                        <td class="text-center">{{ $mhs->nim }}</td>
                        <td>{{ $mhs->nama_mhs }}</td>
                        <td>{{ $mhs->tempat_lahir }}</td>
                        <td class="text-center">{{ $mhs->tgl_lahir }}</td>
                        <td class="text-center">{{ $mhs->jns_kelamin }}</td>
                        <td>{{ $mhs->alamat }}</td>
                        <td class="text-center">{{ $mhs->jlh_saudara_kandung }}</td>
                        <td class="text-center">
                            <a href="{{ route('mahasiswa.edit', $mhs->nim) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>

                            <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else 
                    <tr>
                        <td colspan="8" class="text-center">No Data Found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $mahasiswa->links() }}
    </div>

    {{-- Modal Tambah Mahasiswa --}}
    <div class="modal fade" id="addMhs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="nim">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}">
    
                            @error('nim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" autofocus>
    
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
    
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
    
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="L">
                                <label class="form-check-label" for="jenis_kelamin1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="P">
                                <label class="form-check-label" for="jenis_kelamin2">
                                    Perempuan
                                </label>
                            </div>
    
                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
    
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-12">
                            <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
                            <input type="number" class="form-control @error('jumlah_saudara_kandung') is-invalid @enderror" id="jumlah_saudara_kandung" name="jumlah_saudara_kandung" value="{{ old('jumlah_saudara_kandung') }}">
    
                            @error('jumlah_saudara_kandung')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    {{-- End of Modal Tambah Mahasiswa --}}

    {{-- End of Content --}}

    {{-- Footer --}}
    <footer class="@if($mahasiswa->count() < 5) fixed-bottom @endif">
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