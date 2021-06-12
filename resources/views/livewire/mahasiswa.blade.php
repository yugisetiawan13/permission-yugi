<div>
    
    @include('livewire.create')
    @include('livewire.edit')
    @include('livewire.show')

    <section>
        
        <div class="flex">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success" id="success">{{ session('message') }}</div>
                    @endif
                <div class="card">
                    <div class="card-header">
                        <h3> BELAJAR LIVEWIRE
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addModalMahasiswa">New Data</button>
                            <button class="btn btn-primary" type="button" wire:click="$refresh">Reload</button>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                         
                          <thead>
                              <tr>
                                  <th>FirstName</th>
                                  <th>Lastname</th>
                                  <th>Prodi</th>
                                  <th>Waktu</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($siswa as $s)
                              <tr>
                                  <td>{{ $s->firstname }}</td>
                                  <td>{{ $s->lastname }}</td>
                                  <td>{{ $s->prodi }}</td>
                                  <td>{{ $s->created_at->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModalMahasiswa" wire:click.prevent="edit({{ $s->id }})">Edit</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#showModalMahasiswa" wire:click.prevent="show({{ $s->id }})">Show</button>
                                    <button type="button" class="btn btn-danger btn-sm" wire:click.prevent="delete({{ $s->id }})">Delete</button>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                        
                    </div>
                    {{ $siswa->links() }}
                </div>
                
            </div>
           </div>
        </div>

        
    </section>
  </div>
  