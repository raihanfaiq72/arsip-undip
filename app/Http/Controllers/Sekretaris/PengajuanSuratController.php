<?php

namespace App\Http\Controllers\Sekretaris;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SuratModel;
use App\Models\UserModel;

class PengajuanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $title  = 'Halaman Pengajuan Surat';
    private $viwes  = 'Sekertaris/Ajukan Surat';
    private $url    = 'sekretaris/pengajuan-surat';
    public function index()
    {
        $surat = SuratModel::get();
        $data = [
            'surat' => $surat,
            'title' => $this -> title,
            'page'  => 'Pengajuan Surat'
        ];
        return view("$this->views". "/index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
