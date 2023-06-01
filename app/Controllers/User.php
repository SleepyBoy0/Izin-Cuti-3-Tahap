<?php

namespace App\Controllers;
use App\Models\ModelAuth;
use App\Models\ModelCuti;
class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
        $this->ModelCuti = new ModelCuti();
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
            session()->setFlashdata('success','Register Berhasil');
            return redirect()->to(site_url('Admin/cuti_user'.'/'.session()->get('id')));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(site_url('Admin/cuti_user'.'/'.session()->get('id')));
        }
    }

    public function edit_cuti($id)
    {
        if (session()-> get('position_id') <> '1'){
            return redirect()->to(site_url('home'));
        }
        $getdatacuti = $this->ModelCuti->get_edit_cuti($id);
        $data = array(
            'data_cuti' => $getdatacuti,
            'title' => 'Edit Data Cuti',
            'content' => 'user/v_edit_cuti.php',
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
        session()->setFlashdata('success','Update Berhasil');
        return redirect()->to(site_url('admin/cuti_user'.'/'.session()->get('id')));
    } else {
        //jika tidak valid
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(site_url('admin/cuti_user'.'/'.session()->get('id')));
    }
    }

    public function delete_cuti($id)
    {
        $this->ModelCuti->delete($id);
        session()->setFlashdata('success','Delete Berhasil');
        return redirect()->to(site_url('admin/cuti_user'.'/'.session()->get('id')));
    }
}