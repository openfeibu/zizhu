<?php
namespace app\index\model;

use think\Model;
use think\Db;
class User extends Model
{
    protected $hidden = ['password'];
    protected $field = ['id', 'candidate_number', 'studentid', 'studentname',
        'id_number', 'gender', 'birthday', 'political', 'nation', 'type', 'learning_way',
        'grade', 'class', 'professional_cetegory', 'profession', 'education', 'school_system',
        'admission_date', 'department_name', 'is_rural_student'];
    protected $resultSetType = 'array';

    public function getAll()
    {
//        dump($this->field($this->field)->select());
    }
}