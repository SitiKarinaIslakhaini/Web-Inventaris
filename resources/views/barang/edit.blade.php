@extends('layouts/app')
@section('konten')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $barang->nama_barang }}" placeholder="">

                                <!-- error message untuk title -->
                                @error('nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"  >
                                @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kondisi</label>
                                <select class="form-control" @error('kondisi')is-invalid @enderror name="kondisi">
                                    <option value="Baik">Baik</option>
                                    <option value="Tidak Bagus">Tidak Bagus</option>
                                    <option value="Rusak">Rusak</option>


                                </select>

                                <!-- error message untuk title -->
                                @error('kondisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

</html>
@endsection
