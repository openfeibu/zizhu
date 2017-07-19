<?php

namespace app\index\controller;

use think\Request;
use think\Db;
use app\index\model\NationalScholarship;
use app\index\controller\Base;
use app\index\model\MultipleScholarship;
class Scholarship extends Base
{

    public function submitNation(Request $request)
    {
        $model = new NationalScholarship();
        if ($request->isPost()) {
            $data = $request->post();
            //检查学生是否已经提交过了
            $bool = $model->check($this->user_id, $this->time);
            //不存在则创建
            if (!$bool) {
                $data['create_at'] = time();
                $data['update_at'] = $data['create_at'];
                $data['user_id'] = $this->user_id;
                $bool = NationalScholarship::create($data);
                return $this->redirect();
            }
            //存在的时候，则更新。
            $data['update_at'] = time();
            $bool = NationalScholarship::where('user_id', $this->user_id)
                ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
                ->update($data);
            if (!$bool) {
                return $this->error("更新失败");
            }
            return $this->success('更新成功');
        }
        $res = $model->getStudentScholarship($this->user_id, $this->time);
        $this->assign('list', $res);
//        return $this->fetch('./index/nation');
    }

    /**
     * 励志奖学金和助学金
     * @param Request $request
     */
    public function doubleScholarship(Request $request)
    {
        if ($request->isPost()){
            $data = $request->post();
            $type = $data['type'];
            $type = 1;
            $model = new MultipleScholarship();
            if ($model->check($type, $this->user_id, $this->time)) {
                $bool = $model->updateData($this->user_id, $type, $this->time, $data);
                if (!$bool) {
                    return $this->error("更新失败");
                }
                return $this->success("更新成功");
            }
            return $this->success("提交成功");
        }
        $data = Db::table('multiple_scholarship')
            ->where('user_id', $this->user_id)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->find();
        $this->assign("list", $data);
//        halt($data);
        return $this->fetch('');
    }
}
