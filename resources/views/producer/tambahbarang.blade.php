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
    <h1 class="container">Tambah Barang</h1>
    <div class="container card">
        <form class="row g-3 container">
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama perusahaan</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Kategori</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Harga Produk</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">BPOM No (Optional)</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12 mt-4">
                <label for="inputnamaproduk" class="form-label">Berat Produk</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-12">
                <label for="inputdeskripsiproduk" class="form-label">Deskripsi Produk (Manfaat,Keunggulan produk,
                    dll)</label>
                <textarea type="text" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Foto Produk</label>
                <input class="form-control" type="file" multiple>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Foto Resi (Sample minimal 2)</label>
                <input class="form-control" type="file" multiple>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>
