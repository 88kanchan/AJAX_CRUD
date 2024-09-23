<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

class Student extends BaseController
{
    
    
    public function view()
    {
        
        return view('ajaxStudent/index');
    }
}
