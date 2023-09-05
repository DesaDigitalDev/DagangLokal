<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Barang') }}
        </h2>
        <style>
            .link_name {
                color: blue;
            }

            .link_name:hover {
                border-bottom: 1.5px solid blue;
                font-size: 15px;
                /* transition: all 0.3s ease-in-out */
            }
        </style>
    </x-slot>

    @if ($message = Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <x-primary-button class="ml-4" onclick="window.location='{{ route('barang.create') }}'">
                {{ __('Tambah Produk') }}
            </x-primary-button>
            <!-- tabel -->
            <div class="mt-3 table-responsive" style="text-align: center">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 40px">No</th>
                            <th style="min-width: 100px">Nama Perusahaan</th>
                            <th style="min-width: 100px">Nama Produk</th>
                            <th style="min-width: 100px">Kategori</th>
                            <th style="min-width: 120px">Harga</th>
                            {{-- <th style="min-width: 100px">Berat</th> --}}
                            <th style="min-width: 100px">No. P-IRT</th>
                            <th style="min-width: 100px">No. Serfitikat Halal</th>
                            {{-- <th style="min-width: 100px">BPOM</th>
                            <th style="min-width: 100px">Deskripsi</th> --}}
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->vendor }}</td>
                                <td>
                                    <a href="{{ route('tracking_product', $item->id) }}" class="link_name">
                                        {{ $item->name }} </a>
                                </td>
                                <td>{{ $item->category_name }}</td>
                                <td>Rp.{{ number_format($item->unit_price / 1, 2) }} </td>
                                {{-- <td>{{ $item->unit_weight }}</td> --}}
                                <td>{{ $item->no_pirt }}</td>
                                <td>{{ $item->no_sertifikat_halal }}</td>
                                {{-- <td>{{ $item->bpom_no }}</td>
                                <td>{{ $item->description }}</td> --}}
                                <td>
                                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Hapus Data Barang ?')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($product == null)
                            <tr class="text-center">
                                <td colspan="10">Data Produk Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
