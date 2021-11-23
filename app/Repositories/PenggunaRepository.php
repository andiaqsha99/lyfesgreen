<?php
namespace App\Repositories;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaRepository {
    public function getAllPengguna() {
        return Pengguna::all();
    }

    public function getPenggunaById($id) {
        return Pengguna::find($id);
    }

    public function createPengguna($data) {
        return Pengguna::create([
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tanggal_lahir' => $data->tanggal_lahir,
            'telepon' => $data->telepon,
            'email' => $data->email,
            'password' => Hash::make($data->password)
        ]);
    }

    public function updatePengguna($data) {
        return Pengguna::find($data->id)->update([
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tanggal_lahir' => $data->tanggal_lahir,
            'telepon' => $data->telepon,
            'email' => $data->email,
            'password' => $data->password
        ]);
    }

    public function deleteUser($id) {
        return Pengguna::find($id)->delete();
    }

    public function getPenggunaByEmail($data) {
        return Pengguna::where('email', $data->email)->first();
    }
}
