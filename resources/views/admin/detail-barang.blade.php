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
                                <th style="width: 220px; vertical-align: top">Progress</th>
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
                            @foreach ($product as $item)
                                <tr>
                                    <th>Nama Perusahaan</th>
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
                                <th style="vertical-align: top">Gambar</th>
                                <td style="align-items: center">
                                    <div class="d-flex">
                                        @foreach ($productPicture as $item)
                                            <img src="{{ asset('images/' . $item->link) }}" class="rounded"
                                                style="width: 350px">
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            @foreach ($product as $item)
                                <tr class="hide-target @if ($item->notes == null) d-none @endif">
                                    <th style="vertical-align: top">Notes</th>
                                    <td style="align-items: center"> 
                                        <div class="input-group">
                                            <label for="notes"></label>
                                            <textarea class="form-control" id="notes" name="notes" aria-label="With textarea" 
                                            placeholder="Masukkan catatan..."  value="{{ old('notes') }}" rows="5" >{{ $item->notes }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script>
        const hideTargetElement = document.querySelector('.hide-target');
        const inputState = document.getElementById('progres');

        document.addEventListener('DOMContentLoaded', function() {
            inputState.addEventListener('change', function() {
                const selectedValue = this.value;
                console.log('Selected value:', selectedValue);

                if (selectedValue === '3' || selectedValue === '5' || selectedValue === '6') {
                    hideTargetElement.classList.remove('d-none');
                } else {
                    hideTargetElement.classList.add('d-none');
                }
            });
        });
    </script>
</x-app-layout>
