<?php

namespace App\Livewire\Pkl;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $siswa_id, $guru_id, $industri_id, $mulai, $selesai;

    //menyimpan  nama siswa yg sedang login
    public $nama_siswa;

    //otomatis dijalankan saat komponen livewire dibuat, mount ini yg pertama
    public function mount(){

        //mengambil email user yg sedang login, mengambil datanya dari tabel user
        //sistem auth laravel secara default menggunakan model App\Models\User yg terkait langsung dengan tabel users
        $userEmail = Auth::user()->email;

        //cari data siswa berdasarkan email
        //Siswa::where('email', $userEmail) logikanya -> pada model Siswa, pada database siswas, cari email berdasarkan $userEmail (mengambil email user yg sedang login)
        //nilainya disimpan di $siswa
        $siswa = Siswa::where('email', $userEmail)->first();

        //logika kalau email cocok di $siswa 
        if ($siswa) {
            //alias-> simpan ID siswa ($siswa->id) ke $siswa_id (dipakai utnuk input form tersembunyi) 
            $this->siswa_id = $siswa->id;
            //simpan nama ($siswa->nama) ke $nama_siswa (dipakai untuk ditampilkan)
            $this->nama_siswa = $siswa->nama;
        }
    }


     public function render()
    {
        $pkls = Pkl::all();
        // $siswas = Siswa::all(); // 
        $gurus = Guru::all();
        $industris = Industri::all();

        return view('livewire.pkl.create', [  //  view ini yang dipakai
            'pkls' => $pkls,
            // 'siswas' => $siswas, //dikomen karena skrg ingin menampilkan satu nama berdasarkan login
            'gurus' => $gurus,
            'industris' => $industris,
        ]);
    }

    // fungsi yang akan dipanggil ketika user menekan button Tambahkan, kan di button view ada wire:click="create", nah itu ini
    public function create()
    {
        $this->validate([ // ini semua validasi input
            // nah, nama validasi ini juga disesuaikan dari wire:model di blade
            'siswa_id' => 'required|exists:siswas,id',
            // 'siswa_id' => Nama field/input yang sedang divalidasi
            // exists:gurus,id (format: exists:table,column)
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai', // Tanggal selesai harus setelah atau sama dengan tanggal mulai
        ]);

        // mulai transaksi database – supaya semua query berikutnya dijalankan bersama, dan bisa di-rollback kalau terjadi error
        DB::beginTransaction();

        try {
            // ambil data siswa berdasarkan siswa_id. Jika tidak ditemukan, akan otomatis gagal (404)
            $siswa = Siswa::findOrFail($this->siswa_id);

            // cek apakah siswa sudah pernah melaporkan PKL sebelumnya (status_lapor_pkl == 1)
            if ($siswa->status_lapor_pkl) {
                DB::rollBack(); // jika ada, data akan di rollback (membatalkan semua perubahan database) dengan memunculkan pesan di bawah ini (harus dipanggil dulu)
                // ini kan tadi udah dilakukan DB::beginTransaction(); maka rollBack() ini akan mengembalikan database ke kondisi sebelum transaksi dimulai
                session()->flash('error', 'Transaksi dibatalkan: Siswa sudah memiliki data PKL.'); // nah ini pesan error nya
                return redirect('/dataPkl'); // mengarahkan user kembali ke /dataPkl
            }

            // Lanjutkan insert data PKL di sini...
            // Contoh:
            Pkl::create([
                'siswa_id' => $this->siswa_id,
                'guru_id' => $this->guru_id,
                'industri_id' => $this->industri_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            // jika semuanya sukses, commit transaksi
            DB::commit();
            session()->flash('success', 'Data PKL berhasil ditambahkan.');
            return redirect('/dataPkl');
        } 
        
            catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect('/dataPkl');
            }
    }

}
