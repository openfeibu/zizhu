<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    public $user_id;
    public $time;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = '20155533233';
        $this->time = date('Y', time());
    }
}
