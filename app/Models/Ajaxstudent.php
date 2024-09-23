<?php namespace App\Models;

use CodeIgniter\Model;

class Ajaxstudent extends Model{

    protected $table ='student';
    protected $primarykey ='id';
    protected $allowedFields=[
        'name',
        'email',
        'phone',
        'course'
    ];
}
?>