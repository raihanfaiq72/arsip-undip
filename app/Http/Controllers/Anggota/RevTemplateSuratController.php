<?php

namespace App\Http\Controllers\anggota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
// model
use App\Models\TemplateSuratModel;

class RevTemplateSuratController extends Controller
{
    private $url = 'anggota/rev-template-surat';
    private $views = 'Anggota/TemplateSurat';
    private $title = 'Template surat all';
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $template = TemplateSuratModel::get();
        $data = [
            'title'     => $this->title,
            'page'      => 'Template surat All',
            'template'  => $template,
            'url'       => $this->url
        ];

        return view("$this->views"."/index",$data);
        // dd($template);
    }

    public function download($id)
    {
        $template = TemplateSuratModel::find($id); 
        if (!$template) {
            abort(404); 
        }

        $filePath = public_path('Assets/Admin/Upload/' . $template->lampiran);
        // $filePath = "/path/to/your/file"; // Replace this with the actual path to your file
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        // @if(pathinfo($p['lampiran'], PATHINFO_EXTENSION) === 'pdf')
        if (file_exists($filePath) && ($fileExtension === 'pdf' || $fileExtension === 'docx')) {
            if ($fileExtension === 'pdf') {
                return response()->download($filePath, $template->keterangan . '.pdf');
            } elseif ($fileExtension === 'docx') {
                return response()->download($filePath, $template->keterangan.'.docx');
            }
        } else {
            abort(404, 'File not found')->with('gagal','format tidak support');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title'     => $this->title,
            'page'      => 'Tambah template surat All',
            'url'       => $this->url
        ];

        return view("$this->views"."/create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan'     => 'required|string',
            'lampiran'       => 'required|file|mimes:pdf,doc,docx',
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
            'id_users'          => session()->get('id'),
            'lampiran'          => $documentFileName,
            'keterangan'        => $request->keterangan,
        ];
    
        TemplateSuratModel::create($data);
    
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
    public function destroy(string $id): RedirectResponse
{
    $template = TemplateSuratModel::findOrFail($id);

    $filePath = public_path('Upload/Produk/' . $template->gambar);
    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $template->delete();

    return redirect()->route('anggota.template-surat.index')->with('sukses', 'Data berhasil dihapus');
}
    
}
