<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // mendeklarasikan roperti publik
    public $search = ''; // ini untuk pencarian

    // Reset ke halaman 1 saat search berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $industris = Industri::query()
            ->when($this->search, function ($query) {
                $query->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                      ->orWhere('website', 'like', '%' . $this->search . '%')
                      ->orWhere('alamat', 'like', '%' . $this->search . '%')
                      ->orWhere('kontak', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(6);

        return view('livewire.industri.index', [
            'industris' => $industris,
        ]);
    }
}