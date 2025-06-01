<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Guru;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $selected_gender = [];
    public $selected_abjad = null;

    // Reset pagination ketika filter berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedGender()
    {
        $this->resetPage();
    }

    public function updatingSelectedAbjad()
    {
        $this->resetPage();
    }

    // Cek apakah ada filter/sort aktif
    public function hasFilter()
    {
        return !empty($this->search) || !empty($this->selected_gender) || !empty($this->selected_abjad);
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->selected_gender = [];
        $this->selected_abjad = null;
        $this->resetPage();
    }

    public function render()
    {
        $genders = [
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        ];

        $query = Guru::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('nip', 'like', '%' . $this->search . '%')
                  ->orWhere('alamat', 'like', '%' . $this->search . '%')
                  ->orWhere('kontak', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->selected_gender)) {
            $query->whereIn('gender', $this->selected_gender);
        }

        if ($this->selected_abjad === 'Abjad:A - Z') {
            $query->orderBy('nama', 'asc');
        } elseif ($this->selected_abjad === 'Abjad:Z - A') {
            $query->orderBy('nama', 'desc');
        }

        $gurus = $query->paginate(3);

        return view('livewire.guru.index', [
            'gurus' => $gurus,
            'genders' => $genders,
        ]);
    }
}
