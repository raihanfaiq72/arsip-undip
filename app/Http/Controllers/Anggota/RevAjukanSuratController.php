<?php

namespace App\Http\Controllers\Anggota;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\SuratModel;

class RevAjukanSuratController extends Controller
{
    private $title = 'Halaman Dashboard Ajukan Surat';
    private $views = 'Anggota/AjukanSurat'; 
    private $url = 'anggota/rev-ajukan-surat';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat = SuratModel::where('id_users',session()->get('id'))->orderBy('id','desc')->get();
        $data = [
            'title' => $this->title,
            'page'  => 'index all',
            'surat' => $surat
        ];

        return view("$this->views"."/index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => $this->title,
            'page'  => 'Ajukan Surat',
            'url'   => $this->url
        ];

        return view("$this->views"."/create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis'     => 'required|string',
            'lampiran'  => 'required|file|mimes:pdf,doc,docx',
        ]);
    
        $fileExtension = $request->file('lampiran')->extension();
        $allowedImageExtensions = ['jpeg', 'jpg', 'png'];
    
        // Handle image upload
        $fileName = null;
        if ($request->hasFile('photo') && in_array($fileExtension, $allowedImageExtensions)) {
            $file = $request->file('photo');
            $fileName = Str::uuid() . "-" . time() . "." . $file->extension();
            $file->move("Assets/Admin/Upload", $fileName);
        }
    
        // Handle document upload
        $documentFileName = null;
        if ($request->hasFile('lampiran')) {
            $documentFile = $request->file('lampiran');
            $documentFileName = Str::uuid() . "-" . time() . "." . $documentFile->extension();
            $documentFile->move("Assets/Admin/Upload", $documentFileName);
        }
    
        $data = [
            'id_users'      => session()->get('id'),
            'lampiran'      => $documentFileName,
            'jenis'         => $request->jenis,
            'status_sekre'  => 0,
            'status_ketua'  => 3,
            'catatan'       => 'belum ada catatan'
        ];
    
        SuratModel::create($data);
    
        return redirect("$this->url")->with('sukses', 'Lampiran berhasil ditambahkan');
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
            'page'  => 'Edit Lampiran',
            'surat' => $surat
        ];

        return view("$this->views"."/edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis'     => 'required|string',
            'lampiran'  => 'required|file|mimes:pdf,doc,docx',
        ]);
    
        $fileExtension = $request->file('lampiran')->extension();
        $allowedImageExtensions = ['jpeg', 'jpg', 'png'];
    
        // Handle document upload
        if(isset($request->lampiran)){
            $documentFileName = null;
                if ($request->hasFile('lampiran')) {
                    $documentFile = $request->file('lampiran');
                    $documentFileName = Str::uuid() . "-" . time() . "." . $documentFile->extension();
                    $documentFile->move("Assets/Admin/Upload", $documentFileName);
            }
            $data = [
                'id_users'      => session()->get('id'),
                'lampiran'      => $documentFileName,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => $request->status_ketua
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect('anggota/rev-ajukan-surat')->with('sukses', 'Lampiran berhasil diedit');
        }else{
            $data = [
                'id_users'      => session()->get('id'),
                // 'lampiran'      => $documentFileName,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => $request->status_ketua
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect('anggota/rev-ajukan-surat')->with('sukses', 'Lampiran berhasil diedit');
        }
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
