<?php

namespace App\Http\Controllers;

use App\Repositories\PenggunaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    protected PenggunaRepository $penggunaRepository;

    public function __construct(PenggunaRepository $penggunaRepository)
    {
        $this->penggunaRepository = $penggunaRepository;
    }

    public function getPenggunaById($id) {
        $pengguna = $this->penggunaRepository->getPenggunaById($id);

        if($pengguna) {
            unset($pengguna->password);
            return response()->json([
    			'success' => true,
    			'message' => 'Pengguna '. $id,
                'data' => $pengguna
    		], 200);
        } else {
            return response()->json([
    			'success' => false,
    			'message' => 'Pengguna '. $id. ' tidak ditemukan',
                'data' => []
    		], 200);
        }

    }

    public function registerPengguna(Request $request) {
        $pengguna = $this->penggunaRepository->createPengguna($request);

        if($pengguna) {
            return response()->json([
    			'success' => true,
    			'message' => 'Pengguna berhasil dibuat',
    		], 200);
        } else {
            return response()->json([
    			'success' => false,
    			'message' => 'Pengguna gagal dibuat',
    		], 200);
        }
    }

    public function loginPengguna(Request $request) {
        $response = array('success' => false, 'message' => '', 'data' => null);
        $pengguna = $this->penggunaRepository->getPenggunaByEmail($request);
        if($pengguna) {
            if(Hash::check($request->password, $pengguna->password)) {
                unset($pengguna->password);
                $response['message'] = 'Login berhasil';
                $response['success'] = true;
                $response['data'] = $pengguna;
            } else {
                $response['message'] = 'Password salah';
            }
        } else {
            $response['message'] = 'Pengguna tidak ditemukan';
        }

        return response()->json([
            'success' =>  $response['success'],
            'message' => $response['message'],
            'data' => $response['data']
        ], 200);
    }
}
