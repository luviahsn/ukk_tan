<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $selected_gender = [];
    public $selected_rombel = [];
    public $selected_abjad = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedGender()
    {
        $this->resetPage();
    }

    public function updatingSelectedRombel()
    {
        $this->resetPage();
    }

    public function updatingSelectedAbjad()
    {
        $this->resetPage();
    }

    public function hasFilter()
    {
        return !empty($this->search)
            || !empty($this->selected_gender)
            || !empty($this->selected_rombel)
            || !empty($this->selected_abjad);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selected_gender = [];
        $this->selected_rombel = [];
        $this->selected_abjad = null;
        $this->resetPage();
    }

    public function render()
    {
        $genders = [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        ];

        $rombels = [
            'SIJA A' => 'SIJA A',
            'SIJA B' => 'SIJA B',
        ];

        $query = Siswa::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nis', 'like', '%' . $this->search . '%')
                  ->orWhere('alamat', 'like', '%' . $this->search . '%')
                  ->orWhere('kontak', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->selected_gender)) {
            $query->whereIn('gender', $this->selected_gender);
        }

        if (!empty($this->selected_rombel)) {
            $query->whereIn('rombel', $this->selected_rombel);
        }

        if ($this->selected_abjad === 'Abjad:A - Z') {
            $query->orderBy('nama', 'asc');
        } elseif ($this->selected_abjad === 'Abjad:Z - A') {
            $query->orderBy('nama', 'desc');
        }

        $siswas = $query->paginate(5);

        return view('livewire.siswa.index', [
            'siswas' => $siswas,
            'genders' => $genders,
            'rombels' => $rombels,
        ]);
    }
}
