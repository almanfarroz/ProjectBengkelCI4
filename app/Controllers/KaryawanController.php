<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\UserModel;
use CodeIgniter\Commands\Utilities\Environment;

class KaryawanController extends BaseController
{
    // Models
    protected $userModel;


    //Property

    public function __construct()
    {
        //Initialize Models
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('pages/home');
    }

    public function list()
    {
        $per_page = 5;
        $karyawans = $this->userModel->paginate($per_page);
        $karyawans = $this->userModel->where('role_name', 2)->findAll();

        return view('pages/karyawan/karyawanList', [
            'karyawans' => $karyawans,
            'pager' => $this->userModel->pager,
            'per_page' => $per_page,
        ]);
    }
}
