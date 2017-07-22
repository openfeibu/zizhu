<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
//    'index' => 'index/student/submitIdentify',
    'ajax/family' => 'index/student/getAllFamily',
    'submit/choosetype' => 'index/student/chooseType',
    'submit/identify' => 'index/student/submitIdentify',
    'submit/poor' => 'index/student/submitPoor',
    'submit/survey' => 'index/student/submitSurvey',
    'submit/application' => 'index/student/apply',

    'submit/application' => 'index/FillInformation/showForm',
    'ajax/getidentify' => 'index/FillInformation/ajaxForStudent',

    'assess/all' => 'admin/assess/read',
    'read/type/:id' => 'admin/assess/readByType',
    'check/field/:id' => 'admin/assess/checkField',
    'field/delete/:field' => 'admin/assess/delete',

    'doublescholarship' => 'index/Scholarship/doubleScholarship',


    'viewpoor/:id/:id2' => 'admin/viewInformation/viewpoor',
    'viewidentify/:id' => 'admin/viewInformation/viewidentify',
    'read/nation/:id' => 'admin/ViewInformation/ViewNationForm',
    'read/double/:id' => 'admin/ViewInformation/ViewDoubleForm'

];