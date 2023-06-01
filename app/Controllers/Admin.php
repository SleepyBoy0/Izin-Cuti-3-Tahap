<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use App\Models\ModelCuti;
class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
        $this->ModelCuti = new ModelCuti();
    }

    public function data_dashboard()
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $data = array(
            'total_pegawai' => $this->ModelAuth->count_pegawai(),
            'total_cuti' => $this->ModelAuth->count_leave(),
            'total_valid' => $this->ModelAuth->count_valid(),
            'title' => 'Data Karyawan',
            'content' => 'v_dashboard',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_pegawai()
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelAuth->get_user();
        $data = array(
            'data_pegawai' => $getdata,
            'title' => 'Data Karyawan',
            'content' => 'v_pegawai',
        );
        return view('layout/v_wrapper', $data);
    }
    
    public function data_pegawai_view_lvl1()
    {
        if (session()-> get('position_id') <> '4'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelAuth->get_user();
        $data = array(
            'data_pegawai' => $getdata,
            'title' => 'Data Karyawan',
            'content' => 'lvl1/v_pegawai',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_pegawai_view_lvl2()
    {
        if (session()-> get('position_id') <> '5'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelAuth->get_user();
        $data = array(
            'data_pegawai' => $getdata,
            'title' => 'Data Karyawan',
            'content' => 'lvl1/v_pegawai',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_pegawai_view_lvl3()
    {
        if (session()-> get('position_id') <> '6'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelAuth->get_user();
        $data = array(
            'data_pegawai' => $getdata,
            'title' => 'Data Karyawan',
            'content' => 'lvl1/v_pegawai',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_cuti()
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdatauser = $this->ModelAuth->get_user();
        $getdata = $this->ModelCuti->get_cuti();
        $data = array(
            'data_user' => $getdatauser,
            'data_cuti' => $getdata,
            'title' => 'Data Cuti Karyawan',
            'content' => 'v_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_cuti_lvl1()
    {
        if (session()-> get('position_id') <> '4'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelCuti->data_lvl1();
        $data = array(
            'data_cuti' => $getdata,
            'title' => 'Data Cuti Karyawan',
            'content' => 'lvl1/v_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_cuti_lvl2()
    {
        if (session()-> get('position_id') <> '5'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelCuti->data_lvl2();
        $data = array(
            'data_cuti' => $getdata,
            'title' => 'Data Cuti Karyawan',
            'content' => 'lvl2/v_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function data_cuti_lvl3()
    {
        if (session()-> get('position_id') <> '6'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelCuti->data_lvl3();
        $data = array(
            'data_cuti' => $getdata,
            'title' => 'Data Cuti Karyawan',
            'content' => 'lvl3/v_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function accept_data_lvl1($id)
    {
        $data = array(
            'lvl1' => 2
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('success','Data telah Diterima');
        return redirect()->to(site_url('Admin/data_cuti_lvl1'));
    }

    public function accept_data_lvl2($id)
    {
        $data = array(
            'lvl2' => 2
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('success','Data telah Diterima');
        return redirect()->to(site_url('Admin/data_cuti_lvl2'));
    }

    public function accept_data_lvl3($id)
    {
        $data = array(
            'lvl3' => 2
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('success','Data telah Diterima');
        return redirect()->to(site_url('Admin/data_cuti_lvl3'));
    }

    public function decline_data_lvl1($id)
    {
        $data = array(
            'lvl1' => 3
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('errors','Data telah Ditolak');
        return redirect()->to(site_url('Admin/data_cuti_lvl1'));
    }
    
    public function decline_data_lvl2($id)
    {
        $data = array(
            'lvl2' => 3
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('errors','Data telah Ditolak');
        return redirect()->to(site_url('Admin/data_cuti_lvl2'));
    }
    
    public function decline_data_lvl3($id)
    {
        $data = array(
            'lvl3' => 3
        );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata('errors','Data telah Ditolak');
        return redirect()->to(site_url('Admin/data_cuti_lvl3'));
    }

    public function data_validation()
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdatauser = $this->ModelAuth->get_user();
        $getdata = $this->ModelCuti->get_cuti();
        $data = array(
            'data_user' => $getdatauser,
            'data_cuti' => $getdata,
            'title' => 'Data Validation',
            'content' => 'v_validation',
        );
        return view('layout/v_wrapper', $data);
    }

    public function edit_validation($id)
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdatacuti = $this->ModelCuti->get_edit_cuti($id);
        $data = array(
            'data_validation' => $getdatacuti,
            'title' => 'Add validation',
            'content' => 'v_add_validation',
        );
        return view('layout/v_wrapper', $data);
    }

    public function update_validation($id)
    {
        if ($this->validate([
                'leave_start'=>[
                    'label' => 'Leave Start',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Must Fill'
                    ]
                    ],
                    'leave_end'=>[
                        'label' => 'Leave End',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Filled'
                        ]
                        ],
                    'reason'=>[
                        'label' => 'Reason',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Filled'
                        ]
                        ]
                            
    ])) {
        //jika valid
            $date1 = date_create($this->request->getPost('leave_start'));
            $date2 = date_create($this->request->getPost('leave_end'));
            $intval = date_diff($date1, $date2);

            $data = array(
                'user_id'=> $this->request->getPost('user_id'),
                'leave_start'=> $this->request->getPost('leave_start'),
                'leave_end'=> $this->request->getPost('leave_end'),
                'total_leave' => $intval->format('%a'),
                'reason'=> $this->request->getPost('reason'),
                'lvl1'=> $this->request->getPost('lvl1'),
                'lvl2'=> $this->request->getPost('lvl2'),
                'lvl3'=> $this->request->getPost('lvl3'),
                'validation'=> 3
            );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata("pesan", "Update Berhasil");
        return redirect()->to(site_url('Admin/data_validation'));
    } else {
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(site_url('Admin/data_validation'));
    }
    }

    public function edit_pegawai($id)
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdatapegawai = $this->ModelAuth->get_edit_user($id);
        $data = array(
            'data_pegawai' => $getdatapegawai,
            'title' => 'Edit Data Karyawan',
            'content' => 'v_edit_pegawai',
        );
        return view('layout/v_wrapper', $data);
    }
    public function update_pegawai($id)
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
            'user_number'=> $this->request->getPost('user_number'),
            'name'=> $this->request->getPost('name'),
            'phone_number'=> $this->request->getPost('phone_number'),
            'email'=> $this->request->getPost('email'),
            'password'=> $this->request->getPost('password'),
            'username'=> $this->request->getPost('username'),
            'sex'=> $this->request->getPost('sex'),
        );
        $this->ModelAuth->update($id, $data);
        session()->setFlashdata("success", "Update Berhasil");
        session()->setFlashdata('pesan','Update Berhasil');
        return redirect()->to(site_url('Admin/data_pegawai'));
    } else {
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(site_url('Admin/data_pegawai'));
    }
    }

    public function cuti_user($id)
    {
        if (session()-> get('position_id') <> '1'){
            return redirect()->to(site_url('home'));
        }
        $getdata = $this->ModelCuti->get_user_id($id);
        $getdatacuti = $this->ModelCuti->get_cuti_id($id);
        $data = array(
            'data_user' => $getdata,
            'data_cuti' => $getdatacuti,
            'title' => 'Data Cuti Anda',
            'content' => 'user/v_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function edit_cuti($id)
    {
        if (session()-> get('position_id') <> '3'){
            return redirect()->to(site_url('home'));
        }
        $getdatacuti = $this->ModelCuti->get_edit_cuti($id);
        $data = array(
            'data_cuti' => $getdatacuti,
            'title' => 'Edit Data Cuti',
            'content' => 'v_edit_cuti',
        );
        return view('layout/v_wrapper', $data);
    }

    public function update_cuti($id)
    {
        if ($this->validate([
                'leave_start'=>[
                    'label' => 'Leave Start',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Must Fill'
                    ]
                    ],
                    'leave_end'=>[
                        'label' => 'Leave End',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Filled'
                        ]
                        ],
                    'reason'=>[
                        'label' => 'Reason',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Filled'
                        ]
                        ]
                            
    ])) {
        //jika valid
            $date1 = date_create($this->request->getPost('leave_start'));
            $date2 = date_create($this->request->getPost('leave_end'));
            $intval = date_diff($date1, $date2);

            $data = array(
                'user_id'=> $this->request->getPost('user_id'),
                'leave_start'=> $this->request->getPost('leave_start'),
                'leave_end'=> $this->request->getPost('leave_end'),
                'total_leave' => $intval->format('%a'),
                'reason'=> $this->request->getPost('reason')
            );
        $this->ModelCuti->update($id, $data);
        session()->setFlashdata("success", "Update Berhasil");
        session()->setFlashdata('pesan','Update Berhasil');
        return redirect()->to(site_url('Admin/data_cuti'));
    } else {
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(site_url('Admin/data_cuti'));
    }
    }

    public function delete_pegawai($id)
    {
        $this->ModelAuth->delete($id);
        session()->setFlashdata('success','Delete Berhasil');
        return redirect()->to(site_url('Admin/data_pegawai'));
    }

    public function save_data_cuti()
    {
        if ($this->validate([
                'user_id'=>[
                    'label' => 'User',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Must Fill'
                    ]
                    ],
                    'leave_start'=>[
                        'label' => 'Leave Start',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Must Fill'
                        ]
                        ],
                        'leave_end'=>[
                            'label' => 'Leave End',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ],
                        'reason'=>[
                            'label' => 'Reason',
                            'rules' => 'required',
                            'errors' => [
                                'required' => '{field} Must Filled'
                            ]
                            ]
                                
        ])) {
            //jika valid
            $date1 = date_create($this->request->getPost('leave_start'));
            $date2 = date_create($this->request->getPost('leave_end'));
            $intval = date_diff($date1, $date2);

            $data = array(
                'user_id'=> $this->request->getPost('user_id'),
                'leave_start'=> $this->request->getPost('leave_start'),
                'leave_end'=> $this->request->getPost('leave_end'),
                'total_leave' => $intval->format('%a'),
                'reason'=> $this->request->getPost('reason'),
                'status' => 1,
                'validation' => 1
            );
            $this->ModelCuti->save_data_cuti($data);
            session()->setFlashdata("success", "Register Berhasil");
            session()->setFlashdata('pesan','Register Berhasil');
            return redirect()->to(site_url('Admin/data_cuti'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('Admin/data_cuti'));
        }
    }

    public function delete_cuti($id)
    {
        $this->ModelCuti->delete($id);
        session()->setFlashdata('success','Delete Berhasil');
        return redirect()->to(site_url('Admin/data_cuti'));
    }
}