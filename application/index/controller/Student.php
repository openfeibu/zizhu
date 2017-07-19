<?php

namespace app\index\controller;

use app\index\model\Survey;
use think\Controller;
use think\Request;
use app\index\model\Identify;
use think\Db;
use app\index\model\Poor;
use app\index\model\Application;
use app\index\model\Status;
use app\index\controller\Base;
class Student extends Base
{
    private $identify;
    //status实例
    private $status;


    public function __construct()
    {
        parent::__construct();
        $this->status = new Status();
    }

    /**
     * 流程一开始，选择学生资助的类型
     * @param Request $request
     * @return \think\response\Redirect|void
     */
    public function chooseType(Request $request)
    {
        $type = $request->get('fund_type');
        switch ($type) {
            case 1 :
                $res = $this->status->storeByChooseType($this->user_id, $type, $this->time);
                if (!$res) {
                    return $this->error("你已经提交过了。请勿重复提交。");
                }
                return redirect();
                break;
            case 2 :
                $res = $this->status->storeByChooseType($this->user_id, $type, $this->time);
                if (!$res) {
                    return $this->error("你已经提交过了。请勿重复提交。");
                }
                return redirect();
                break;
            case 3 :
                $res = $this->status->storeByChooseType($this->user_id, $type, $this->time);
                if (!$res) {
                    return $this->error("你已经提交过了。请勿重复提交。");
                }
                return redirect();
                break;
            default :return $this->error("发生未知错误。");
        }

    }

    /**
     * 家庭经济认证
     * @return mixed 视图
     */
    public function submitIdentify(Request $request)
    {
        if ($request->isPost()) {
            $data = $request->post();
            $this->identify = new Identify();
            //删除不必要的数据
            unset($data['ide-reg-oer-res']);
            //转化为可存储的
            if (!empty($data['members'])){
                $data['members'] = serialize($data['members']);
            }
            //检察是否存在
            if ($this->identify->existPopulation($this->user_id, time())) {
                $data['update_at'] = time();
                //更新
                Identify::where('user_id', $this->user_id)
                    ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")   //只更新今年申请的。
                    ->update($data);
                return redirect('/index');
                //不存在就插入新的记录
            } else {
                $data['user_id'] = $this->user_id;                  //测试数据
                $data['create_at'] = time();
                $data['update_at'] = $data['create_at'];
                $re = Identify::create($data);
                $type_id = $re->getLastInsID();
                $this->status->checkStatus($this->user_id, $this->time, $type_id, "identify_id");
                return redirect('../index');
            }
            //如果是ajax访问的话
        } else if ($request->isAjax()){
            //所有需要的字段
            $field = "establish_card, special_person, mini_living, poor_children,
            low_income, orphan, single_parent, martyrs_children, disability, suffering,
            disability_type, housing_situation, car_situation, is_rural_student, disability_grade";
            $data = Db::table('identify')
                ->alias('i')
                ->join('user u', 'u.studentid = i.user_id', 'right')
                ->field($field)
                ->where('user_id', $this->user_id)
                ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
                ->find();
            //删除没用的row字段
            unset($data['ROW_NUMBER']);
            return $data;
        }
        //获取所有字段
        $field = Db::getTableInfo('identify', 'fields');
        //去掉id，因为id冲突
        unset($field[0]);
        //将数组转化为字符串
        $field = implode(',', $field);
        //查询学生信息
        //先查询他有没有填写过认证
        $bool = Db::table('identify')
            ->where('user_id',$this->user_id)
            ->find();
        if (!$bool) {
            $data = Db::table('User')
                ->alias('u')
                ->join('identify i', 'u.studentid = i.user_id', 'left')
                ->field('u.*,'.$field)
                ->where('u.studentid', $this->user_id)
                ->find();
        } else {
            $data = Db::table('User')
                ->alias('u')
                ->join('identify i', 'u.studentid = i.user_id', 'left')
                ->field('u.*,'.$field)
                ->where('u.studentid', $this->user_id)
                ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
                ->find();
        }
        $this->assign('list', $data);
        return $this->fetch('./index/Ide-app-form');
    }

    //显示界面，测试前端
    public function index(Request $request)
    {
        return $this->fetch('./index/Ide-app-form');
    }

    /**
     * 提交贫困证明
     * @param Request $request
     */
    public function submitPoor(Request $request)
    {
        //查看是否已经提交过
        $bool = Poor::where('user_id', $this->user_id)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->find();
        if ($bool) {
            return $this->error("你已经上传过了");
        }
        $file = $request->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'Poor');
        if($info){
            //文件的位置信息20170714\4add59834eda69e7c77a5c96377b5a4c.xls
//            dump($info->getSaveName());
            $data['img'] = $info->getSaveName();
            $data['user_id'] = $this->user_id;
            $data['create_at'] = time();
            $data['update_at'] = $data['create_at'];
            $re = Poor::create($data);
            $type_id = $re->getLastInsID();
            $this->status->checkStatus($this->user_id, $this->time, $type_id, "poor_id");
            return $this->success("上传成功");
        }else{
            // 上传失败获取错误信息
            return $this->error($file->getError());
        }
    }

    /**
     * 提交家庭信息调查表
     * @param Request $request
     */
    public function submitSurvey(Request $request)
    {
        //查看是否已经提交过
        $bool = Survey::where('user_id', $this->user_id)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->find();
        if ($bool) {
            return $this->error("你已经上传过了");
        }
        $file = $request->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'Survey');
        if($info){
            //文件的位置信息20170714\4add59834eda69e7c77a5c96377b5a4c.xls
//            dump($info->getSaveName());
            $data['img'] = $info->getSaveName();
            $data['user_id'] = $this->user_id;
            $data['create_at'] = time();
            $data['update_at'] = $data['create_at'];
            $re = Survey::create($data);
            $type_id = $re->getLastInsID();
            $this->status->checkStatus($this->user_id, $this->time, $type_id, "survey_id");
            return $this->success("上传成功");
        }else{
            // 上传失败获取错误信息
            return $this->error($file->getError());
        }
    }

    /**
     * 申请书的提交
     * @param Request $request
     * @return mixed|void 返回视图或者相关信息
     */
    public function apply(Request $request)
    {
        //是否post提交
        if ($request->isPost()) {
            $data = $request->post();
            $data['user_id'] = $this->user_id;
            //检查本年是否已经提交过
            $bool = Application::where('user_id', $this->user_id)
                ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
                ->find();
            if ($bool) {
                //提交过的话。做更新处理
                $data['update_at'] = time();
                $apply = Application::where('user_id', $this->user_id)
                    ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
                    ->update($data);
                if (!$apply) {
                    return $this->error("更新失败");
                }
                return $this->success("更新成功");
            }
            //按新增处理
            $data['create_at'] = time();
            $data['update_at'] = $data['create_at'];
            $bool = Application::create($data);
            if (!$bool) {
                return $this->error("提交失败");
            }
            //获取插入的id，放入总的状态表中
            $type_id = $bool->getLastInsID();
            $this->status->checkStatus($this->user_id, $this->time, $type_id, "application_id");
            return $this->success("提交成功");
        }
        //get请求访问，显示相关的数据
        $data = Db::table('application')
            ->where('user_id', $this->user_id)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->find();
        $this->assign('list', $data);
        return $this->fetch('./index/apply');
    }

    /**
     * 获取所有不可思议的家庭成员
     * @return array
     */
    public function getAllFamily()
    {
        $data = Db::table('identify')
            ->field("members")
            ->where('user_id', $this->user_id)
            ->where("CONVERT(VARCHAR(4),DATEADD(S,create_at + 8 * 3600,'1970-01-01 00:00:00'),20) = $this->time")
            ->find();
        unset($data['ROW_NUMBER']);
        //解码。转化为数组
        $data['members'] = unserialize($data['members']);
        //返回json格式的数据
        return $data;
    }
}