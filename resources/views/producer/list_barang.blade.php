<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Barang') }}
        </h2>
    </x-slot>

    @if ($message = Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif 
        
    <div class="card shadow mb-4">
        <div class="card-body">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
            <!-- tabel -->
            <div class="mt-3 table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 40px">No</th>
                            <th style="min-width: 100px">Name</th>
                            <th style="min-width: 100px">Kategori</th>
                            <th style="min-width: 100px">Vendor</th>
                            <th style="min-width: 100px">Harga</th>
                            <th style="min-width: 100px">Stock</th>
                            <th style="min-width: 100px">Berat</th>
                            <th style="min-width: 100px">BPOM</th>
                            <th style="min-width: 100px">Deskripsi</th>
                            <th style="min-width: 100px">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['category_name'] }}</td>
                            <td>{{ $item['vendor'] }}</td>
                            <td>{{ $item['unit_price'] }}</td>
                            <td>{{ $item['unit_in_stock'] }}</td>
                            <td>{{ $item['unit_weight'] }}</td>
                            <td>{{ $item['bpom_no'] }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                {{-- <form action="{{ url('/producer' . '/' . $item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf --}}
                                    <button type="submit" onclick="return confirm('Hapus Data Barang ?')" class="btn btn-sm btn-danger bg-red">
                                        <i class="fa fa-trash"></i>Hapus
                                    </button>
                                {{-- </form> --}}
                            </td>
                        </tr>
                        @endforeach

                        @if($product == null)
                        <tr class="text-center">
                            <td colspan="10">Data Penduduk Tidak Ditemukan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>