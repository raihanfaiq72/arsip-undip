<?php

namespace App\Http\Controllers\Ketua;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\SuratModel;
// use str;

class AjukanSuratTolakController extends Controller
{
    private $title  ='halaman Surat Masuk';
    private $views  = 'Ketua/AjukanSurat';
    private $url    = 'ketua/ajukan-surat/tolak';
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $surat = SuratModel::where('id',$id)->first();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Edit Data surat masuk',
            'surat' => $surat
        ];

        return view("$this->views"."/tolak",$data);
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
        $request->validate([
            'jenis' => 'required|string',
            'lampiran'  => 'required|file|mimes:jpg,doc,docx',
        ]);

        $fileExtension = $request->file('lampiran')->extension();
        $allowedImageExtensions = ['jpeg', 'jpg', 'png'];

        //handle document upload
        if($request->hashfile('lampiran')){
            $documentFile = $request->file('lampiran');
            $documentFileName = Str::uuid() . "-" . time() . "." . $documentFile->extension();
            $documentFile->move("Assets/Admin/Upload", $documentFileName);
        }
         $data = [
            'id_users'      => $request->id_users,
            'lampiran'      => $documentFileName,
            'jenis'         => $request->jenis,
            'status_sekre'  => 0,
            'status_ketua'  => 4
         ];
         SuratModel::crete($data);

         return redirect("$this->url")->with('sukses', 'Lampiran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat = SuratModel::where('id',$id)->first();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Show Data surat masuk',
            'surat' => $surat
        ];

        return view("$this->views"."/show",$data);

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
            'page'  => 'Edit Data surat masuk',
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
            // 'jenis'     => 'required|string',
            // 'lampiran'  => 'required|file|mimes:pdf,doc,docx',
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
                'id_users'      => $request->id_users,
                'lampiran'      => $request->lampiran,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => 5,
                'catatan'       => $request->catatan
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect("$this->url")->with('sukses', 'Lampiran berhasil diedit');
        }else{
            $data = [
                'id_users'      => $request->id_users,
                'lampiran'      => $request->lampiran,
                'jenis'         => $request->jenis,
                'status_sekre'  => $request->status_sekre,
                'status_ketua'  => 5,
                'catatan'       => $request->catatan
            ];
        
            SuratModel::where('id', $request->id)->update($data);
        
            return redirect("$this->url")->with('sukses', 'Lampiran berhasil diedit');
        }
    
        
    }

    public function tolak($id)
    {
        $surat = SuratModel::where('id',$id)->first();
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'Edit Data surat masuk',
            'surat' => $surat
        ];

        return view("$this->views"."/tolak",$data);
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
    public function destroy(string $id)
    {
        //
    }
}
