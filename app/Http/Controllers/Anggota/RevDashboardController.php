<?php

namespace App\Http\Controllers\Anggota;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SuratModel;
use App\Models\UserModel;

class RevDashboardController extends Controller
{
    private $title = 'Halaman Dashboard Anggota';
    private $views = 'Anggota/Dashboard'; 
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
       $users = UserModel::get();
    }
   public function index()
   {
       $suratAjukan = SuratModel::where('id_users',session()->get('id'))->where('status_sekre',0)->where('status_ketua',0)->count();
       $surattolaksekre = SuratModel::where('id_users', session()->get('id'))->where('status_sekre', '2')->count();

       $data = [
           'surattolaksekre' => $surattolaksekre,
           'title' => $this->title,
           'page'  => 'data oll'
       ];

       return view("$this->views"."/index",$data);
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
