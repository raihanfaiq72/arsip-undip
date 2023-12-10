<?php

namespace App\Http\Controllers\Ketua;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SuratModel;
use App\Models\UserModel;

class SuratAllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $title ='halaman landing';
    private $views = 'Ketua/SuratAll';
    private $url = 'ketua/surat-all';

    public function index()
    {
        // anak bvabi
        $surat = SuratModel::get();
       $data = [
        'surat' => $surat,
        'title' => $this -> title,
        'page'  => 'surat all'
       ];
       return view("$this->views"."/index", $data);
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
