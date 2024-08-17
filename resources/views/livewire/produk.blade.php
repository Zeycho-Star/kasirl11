<div>
    
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu== 'lihat' ? 'btn-primary' : 'btn-outline-primary'}}">
                    Semua Produk
                </button>
                <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu== 'tambah' ? 'btn-primary' : 'btn-outline-primary'}}">
                    Tambah Produk
                </button>
                <button wire:loading class="btn btn-info">
                    Loading
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if($pilihanMenu == 'lihat')
                <div class="card">
                    <div class="card-border-primary">
                        <div class="card-header">
                            header
                        </div>  
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>harga</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>{{ $produk->harga }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>
                                                <button wire:click="pilihEdit({{ $produk->id }})" class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Edit produk
                                                </button>
                                                <button wire:click="pilihHapus({{ $produk->id }})" class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                    Hapus produk
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                    </div>
                </div>
                @elseif  ($pilihanMenu == 'tambah')  
                <div class="card">
                    <div class="card-border-primary">
                        <div class="card-header">
                            Tambah Produk
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpan'>
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" wire:model='nama'>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </br>
                                <label for="kode">Kode / Barcode</label>
                                <input type="text" id="kode" class="form-control" wire:model='kode'>
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </br>
                                <label for="harga">Harga</label>
                                <input type="number" id="harga" class="form-control" wire:model='harga'>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </br>
                                <label for="stok">Stok</label>
                                <input type="number" id="harga" class="form-control" wire:model='stok'>
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </br>
                                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                                <button class="btn btn-secondary mt-3" wire:click='batal' type="button">Batal</button>
                            </form>
                            
                        </div>
                    </div>           
                </div> 
                @elseif  ($pilihanMenu == 'edit')
                <div class="card">
                    
                    <div class="card-border-primary">
                        <div class="card-header">
                            Edit Produk
                        </div>
                        <div class="card-body">
                            <form wire:submit='simpanEdit'>
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" wire:model='nama'>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </br>
                                <label for="kode">Kode / Barcode</label>
                                <input type="text" id="kode" class="form-control" wire:model='kode'>
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </br>
                                <label for="harga">Harga</label>
                                <input type="number" id="harga" class="form-control" wire:model='harga'>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </br>
                                <label for="stok">Stok</label>
                                <input type="number" id="harga" class="form-control" wire:model='stok'>
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </br>
                                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                                <button class="btn btn-secondary mt-3" wire:click='batal' type="button">Batal</button>
                            </form>
                        </div>
                    </div>           
                </div>   
                @elseif  ($pilihanMenu == 'hapus') 
                <div class="card">

                    <div class="card-border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus Produk
                        </div>
                        <div class="card-body">
                            Anda Yakin Ingin Menghapus Produk Ini?
                            <p>Nama : {{ $produkTerpilih->nama}} </p>
                            <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
                            <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                        </div>
                    </div> 
                </div>
                @endif    
            </div>
        </div>
                
    </div>

</div>
