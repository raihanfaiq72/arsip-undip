<?php

namespace App\Http\Controllers\Ketua;
use App\Http\Controllers\Controller;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use App\Models\SuratModel;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $surat = SuratModel::findOrFail($id); 
        $pdfPath = storage_path('Assets/Admin/Upload/' . $surat->lampiran);

        if (!SuratModel::exists($pdfPath)) {
            abort(404);
        }

        $data = [
            'pdfPath' => $pdfPath,
            'surat' => $surat,// Jika perlu mengakses data surat di view

            'note'  => 'hahaha'
        ];

        // return view('pdf.preview', ['pdfPath' => $pdfPath]);
        // return view('Ketua/IniAnjeng/index', $data);
        return view('Ketua.IniAnjeng.index', $data);

        // dd($data);
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
        $surat = SuratModel::findOrFail($id); 
        $pdfPath = storage_path('Assets/Admin/Upload/' . $surat->lampiran);

        if (!SuratModel::exists($pdfPath)) {
            abort(404);
        }

        $data = [
            // 'pdfPath' => $pdfPath,
            // 'surat' => $surat,// Jika perlu mengakses data surat di view

            'note'  => 'hahaha'
        ];

        // return view('pdf.preview', ['pdfPath' => $pdfPath]);
        // return view('Ketua/IniAnjeng/index', $data);
        return view('Ketua.IniAnjeng.index', $data);
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
