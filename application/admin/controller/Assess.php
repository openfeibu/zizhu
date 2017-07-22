<?php
/**
 * 评定小组
 */
namespace app\admin\controller;

use think\Controller;
use think\exception\PDOException;
use think\Request;
use think\Db;
use think\Validate;

class Assess extends Controller
{
    private $user_id;
    private $time;
    private $auto_arr;
    //sqlsqr2008所有的字段类型。希望没错
    private $field_type = [
        'bit','int', 'smalint', 'tinyint', 'decimal', 'numeric', 'money',
        'smallmoney', 'float', 'real', 'datetime', 'smalldatetime', 'timestamp',
        'uniqueidentifier', 'char', 'varchar', 'text', 'nchar', 'nvarchar',
        'ntext', 'binary', 'varbinary', 'image'
    ];

    public function __construct()
    {
        parent::__construct();
        $this->user_id = "20155533219";
        $this->time = date('Y',time());
        $this->auto_arr = [
            'establish_card' => 100, //建档立卡户
            'special_person' => 100, //特困供养人员
            'orphan' => 100,         //孤儿
            'mini_living' => 95,     //城乡最低
            'poor_children' => 95,   //特困职工子女
            'low_income' => 90,      //城镇最低
            'martyrs_children' => 90, //烈士子女
            'disaster_time' => [     //自然灾害时间
                'one_natural_disaster' => 90,    //一年
                'two_natural_disaster' => 60,    //两年内
            ],
            'accident_time' => [     //意外事件时间
                'one_accident' => 90,    //一年
                'two_accident' => 60     //两年内
            ],
            'disability' => 90,      //残疾学生
            'single_parent' => 10,   //父母一方抚养
            'family_disease' => [    //家庭成员患重大疾病
                'both' => 85,        //父母双方
                'oneof' => 22,       //父母一方
                'other' => 16        //其他家庭成员
            ],
            'father_disease' =>[    //父亲为残疾人
                'one' => 40,        //一级
                'two' => 10,        //二级,
                'three' => 5,
                'four' => 2
            ],
            'mother_disease' => [    //母亲为残疾人
                'one' => 40,
                'two' => 10,
                'three' => 5,
                'four' => 2
            ],
            'Domicile' => [           //户口所在地
                'in680' => 4,         //国家核定的680个贫困县（区）
                'out680' => 3,        //外
                'gd' => 2             //广东省内
            ],
            'household_type' => 2,    //农村户口
            'nation' => 1,            //少数民族
            'school_population' => 7, //大于2个在读
            'parents_working' => [    //父母从业
                'none' => 22,         //父母均没有工作（不含农村种植户或养殖户）
                'oneof' => 9,         //父母一方没有工作（不含农村种植户或养殖户）
                'both' => 6           //农村个体小型种植户或个体小型养殖户（或两者均是）
            ],
            'parent_culture' => [     //父母文化
                'both' => 2,          //父母均为初中及以下文化程度
                'oneof' => 1          //其中一个
            ],
            'parent_age' => [         //父母年龄
                'oneof' => 8,         //其中一个60以上
                'both' => 10          //只有一个
            ],
            'old_man' => [            //赡养老人
                'oneof' => 7,         //一个
                'both' => 9           //多个
            ],
            'tuition' => [            //学费
                'cheap' => 2,         //学费、住宿费在9501元至20000元
                'expensive' => 5      //学费、住宿费在20001元以上（仅对高校学生）
            ],
            'annual_income' => [      //家庭人均年收入
                'Below' => 7,         //就读学校所在地最低生活保障线下
                'double' => 5         //就读学校所在地最低生活保障线上2倍以内
            ],
            'family_assets' => 1      //无房产无汽车户
        ];
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
     * 显示所有的字段
     * @return mixed
     */
    public function showField()
    {
        $arr = Db::table('identify_model')
            ->select();
        foreach ($arr as $key => $row) {
//            dump($row);
//            $arr[$row] = json_decode($row);
            if (!is_numeric($row['score'])) {
                $arr[$key]['score'] = json_decode($row['score'], true);
            }
            array_pop($arr[$key]);
        }
        $this->assign('list', $arr);
        return $this->fetch('./feild');
//        $a = "primary key";
    }

    /**
     * 显示修改字段的页面
     * @param $id
     * @return mixed
     */
    public function checkField($id)
    {
        $data = Db::table('identify_model')
            ->where('field', $id)
            ->find();
        $data['is_null'] == 1 ? $data['is_null'] = '是':$data['is_null'] = '否';
        $data['score'] = json_decode($data['score'], true);
        $string = '';
        foreach ($data['score'] as $key => $row) {
            if (!isset($row['option_score']) or !isset($row['level'])) {
                $string .= trim($key)."|".$row."|\n";
                continue;
            }
            $string .= trim($key)."|".trim($row['option_score'])."|".trim($row['level'])."\n";
        }
        $data['score'] = $string;
        $this->assign('row', $data);
        return $this->fetch("./check");
    }

    /**
     * 修改表结构
     * @param Request $request
     */
    public function updateField(Request $request)
    {
        $data = $request->post();
        //获取字段类型
        $d = explode('(', $data['field_type']);
        //获取字段长度
        $l = explode(')',$d[1])[0];
        //赋值
        $data['field_type'] = $d[0];
        $data['field_length'] = $l;

        //如果全为空。则报错
        if (empty($data['field']) or empty($d[0]) or empty($data['field_length'])) {
            return $this->error("填写完整");
        }
        //验证字段类型
        if (!in_array($d[0], $this->field_type)){
            return $this->error("字段类型非法");
        }
        //提交的是是
        if ($data['is_null'] == '是') {
            $data['is_null'] = 1;
        } else {
            $data['is_null'] = 0;
        }
        $array = [];
        //二级选项的修改
        if (!empty($data['score'])) {
            $data['score'] = $this->dellScore($data['score']);
        }
        $bool = Db::table('identify_model')
            ->where('field', $data['field'])
            ->update($data);
        if ($bool) {
            //修改学生端的相关字段
            $boole = $this->updateUserIdentifyTable($data['field'],$data['field_type'],$data['field_length'],$data['is_null']);
            return redirect('admin/assess/showField');
        }
    }

    /**
     * 更新表的结构
     * @param $field 字段名
     * @param $type 类型
     * @param $length 长度
     * @param int $is_null 是否为null
     * @param int $add
     * @return bool|void
     */
    public function updateUserIdentifyTable($field, $type, $length, $is_null = 0, $add = false)
    {
        //判断是增加还是修改
        if ($add) {
            $sql ="ALTER TABLE [user_identify] ADD $field $type($length)";
            if ($is_null == 1) {
                $sql .= " not null";
            }
            try {
                Db::execute($sql);
            } catch (PDOException $e) {
                return $this->error("有致命错误，请联系管理员。错误编号：".$e->getCode());
            }
            return true;
        }

        //如果是not null的话。
        if ($is_null == 1) {
            $sql = "alter table user_identify alter COLUMN $field $type($length) NOT NULL";
        } else {
            $sql = "alter table user_identify alter COLUMN $field $type($length)";
        }
        try {
            //执行修改表的结构
            $bool = Db::execute($sql);
        } catch (PDOException $e){
            //如果有异常，返回异常
            return $this->error("有致命错误，请联系管理员。错误编号：".$e->getCode());
        }
        return true;
    }

    /**
     * 为学生端添加字段
     */
    public function addField(Request $request)
    {
        $data = $request->post();
        $msg = [
            'field.require' => '字段名不能为空',
            'field.unique' => '该字段名已经存在，请重新填写',
            'is_null.require' => '是否为空不能为空',
            'score.require' => '二级选项不能为空',
            'name.require' => '名字不能为空',
            'option_type.require' => '选项类型不能为空'
        ];
        $validate = new Validate([
            'field' => 'require|unique:identify_model',
            'field_type' => 'require',
            'is_null' => 'require',
            'score' => 'require',
            'name' => 'require',
            'option_type' => 'require'
        ], $msg);

        if (!$validate->check($data)) {
            return $this->error($validate->getError());
        }
        if ($data['is_null'] == '是') {
            $data['is_null'] = 1;
        } else {
            $data['is_null'] = 0;
        }
        $data['score'] = $this->dellScore($data['score']);
        //获取字段类型
        $d = explode('(', $data['field_type']);
        //获取字段长度
        $l = explode(')',$d[1])[0];
        //赋值
        $data['field_type'] = $d[0];
        $data['field_length'] = $l;

        $bool = Db::table('identify_model')
            ->insert($data);
        if (!$bool) {
            return $this->error("插入失败");
        }
        $this->updateUserIdentifyTable($data['field'], $data['field_type'], $data['field_length'], $data['is_null'], true);
        return $this->success("添加成功", 'admin/assess/showField');
    }

    /**
     * 显示添加的界面
     */
    public function showAddField()
    {
        return $this->fetch('./addfield');
    }

    /**
     * 处理棘手的二级栏目
     * @param $data
     * @return string
     */
    public function dellScore($data)
    {
        if (!empty($data)) {
            //先将回车的\n转化为<br />这样比较好处理
            $count = explode('<br />', nl2br(trim($data)));
            //当大于等于2条
            if (count($count) >= 2) {
                foreach ($count as $row) {
                    //转化|
                    $arr = explode('|', trim($row));
                    $array[$arr[0]] = [
                        'option_score' => $arr[1],
                        'level' => $arr[2]
                    ];
                }
            } else {
                //单条
                $temp = explode('<br />', nl2br(trim($data)));
                $temp = explode('|', trim($temp[0]));
                $array[$temp[0]] = [
                    'option_score' => $temp[1],
                    'level' => $temp[2]
                ];
            }
        }
        //转化为json格式。便于储存在数据库中
        return json_encode($array);
    }

    /**
     * 删除
     * @param $field
     */
    public function delete($field)
    {
        if (empty($field)) {
            return $this->error("gg");
        }
        $bool = Db('identify_model')->where('field', $field)->find();
        if (!$bool) {
            return $this->error('不存在此字段名');
        }
        $bool = Db('identify_model')->where('field', $field)->delete();
        if (!$bool) {
            return $this->error("系统发生错误");
        }
        $sql = "ALTER TABLE [user_identify] DROP COLUMN $field";
        try {
            Db::execute($sql);
        } catch (PDOException $e) {
            return $this->error("有致命错误，请联系管理员。错误编号：" . $e->getCode());
        }
        return $this->success("删除成功");
    }
}
