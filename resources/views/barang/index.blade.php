@extends('layouts/app')
@section('konten')
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($barang as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/barang/').$item->gambar }}" class="rounded" style="width: 50px">
                                    </td>
                                    <td>{{ $item->kondisi }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                          {{ $barang->links() }}

</html>
@endsection
