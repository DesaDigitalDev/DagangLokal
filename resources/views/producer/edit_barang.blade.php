<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot> --}}
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ route('barang.update', $product->id) }}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">User</label>
                <input type="text" id="user" value="1" name="user"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">Gudang</label>
                <input type="text" id="gudang" value="0" name="gudang"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4" hidden>
                <label for="inputnamaproduk" class="form-label">Stock</label>
                <input type="text" id="stock" value="0" name="stock"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama perusahaan</label>
                <input type="text" id="vendor" value="{{ $product->vendor }}" name="vendor"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4 hidden">
                <label for="inputnamaproduk" class="form-label">Progress</label>
                <input type="text" id="vendor" value="1" name="progress_id"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputState" class="form-label">Kategori</label>
                <select class="custom-select" id="category" name="category">
                    <option>Pilih...</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">HPP (Harga Per Produk)</label>
                <input type="text" id="price" name="price" value="{{ $product->unit_price }}"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">BPOM No. (Optional)</label>
                <input type="text" id="bpom" name="bpom" value="{{ $product->bpom_no }}"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Berat Produk</label>
                <input type="text" id="weight" name="weight" value="{{ $product->unit_weight }}"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-12">
                <label for="inputdeskripsiproduk" class="form-label">Deskripsi Produk (Manfaat,Keunggulan produk,
                    dll)</label>
                <textarea type="text" id="desc" name="desc" class="form-control shadow bg-white rounded">{{ $product->description }}</textarea>
            </div>
            <div class="col-12">
                <x-primary-button type="submit" class="ml-4">
                    {{ __('Simpan Data') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
