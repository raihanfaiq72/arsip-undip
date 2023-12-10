<?php

namespace App\Http\Controllers\Sekretaris;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SuratModel;

class AjukanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $title  = 'Halaman Surat Masuk';
    private $view   = 'Sekretaris/Surat Masuk';
    private $url    = 'sekretaris/surat-masuk';
    public function index()
    {
        $surat = SuratModel::where('status_sekre',0)->where('status_ketua',3)->get();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Data surat masuk',
            'surat' => $surat
        ];

        return view("$this->view"."/index",$data);
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
        $surat = SuratModel::where('id',$id)->first();

        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Edit surat masuk',
            'surat' => $surat
        ];

        return view("$this->view"."/edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'jenis'     => 'required|string',
        //     'lampiran'  => 'required|file|mimes:pdf,doc,docx',
        // ]);
            $data = [
                'id_users'      => session()->get('id'),
                'lampiran'      => $request->lampiran,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => $request->status_ketua
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect('sekretaris/surat-masuk')->with('sukses', 'Lampiran berhasil diedit'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
