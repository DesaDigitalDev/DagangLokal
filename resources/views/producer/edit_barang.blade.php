<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Tambah Data Barang Produsen</title>
</head>

<body>
    <h1 class="container">Edit Barang</h1>
    <div class="container card shadow p-3 mb-5 bg-white rounded">
        <form class="row g-3 container" method="post" action="{{ url('producer/update-barang/' . $product->id) }}"
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
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}"
                    class="form-control shadow bg-white rounded">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Kategori</label>
                <select id="inputState" id="category" name="category" class="form-select shadow bg-white rounded">
                    <option>Pilih...</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Harga Produk</label>
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
                <button type="submit" class="btn btn-primary mb-3 shadow rounded">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>
