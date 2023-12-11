<?php

namespace App\Http\Controllers;
use App\Http\Controller\controllers;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    private $url = '/';
    private $title ='halaman landing'; 
    // private $views = 'Landing'
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =[
            'title'     => $this->title,
            'page'      => 'Arsip Surat Himpunan Mahasiswa',
            'footer'    => 'Arsip Surat - Pemerintah Provinsi Jawa Tengah',
        ];

        return view("/index",$data);
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
