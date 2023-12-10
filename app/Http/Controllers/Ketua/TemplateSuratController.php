<?php

namespace App\Http\Controllers\Ketua;

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

class TemplateSuratController extends Controller
{
    private $url = 'ketua/template-surat';
    private $views = 'Ketua/TemplateSurat';
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
}
