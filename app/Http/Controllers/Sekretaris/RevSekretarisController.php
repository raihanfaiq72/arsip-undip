<?php

namespace App\Http\Controllers\Sekretaris;
use App\Http\Controllers\Controller;

use App\Models\SuratModel;
use App\Models\UserModel;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use str;
use file;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RevSekretarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $url   = 'sekretaris/rev-dashboard';
     private $view  = 'Sekretaris/Dashboard';
     private $title = 'Halaman Dashboard Sekretaris';

     public function index()
     {
        $data = [
            'title' => $this->title,
            'url'   => $this->url,
            'page'  => 'tampilan Halaman',
            'footer'    => "anjay"
        ];
        return view("$this->view".'/index', $data);
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
