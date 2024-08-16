<div>
    
        <div class="container">
            <div class="row my-2">
                <div class="col-12">
                    <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu== 'lihat' ? 'btn-primary' : 'btn-outline-primary'}}">
                        Semua Pengguna
                    </button>
                    <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu== 'tambah' ? 'btn-primary' : 'btn-outline-primary'}}">
                        Tambah Pengguna
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
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Peran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($semuaPengguna as $pengguna)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengguna->name }}</td>
                                                <td>{{ $pengguna->email }}</td>
                                                <td>{{ $pengguna->peran }}</td>
                                                <td>
                                                    <button wire:click="pilihMenu('edit', {{ $pengguna->id }})" class="btn {{ $pilihanMenu == 'edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                        Edit Pengguna
                                                    </button>
                                                    <button wire:click="pilihMenu('hapus', {{ $pengguna->id }})" class="btn {{ $pilihanMenu == 'hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                        Hapus Pengguna
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
                                Tambah Pengguna
                            </div>
                            <div class="card-body">
                                <form wire:submit='simpan'>
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" class="form-control" wire:model='nama'>
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </br>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" wire:model='email'>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </br>
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" wire:model='password'>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </br>
                                    <label for="peran">Peran</label>
                                    <select id="peran" class="form-control" wire:model="peran">
                                        <option value="">Pilih Peran</option>
                                        <option value="kasir">Kasir</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('peran')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </br>
                                    <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                                </form>
                                
                            </div>
                        </div>           
                    </div> 
                    @elseif  ($pilihanMenu == 'edit')
                    <div class="card">
                        
                        <div class="card-border-primary">
                            <div class="card-header">
                                Edit Pengguna
                            </div>
                            <div class="card-body">
                                test
                            </div>
                        </div>           
                    </div>   
                    @elseif  ($pilihanMenu == 'hapus') 
                    <div class="card">

                        <div class="card-border-primary">
                            <div class="card-header">
                                Hapus Pengguna
                            </div>
                            <div class="card-body">
                                test
                            </div>
                        </div> 
                    </div>
                    @endif    
                </div>
            </div>
                    
        </div>

</div>
