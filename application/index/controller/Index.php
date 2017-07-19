<?php
namespace app\index\controller;

use app\admin\controller\ResetPassword;
use think\Db;
use app\index\model\User;
use think\Controller;
use app\index\controller\Excel;
use think\Request;
use app\index\model\UserType;
class Index extends Controller
{
    protected $spreadsheet;
//    protected $count = 2;

    /**
     *
     * 显示学生列表
     * @return mixed
     */
    public function index()
    {
        $data = Db::table('user')
            ->paginate(20);
        $this->assign('list', $data);
        return $this->fetch();
    }

    /**
     * 导出excel的接口
     */
    public function getAll()
    {
        $field = ['candidate_number', 'studentid', 'studentname',
            'id_number', 'gender', 'birthday', 'political', 'nation', 'type', 'learning_way',
            'grade', 'class', 'professional_cetegory', 'profession', 'education', 'school_system',
            'admission_date', 'department_name', 'is_rural_student'];
        $data = Db::table('user')
            ->field($field)
            ->select();
        return $this->leadingExcel($data);

    }

    /**
     * 导出csv
     * @param $data
     */
    public function leadingExcel($data)
    {
        $str = "考号, 学号, 姓名, 身份证号, 性别, 出生日期, 政治面貌,民族, 学生类型, 学习形式, 年级, 班级, 专业大类, 专业, 攻读学历, 学制, 入学日期, 院系名称, 是否农村学生\n";
        $str = iconv('utf-8', 'gbk', $str);
        foreach ($data as $row) {
            //将每一行的数据转码
            $row = $this->changeIcovn($row);
            //\t是将一串数字转变为字符串在excel中，\n是换行
            $str .= $row['candidate_number']."\t,".$row['studentid']."\t,".$row['studentname'].",".$row['id_number']."\t,".$row['gender'].",".$row['birthday'].",".$row['political'].",".$row['nation'].",".$row['type'].",".$row['learning_way'].",".$row['grade'].",".$row['class'].",".$row['professional_cetegory'].",".$row['profession'].",".$row['education'].",".$row['school_system'].",".$row['admission_date'].",".$row['department_name'].",".$row['is_rural_student'].","."\n";
        }
        $this->export_csv("123.csv", $str);
    }

    /**
     * 导出csv
     * @param $filename 文件名字
     * @param $data 内容
     */
    public function export_csv($filename,$data)
    {
        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=".$filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');
        echo $data;
        exit();
    }

    /**
     * 将utf-8的内容的编码转为gbk编码
     * @param $data 待转的内容
     * @return array
     */
    public function changeIcovn($data)
    {
        $arr = [];
        foreach ($data as $key => $row)
        {
            $arr[$key] = iconv('utf-8','gbk',$row);
        }
        return $arr;
    }

    public function leadingInDatabase(Request $request)
    {
        if ($request->isPost()) {
        $field = ['candidate_number', 'studentid', 'studentname',
            'id_number', 'gender', 'birthday', 'political', 'nation', 'type', 'learning_way',
            'grade', 'class', 'professional_cetegory', 'profession', 'education', 'school_system',
            'admission_date', 'department_name', 'is_rural_student'];
            $file = $request->file('info');
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'Leadingin');
            if($info){
                $excel = new Excel();
                $model = new UserType();
                $bool = $excel->leadingExcel($model, $field, null, $info->getSaveName());
                if (!$bool) {
                    return $this->success("新增成功");
                }
                return $this->success("新增失败");
            }else{
//                 上传失败获取错误信息
                $this->error($file->getError());
            }
        }
    }

    public function ser()
    {

    }

}