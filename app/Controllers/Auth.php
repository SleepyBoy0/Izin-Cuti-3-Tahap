<?php

namespace App\Controllers;
use App\Models\ModelAuth;
class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }
    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function register()
    {
        $data = array(
            'title' => 'Register',
        );
        return view('v_register', $data);
    }
    public function save_register()
    {
        if ($this->validate([
                'user_number'=>[
                    'label' => 'User Number',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Must Fill'
                    ]
                    ],
                    'name'=>[
                        'label' => 'Name',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Fill'
                        ]
                        ],
                        'phone_number'=>[
                            'label' => 'Phone Number',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ],
                        'email'=>[
                            'label' => 'E-Mail',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ],
                            'password'=>[
                                'label' => 'Password',
                                'rules' => 'required',
                                'errors' => [
                                    'required' => '{field} Must Filled',
                                ]
                                ],
                                    'username'=>[
                                        'label' => 'Username',
                                        'rules' => 'required',
                                        'errors' => [
                                            'required' => '{field} Must Filled'
                                        ]
                                        ],
                                        'sex'=>[
                                            'label' => 'Sex',
                                            'rules' => 'required',
                                            'errors' => [
                                                'required' => '{field} Must Filled'
                                            ]
                                            ]
                                
        ])) {
            //jika valid
            $data = array(
                'position_id'=> 1,
                'user_number'=> $this->request->getPost('user_number'),
                'name'=> $this->request->getPost('name'),
                'phone_number'=> $this->request->getPost('phone_number'),
                'email'=> $this->request->getPost('email'),
                'password'=> $this->request->getPost('password'),
                'username'=> $this->request->getPost('username'),
                'sex'=> $this->request->getPost('sex'),
            );
            $this->ModelAuth->save_register($data);
            session()->setFlashdata('success','Register Berhasil');
            return redirect()->to(site_url('Auth/login'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('Auth/register'));
        }
    }
    public function save_data_pegawai()
    {
        if ($this->validate([
                'user_number'=>[
                    'label' => 'User Number',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Must Fill'
                    ]
                    ],
                    'name'=>[
                        'label' => 'Name',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Fill'
                        ]
                        ],
                        'phone_number'=>[
                            'label' => 'Phone Number',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ],
                        'email'=>[
                            'label' => 'E-Mail',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ],
                            'password'=>[
                                'label' => 'Password',
                                'rules' => 'required',
                                'errors' => [
                                    'required' => '{field} Must Filled',
                                ]
                                ],
                                    'username'=>[
                                        'label' => 'Username',
                                        'rules' => 'required',
                                        'errors' => [
                                            'required' => '{field} Must Filled'
                                        ]
                                        ],
                                        'sex'=>[
                                            'label' => 'Sex',
                                            'rules' => 'required',
                                            'errors' => [
                                                'required' => '{field} Must Filled'
                                            ]
                                            ]
                                
        ])) {
            //jika valid
            $data = array(
                'position_id'=> 1,
                'user_number'=> $this->request->getPost('user_number'),
                'name'=> $this->request->getPost('name'),
                'phone_number'=> $this->request->getPost('phone_number'),
                'email'=> $this->request->getPost('email'),
                'password'=> $this->request->getPost('password'),
                'username'=> $this->request->getPost('username'),
                'sex'=> $this->request->getPost('sex'),
            );
            $this->ModelAuth->save_register($data);
            session()->setFlashdata('success','Register Berhasil');
            return redirect()->to(site_url('Admin/data_pegawai'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('Admin/data_pegawai'));
        }
    }
    public function cek_login()
    {
        if ($this->validate([
            'username'=>[
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Must Filled'
                ]
                ],
                'password'=>[
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Must Filled'
                ]
                ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->login( $username, $password);
            if ($cek) {
                //jika datanya cocok
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('position_id', $cek['position_id']);
                session()->set('name', $cek['name']);
                session()->set('user_number', $cek['user_number']);
                session()->set('phone_number', $cek['phone_number']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('username', $cek['username']);
                session()->set('sex', $cek['sex']);
                session()->setFlashdata('success', 'Login Success! Welcome To HRMS Web Based App!');
                //login
                return redirect()->to(site_url('home'));
            } else {
                //jika datanya tidak cocok
                session()->setFlashdata('errors', 'Login Failed! Check Username And your Password');
                return redirect()->to(site_url('Auth/login'));
            }
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('Auth/Login'));
        }
    }

    public function logout()
    {
        session()->remove('id');
        session()->remove('position_id');
        session()->remove('name');
        session()->remove('username');
        session()->remove('user_number');
        session()->remove('phone_number');
        session()->remove('email');
        session()->remove('password');
        session()->remove('sex');
        session()->setFlashdata('success', 'Log Out Success!');
        return redirect()->to(site_url('Auth/login'));
    }
}