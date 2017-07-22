<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
class OperateLog extends Controller
{
    public function addLog($uid, $msg)
    {
        //查找到总状态表的id
        $id = Db::table('status')
            ->field('id')
            ->where('user_id', $uid)
            ->find();
        $message = Db::table('operation')
            ->field('instructions')
            ->where('status_id', $id['id'])
            ->find();
        $msg = $message['instructions'].date('Y-m-d H:i:s', time()).$msg.',';
        Db::table('operation')
            ->where('status_id', $id['id'])
            ->update([
                'instructions' => $msg
            ]);
    }
}
