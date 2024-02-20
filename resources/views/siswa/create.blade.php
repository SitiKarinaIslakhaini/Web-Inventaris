@extends('layouts/app')
@section('konten')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama"  placeholder="Masukkan Nama">

                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <select class="form-control" @error('kelas')is-invalid @enderror name="kelas">
                                    <option value="XII RPL">XII PPLG</option>
                                    <option value="XII DKV">XII DKV</option>
                                    <option value="XII TKJ">XII TKJ</option>
                                    <option value="XII LISTRIK">XII LISTRIK</option>
                                    <option value="XII ELEKTRONIKA">XII ELEKTRONIKA</option>
                                    <option value="XII BUSANA">XII BUSANA</option>
                                    <option value="XII PSPT">XII PSPT</option>
                                    <option value="XII OTOTRONIKA">XII OTOTRONIKA</option>
                                    <option value="XII MEKATRONIKA">XII MEKATRONIKA</option>

                                </select>

                                <!-- error message untuk title -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@poperjs/core@2.5.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

</html>
@endsection
