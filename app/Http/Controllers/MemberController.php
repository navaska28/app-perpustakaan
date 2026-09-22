<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Siti Aminah',
            'nim' => '2310501001',
            'email' => 'siti.aminah@pens.ac.id',
            'nomor_telepon' => '081234567890',
            'status' => 'aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Budi Santoso',
            'nim' => '2310501002',
            'email' => 'budi.santoso@pens.ac.id',
            'nomor_telepon' => '081298765432',
            'status' => 'aktif',
        ],
        [
            'id' => 3,
            'nama' => 'Dewi Lestari',
            'nim' => '2310501003',
            'email' => 'dewi.lestari@pens.ac.id',
            'nomor_telepon' => '081211122233',
            'status' => 'nonaktif',
        ],
    ];

    /**
     * Menampilkan daftar anggota.
     */
    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    /**
     * Menampilkan form tambah anggota.
     * Belum digunakan pada Pertemuan 4.
     */
    public function create()
    {
        //
    }

    /**
     * Menyimpan anggota baru.
     * Belum digunakan pada Pertemuan 4.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan detail anggota.
     * Belum digunakan pada Pertemuan 4.
     */
    public function show(string $member)
    {
        //
    }

    /**
     * Menampilkan form edit anggota.
     * Belum digunakan pada Pertemuan 4.
     */
    public function edit(string $member)
    {
        //
    }

    /**
     * Memperbarui data anggota.
     * Belum digunakan pada Pertemuan 4.
     */
    public function update(Request $request, string $member)
    {
        //
    }

    /**
     * Menghapus anggota.
     * Belum digunakan pada Pertemuan 4.
     */
    public function destroy(string $member)
    {
        //
    }
}