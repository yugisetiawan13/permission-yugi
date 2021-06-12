
<div class="modal fade" wire:ignore.self id="addModalMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Data</h5>
                <button type="button" wire:click.prevent="resetInput()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form>
                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control" wire:model="firstname" required name="firstname" />
                    @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control" wire:model="lastname" required name="lastname" />
                    @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <select name="prodi"  required wire:model="prodi" class="form-control" />
                        <option value="disabled">--Silahkan Pilih--</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                    </select>
                </div>
               </form>
            </div>
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="cancel()">Close</button>
               <button type="button" class="btn btn-primary" wire:click="store"  wire:loading.attr="disabled">Save</button>
               <div wire:loading wire:target="store">
                Proses Menyimpan Data...
            </div> 
            </div>
        </div>
    </div>
</div>