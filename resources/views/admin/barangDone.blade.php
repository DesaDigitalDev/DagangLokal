<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Barang Selesai') }}
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
            {{-- <x-primary-button class="ml-4" onclick="window.location='{{ route('barang.create') }}'">
                {{ __('Tambah Data') }}
            </x-primary-button> --}}
            <!-- tabel -->
            <div class="mt-3 table-responsive" style="text-align: center">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="min-width: 40px">No</th>
                            <th style="min-width: 100px">Nama Perusahaan</th>
                            <th style="min-width: 100px">Nama Produk</th>
                            <th style="min-width: 100px">Kategori</th>
                            <th style="min-width: 100px">Tanggal</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->vendor }}</td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->category_name }}</td>
                                <td>{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('barangDetail', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-info-circle"></i> Detail
                                    </a>
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
