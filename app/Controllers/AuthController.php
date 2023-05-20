<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class AuthController extends BaseController
{
    protected $helpers = ['form'];

    public function signin()
    {
        return view('pages/auth/login');
    }

    public function loginAuth()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $user = $userModel->where('username', $data['username'])->first();


        if ($user) {
            $isPasswordCorrect = password_verify($data['password'] ?? '', $user['password']);

            if ($isPasswordCorrect) {
                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE
                ]);

                return redirect()->to(url_to('home'));
            }
            session()->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to(url_to('login'));
        }
        session()->setFlashdata('msg', 'Username is incorrect.');
        return redirect()->to(url_to('login'));
    }


    public function register()
    {
        return view('pages/auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'role_name' => 'required',
            'password' => 'required|min_length[6]',
            'passconf' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(url_to('register'))->withInput(validation_errors());
        } else {
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'role_name' => $this->request->getPost('role_name'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            $userModel->save($data);

            return redirect()->to(url_to('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(url_to('home'));
    }
}
