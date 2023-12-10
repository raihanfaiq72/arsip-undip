<?php

namespace App\Http\Controllers\Sekretaris;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use App\Models\SuratModel;
use App\Models\TemplateSuratModel;

class StatusSuratController extends Controller
{
    private $url = 'sekretaris/status-surat';
    private $views = 'Sekretaris/StatusSurat';
    private $title = 'Status Surat';
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $template = SuratModel::get();
        $data = [
            'title'     => $this->title,
            'page'      => 'Status Surat',
            'template'  => $template,
            'url'       => $this->url
        ];

        return view("$this->views"."/index",$data);
        // dd($template);
    }

    public function show($id)
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
        // return view('Sekretaris/IniAnjeng/index', $data);
        return view('Sekretaris.PDF.index', $data);

        // dd($data);
    }
}
