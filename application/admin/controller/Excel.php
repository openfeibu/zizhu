<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use app\index\model\UserType;
class Excel extends Controller
{
    public function leadingExcel($model, $field, $where = null, $info, $is_update = null)
    {
        $reader = IOFactory::createReaderForFile(ROOT_PATH . 'public' . DS . 'uploads'.DS.'Leadingin'.DS.$info);
        $reader->setReadDataOnly(true);
        $spreadsheet = IOFactory::load(ROOT_PATH . 'public' . DS . 'uploads'.DS.'Leadingin'.DS.$info);
        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
        $highestColumn++;
        if (is_null($is_update)) {
            $arr = [];
            $key = 0;
            for ($row = 1; $row <= $highestRow; ++$row) {
                $num = 0;
                for ($col = 'A'; $col != $highestColumn; ++$col) {
                    $va =  $worksheet->getCell($col . $row)
                        ->getValue();
                    $arr[$key][$field[$num]] = $va;
                    $num++;
                }
                $key++;
            }
            $bool  = $model->saveAll($arr, false);
            return $bool;
        }
//        for ($row = 1; $row <= $highestRow; ++$row) {
//            for ($col = 'A'; $col != $highestColumn; ++$col) {
//                $va =  $worksheet->getCell($col . $row)
//                    ->getValue();
//                    $bool =  Db::table('Table_StudentLeaveSchool_Project')
//                        ->where($where)
//                        ->update([
//                            'ishandle' => 1
//                        ]);
//                    $count++;
//                    if(!$bool) {
////                        return $this->success("没有数据更新");
//                    }
//            }
//        }
//        return $this->success("更新".$count."记录成功");
    }
}
