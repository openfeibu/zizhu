<?php

namespace app\index\model;

use think\Model;
use think\Db;
class NationalScholarship extends Model
{
    /**
     * 获取学生的国家奖学金所填写的信息
     * @param $uid
     * @param $time
     * @return mixed
     */
    public function getStudentScholarship($uid, $time)
    {
        $field = Db::getTableInfo('national_scholarship', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        $result = $this->alias('ns')
            ->join('user u', 'u.studentid = ns.user_id', 'right')
            ->field('u.*,'.$field)
            ->where('ns.user_id', $uid)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,ns.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $time")
            ->find();
        return $result->getData();
    }

    /**
     * 检察是否存在
     * @param $uid
     * @param $time
     * @return bool
     */
    public function check($uid, $time)
    {
        $res = $this->where('user_id', $uid)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,ns.create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $time")
            ->find();
        if (!$res) {
            return false;
        }
        return true;
    }
}
