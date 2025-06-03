<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pkl;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pkls = Pkl::with(['siswa', 'guru', 'industri'])
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('siswa', fn ($q) => $q->where('nama', 'like', "%{$this->search}%")->orWhere('nis', 'like', "%{$this->search}%"))
                      ->orWhereHas('guru', fn ($q) => $q->where('nama', 'like', "%{$this->search}%"))
                      ->orWhereHas('industri', fn ($q) => $q->where('nama', 'like', "%{$this->search}%")
                                                          ->orWhere('bidang_usaha', 'like', "%{$this->search}%"));
                });
            })
            ->paginate(1);

        return view('livewire.pkl.index', [
            'pkls' => $pkls,
            'siswas' => Siswa::all(),
            'gurus' => Guru::all(),
            'industris' => Industri::all(),
        ]);
    }
}
