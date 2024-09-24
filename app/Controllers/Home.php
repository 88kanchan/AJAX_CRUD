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

    
//This Method is used to save data in your database
    public function store()
    {
        
        $students =new Ajaxstudent();
        $data =[
            'name'=>$this->request->getPost('name'),
            'email'=>$this->request->getPost('email'),
            'phone'=>$this->request->getPost('phone'),
            'course'=>$this->request->getPost('course')
        ];
        // echo json_encode($data);
        // return json_encode($data); // to return the data on console

        $students->save($data);
        
        $response =['status'=>'Student Inserted Successfully'];
        return $this->response->setJson($response);
    }


//This Method is used for Get Data (Retrive Data)
    public function getdata()
    {
        //Create Object for the Ajaxstudent
        $students = new Ajaxstudent();

        $data['students'] = $students->findAll();
        
        //return JSON Data
        return $this->response->setJSON($data);

    }
    public function veiwStudent()
    {
        $students = new Ajaxstudent();
        $student_id=$this->request->getPost('stud_id');
        $data['student']=$students->find($student_id);
        return $this->response->setJSON($data);

    }

    public function edit()
    {
        $students = new Ajaxstudent();
        $student_id=$this->request->getPost('stud_id');
        $data['student']=$students->find($student_id);
        return $this->response->setJSON($data);
    }


    public  function update()
    {
        $students=new Ajaxstudent();
        $student_id=$this->request->getPost('stud_id');
        $data=[
            'name'=>$this->request->getPost('name'),
            'email'=>$this->request->getPost('email'),
            'phone'=>$this->request->getPost('phone'),
            'course'=>$this->request->getPost('course')
        ];

        $students->update($student_id, $data);

        $message =['status'=>'Update Data Successfully'];
        return $this->response->setJSON($message);


    }


    public function delete()
    {
        $students=new Ajaxstudent();
        $students->delete($this->request->getPost('stud_id'));


        $message =['status'=>'Deleted Data Successfully'];
        return $this->response->setJSON($message);
    }

    
}
