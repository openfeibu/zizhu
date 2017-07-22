<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\admin\controller\OperateLog;
class Automatic extends Controller
{
    private $level;

    /**
     * 自动评分评等级
     */
    public function automaticRating($uid)
    {
        $user = Db::table('user_identify')
            ->where('user_id', $uid)
            ->find();
        $grade = Db::table('identify_model')
            ->field('field,score')
            ->select();
        $this->level = Db::table('evaluation')
            ->field('evaluation_level,evaluation_instructions')
            ->select();
        foreach ($grade as $key => $val) {
            $grade[$key]['score'] = json_decode($val['score'], true);
        }
        $array = [];
        $arr = [];
        foreach ($grade as $key => $val) {
            $val['score']['score'] = $user[$val['field']];
            $array[$val['field']] = $val['score'];
            foreach ($array[$val['field']] as $k => $v) {
                if ($k == 'score'){
                    continue;
                }
                if ($array[$val['field']][$k]['option_score'] == $array[$val['field']]['score']){
                    $arr[$val['field']] = $v['level'];
                }
            }
        }
        array_multisort($arr);
        $finally['user_id'] = $uid;
        foreach ($arr as $k => $v) {
            foreach ($this->level as $vv) {
                if ($v == $vv['evaluation_level']){
                    $finally['grade'] = $vv['evaluation_instructions'];
                    break;
                }
                if (isset($finally['grade'])) break;
            }
        }
        $status_id = Db::table('status')
            ->where('user_id', $finally['user_id'])
            ->field('id')
            ->find();
        $group = Db::table('group_operate')
            ->where('status_id', $status_id['id'])
            ->update([
                'group_grade' => $finally['grade'],
                'update_at' => time()
            ]);
        $log = new OperateLog();
        $log->addLog($uid, "系统自动评等级");
    }


}
