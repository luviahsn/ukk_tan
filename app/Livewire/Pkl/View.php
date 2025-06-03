<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl;

class View extends Component
{
    public $pkl; //menyimpan data pkl yg diambil dari database
    public $pklId; //menyimpan ID pkl yangg diterima dari URL

    //dijalankan otomatis saat komponen di-load, ini yang awal pertama
    public function mount($id){  //dikirim dr URL
        $this->pklId = $id;
        $this->pkl = Pkl::findOrFail($id); //mencari data pkl berdasarkan id dan jika tidak ditemukan maka laravel akan otomatis menampilkan error
    }


    public function render()
    {
        return view('livewire.pkl.view', [
            'pkl' => $this->pkl
        ]);
    }
}
