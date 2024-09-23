<?php

namespace App\Controllers;
use App\Models\Ajaxstudent;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function create()
    {
        return view('ajaxStudent/index.php');
        
    }

    public function store()
    {
        
        $students =new Ajaxstudent();
        $data =[
            'name'=>$this->request->getPost('name'),
            'email'=>$this->request->getPost('email'),
            'phone'=>$this->request->getPost('phone'),
            'course'=>$this->request->getPost('course')
        ];
        echo json_encode($data);
        // return json_encode($data); // to return the data on console

        $students->save($data);
        $response =['status'=>'Student Inserted Successfully'];
        return $this->response->setJson($response);
    }

    public function getdata()
    {
        // echo json_encode($data);
        $students = new Ajaxstudent();

        $data['students'] = $students->findAll();
        // return json_encode($data);
        return $this->response->setJSON($data);

    }

    
}
