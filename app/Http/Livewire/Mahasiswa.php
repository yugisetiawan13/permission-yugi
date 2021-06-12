<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Siswa;
use Livewire\WithPagination;

class Mahasiswa extends Component
{
        public $ids, $firstname, $lastname, $prodi;

        use WithPagination;
        public $search = '';

        protected $paginationTheme = 'bootstrap';

        public function render()
        { 
            $siswa = Siswa::where('firstname', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(5);
            return view('livewire.mahasiswa', compact('siswa'));
        }
        public function updatingSearch()
        {
            $this->resetPage();
        }
        public function resetInput()
        {
            $this->firstname = '';
            $this->lastname  = '';
            $this->prodi     = '';
        }

        public function store()
        {
            $validateData = $this->validate([
                'firstname' => 'required',
                'lastname'  => 'required',
                'prodi'     => 'required'
            ]);
            Siswa::create($validateData);
            session()->flash('message', 'Siswa Berhasil Disimpan!');
            $this->resetInput();
            $this->emit('mahasiswaAdd');
        }

        public function edit($id)
        {
            $siswa           = Siswa::where('id', $id)->first();
            $this->ids       = $siswa->id;
            $this->firstname = $siswa->firstname;
            $this->lastname  = $siswa->lastname;
            $this->prodi     = $siswa->prodi;
        }
        public function cancel()
        {
            $this->resetInput();
        }
        public function show()
        {
            $siswa           = Siswa::first();
            $this->firstname = $siswa->firstname;
            $this->lastname  = $siswa->lastname;
            $this->prodi     = $siswa->prodi;
        }

        public function update()
        {
            $this->validate([
                'firstname' => 'required',
                'lastname'  => 'required',
                'prodi'     => 'required'
            ]);
            if ($this->ids)
            {
                $siswa = Siswa::find($this->ids);
                $siswa->update([
                    'firstname' => $this->firstname,
                    'lastname'  => $this->lastname,
                    'prodi'     => $this->prodi
                ]);
                session()->flash('message', 'Berhasil Update Data');
                $this->resetInput();
                $this->emit('updateMahasiswa');
            }
        }
        public function delete($id)
        {
            if($id){
                Siswa::where('id', $id)->delete();
                session()->flash('message', 'Berhasil Hapus Data');
            }
        }
       
}
