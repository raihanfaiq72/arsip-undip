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
use App\Models\UserModel;

class AjukanSuratController extends Controller
{
    private $url = 'anggota/ajukan-surat';
    private $views = 'Anggota/AjukanSurat';
    private $title = 'pengajuan surat';
    /**
     * untuk index ini larinya ke ajukan surat , males buat controller baru
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
        'status_ketua'  => 3
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
                'status_ketua'  => 3
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect('anggota/ajukan-surat')->with('sukses', 'Lampiran berhasil diedit');
        }else{
            $data = [
                'id_users'      => session()->get('id'),
                // 'lampiran'      => $documentFileName,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => 3
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect('anggota/ajukan-surat')->with('sukses', 'Lampiran berhasil diedit');
        }
    
        
    }

    public function download($id)
    {
        $template = SuratModel::find($id); 
        if (!$template) {
            abort(404); 
        }

        $filePath = public_path('Assets/Admin/Upload/' . $template->lampiran);
        // $filePath = "/path/to/your/file"; // Replace this with the actual path to your file
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        // @if(pathinfo($p['lampiran'], PATHINFO_EXTENSION) === 'pdf')
        if (file_exists($filePath) && ($fileExtension === 'pdf' || $fileExtension === 'docx')) {
            if ($fileExtension === 'pdf') {
                return response()->download($filePath, $template->jenis . '.pdf');
            } elseif ($fileExtension === 'docx') {
                return response()->download($filePath, $template->jenis.'.docx');
            }
        } else {
            abort(404, 'File not found')->with('gagal','format tidak support');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
{
    $template = SuratModel::findOrFail($id);

    $filePath = public_path('Upload/Produk/' . $template->gambar);
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $template->delete();

    return redirect()->route('anggota.ajukan-surat.index')->with('sukses', 'Data berhasil dihapus');
}
}
