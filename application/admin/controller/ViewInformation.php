<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\index\model\Poor;
use app\index\model\Survey;
use app\index\model\Identify;
use think\Db;
class ViewInformation extends Controller
{
    private $time;

    public function __construct()
    {
        parent::__construct();
        $this->time = date('Y', time());
    }

    /**
     * 显示用户提交的2个图片后续会换的
     * @param $id
     * @param $id2
     * @return mixed
     */
    public function viewPoor($id, $id2)
    {
        $data  =  Poor::get($id);
        $data2 = Survey::get($id2);
        $this->assign('list', $data->getData());
        $this->assign('list2', $data2->getData());
        return $this->fetch('./zl');
    }

    /**
     * 显示家庭困难认证表
     * @param $id
     * @return mixed
     */
    public function viewIdentify($id)
    {
        //获取所有字段
        $field = Db::getTableInfo('identify', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $data = Db::table('user')
            ->alias('u')
            ->field('u.*,'.$field)
            ->join('identify i', 'i.user_id = u.studentid', 'left')
            ->where('i.id', $id)
            ->find();
//        halt($data);
//        $data = $data->getData();
        $this->assign('list', $data);
        return $this->fetch('./Ide-app-form');
    }

    /**
     * 显示用户提交的国家奖学金表
     * @param $id
     * @return mixed
     */
    public function ViewNationForm($id)
    {
        //获取所有字段
        $field = Db::getTableInfo('national_scholarship', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $data = Db::table('user')
            ->alias('u')
            ->field('u.*,'.$field)
            ->join('national_scholarship ns', 'u.studentid = ns.user_id', 'left')
            ->where("CONVERT(VARCHAR(4),DATEADD(S,ns.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->where('u.studentid', $id)
            ->find();
        $this->assign('list', $data);
        return $this->fetch();
    }

    /**
     * 显示用户提交的奖学金或者助学金表
     * @param $id
     * @return mixed
     */
    public function ViewDoubleForm($id)
    {
        //获取所有字段
        $field = Db::getTableInfo('multiple_scholarship', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $data = Db::table('user')
            ->alias('u')
            ->field('u.*,'.$field)
            ->join('multiple_scholarship ms', 'u.studentid = ms.user_id', 'left')
            ->where("CONVERT(VARCHAR(4),DATEADD(S,ms.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->where('u.studentid', $id)
            ->find();
//        halt($data);
        $this->assign('list', $data);
        return $this->fetch();
    }
}
