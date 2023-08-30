<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Barang') }}
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
            <div class="mt-3 table-responsive" style="text-align: center">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <form class="row g-3 container" method="post"
                            action="{{ route('barangAdmin.update', $productprogress->id) }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <tr>
                                <th style="width: 220px">Progress</th>
                                <td><select id="progres" name="progres" style="width: 200px" class="custom-select">
                                        <option>Pilih...</option>
                                        @foreach ($progress as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $productprogress->progress_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-primary-button type="submit">
                                        {{ __('Simpan Data') }}
                                    </x-primary-button>
                                </td>
                            </tr>
                        </form>
                        @foreach ($product as $item)
                            <tr>
                                <th style="width: 220px">Nama Perusahaan</th>
                                <td>{{ $item->vendor }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $item->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $item->category_name }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>{{ $item->unit_price }}</td>
                            </tr>
                            <tr>
                                <th>Berat</th>
                                <td>{{ $item->unit_weight }}</td>
                            </tr>
                            <tr>
                                <th>No. P-IRT</th>
                                <td>{{ $item->no_pirt }}</td>
                            </tr>
                            <tr>
                                <th>No. Sertifikat Halal</th>
                                <td>{{ $item->no_sertifikat_halal }}</td>
                            </tr>
                            <tr>
                                <th>BPOM</th>
                                <td>{{ $item->bpom_no }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $item->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Gambar</th>
                            <td>
                                @foreach ($productPicture as $item)
                                    <img src="{{ asset('images/' . $item->link) }}" class="rounded"
                                        style="width: 550px">
                                @endforeach
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
