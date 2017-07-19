<?php
/**
 * 评定小组
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
class Assess extends Controller
{
    private $user_id;
    private $time;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = "201555332";
        $this->time = date('Y',time());
    }

    /**
     * 获取本班级所有申请的人。无论什么类型。
     */
    public function read()
    {
        $user_class = substr($this->user_id, 0, 9);
        //获取所有字段
        $field = Db::getTableInfo('status', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $data = Db::table('status')
            ->alias('s')
            ->join('user u', 'u.studentid = s.user_id', 'right')
            ->where("CONVERT(VARCHAR(4),DATEADD(S,s.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->where("left(s.user_id, 9) = '{$user_class}'")
            ->field('u.*, '.$field)
            ->paginate(20);
        $this->assign('list', $data);
        return $this->fetch('./myclass');
    }

    /**
     * 通过类型来选择要显示哪一种申请。返回申请人的状态表
     * @param $id
     * @return mixed
     */
    public function readByType($id)
    {
        $user_class = substr($this->user_id, 0, 9);
        //获取所有字段
        $field = Db::getTableInfo('status', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $data = Db::table('status')
            ->alias('s')
            ->join('user u', 'u.studentid = s.user_id', 'right')
            ->where("CONVERT(VARCHAR(4),DATEADD(S,s.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->where("left(s.user_id, 9) = '{$user_class}'")
            ->where('s.fund_type', $id)
            ->field('u.*, '.$field)
            ->paginate(20);
        $this->assign('list', $data);
        return $this->fetch('./myclass');
    }

    /**
     * 评定小组开始疯狂了。提交相关的评语在申请表中，那么我这里要记录的就是评语啦
     *
     */
    public function submitComment(Request $request)
    {
        $data = $request->post();

    }

    /**
     * 自动评分
     */
    public function automaticRating()
    {
        $uid = '20155533219';
        $field = "establish_card, special_person, mini_living, poor_children,
            low_income, orphan, single_parent, martyrs_children, disability, suffering,
            disability_type, housing_situation, car_situation, disability_grade";
        $data = Db::table('identify')
            ->where('user_id', $uid)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->field($field)
            ->find();
        halt($data);
    }
}
