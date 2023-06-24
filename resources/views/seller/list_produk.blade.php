<x-app-layout>
    <div class="p-3">
        <form class="d-flex" role="search">
            <input class="form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
            <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
            <div class="m-2"></div>
            <a href="ms-5" class="btn btn-outline-danger">
                <i class="fa fa-shopping-cart"></i>
            </a>
        </form>
    </div>

    @if ($message = Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif 
        
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="d-flex flex-row-reverse">
                {{-- tambah produk --}}
                <div class="ms-3">
                    <button class="btn btn-primary">Tambah Produk</button>
                </div>

                {{-- type produk --}}
                <div class="dropdown ms-3">
                    <button class="btn text-black btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown button
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                {{-- search --}}
                <form class="d-flex" role="search">
                    <input class="py-0 form-control rounded-start-pill border-end-0" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn pe-4 btn-outline-success rounded-end-pill border-start-0" type="submit"><i class="fa fa-search"></i></button>
                </form>
                
            </div>
            
            <!-- tabel -->
            <div class="mt-3 table-responsive">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            {{-- <th style="min-width: 40px">No</th> --}}
                            <th style="min-width: 100px" class="text-center">Gambar</th>
                            <th style="min-width: 100px" class="text-center">Nama</th>
                            <th style="min-width: 100px" class="text-center">Harga</th>
                            <th style="min-width: 100px" class="text-center">HPP</th>
                            <th style="min-width: 100px" class="text-center">Stock</th>
                            <th style="min-width: 100px" class="text-center">Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i=0; $i<10; $i++)
                        <tr>
                            <td class="d-flex justify-content-center p-0"><img width="200px" src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg" alt=""></td>
                            <td>Produk 1</td>
                            <td>10000</td>
                            <td>10000</td>
                            <td>90</td>
                            <td>100</td>
                        </tr>
                        @endfor

                        {{-- @if($product == null) --}}
                        <tr class="text-center">
                            <td colspan="10">Data Penduduk Tidak Ditemukan</td>
                        </tr>
                        {{-- @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>