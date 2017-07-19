<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\php_project\zzxt\public/../application/admin\view\.\identify.html";i:1500279907;}*/ ?>
<form action="<?php echo url('/submit/identify'); ?>" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>学号</td>
        <td>家庭人口数</td>
        <td>在读人口数</td>
        <td>建档立卡户</td>
        <td>特困供养人员</td>
        <td>城乡最低生活保障户</td>
        <td>特困职工女子</td>
        <td>城镇低收入困难家庭</td>
        <td>孤儿</td>
        <td>父母一方抚养</td>
        <td>烈士子女、因公牺牲军人警察子女</td>
        <td>残疾</td>
        <td>患重大疾病</td>
        <td>残疾类型</td>
        <td>残疾等级</td>
        <td>户籍地址</td>
        <td>邮政编码</td>
        <td>联系电话</td>
        <td>家庭人均年收入</td>
        <td>住房情况</td>
        <td>购车情况</td>
        <td>家庭成员情况</td>
        <td>收入来源</td>
        <td>已资助情况</td>
        <td>家庭遭受自然灾害情况</td>
        <td>家庭遭受突发意外事件</td>
        <td>欠债情况</td>
        <td>其他情况</td>
    </tr>

    <tr>
        <td><input type="text"value="<?php echo $list['user_id']; ?>" name="user_id"></td>
        <td><input type="text" value="<?php echo $list['population']; ?>" name="population"></td>
        <td><input type="text" value="<?php echo $list['school_population']; ?>" name="school_population"></td>
        <td><input type="text" value="<?php echo $list['establish_card']; ?>" name="establish_card"></td>
        <td><input type="text" value="<?php echo $list['special_person']; ?>" name="special_person"></td>
        <td><input type="text" value="<?php echo $list['mini_living']; ?>" name="mini_living"></td>
        <td><input type="text" value="<?php echo $list['poor_children']; ?>" name="poor_children"></td>
        <td><input type="text" value="<?php echo $list['low_income']; ?>" name="low_income"></td>
        <td><input type="text" value="<?php echo $list['orphan']; ?>" name="orphan"></td>
        <td><input type="text" value="<?php echo $list['single_parent']; ?>" name="single_parent"></td>
        <td><input type="text" value="<?php echo $list['martyrs_children']; ?>" name="martyrs_children"></td>
        <td><input type="text" value="<?php echo $list['disability']; ?>" name="disability"></td>
        <td><input type="text" value="<?php echo $list['suffering']; ?>" name="suffering"></td>
        <td><input type="text" value="<?php echo $list['disability_type']; ?>" name="disability_type"></td>
        <td><input type="text" value="<?php echo $list['residence_address']; ?>" name="residence_address"></td>
        <td><input type="text" value="<?php echo $list['zip_code']; ?>" name="zip_code"></td>
        <td><input type="text" value="<?php echo $list['number']; ?>" name="number"></td>
        <td><input type="text" value="<?php echo $list['annual_income']; ?>" name="annual_income"></td>
        <td><input type="text" value="<?php echo $list['housing_situation']; ?>" name="housing_situation"></td>
        <td><input type="text" value="<?php echo $list['car_situation']; ?>" name="car_situation"></td>
        <td><input type="text" value="<?php echo $list['members']; ?>" name="members"></td>
        <td><input type="text" value="<?php echo $list['income_source']; ?>" name="income_source"></td>
        <td><input type="text" value="<?php echo $list['funded']; ?>" name="funded"></td>
        <td><input type="text" value="<?php echo $list['natural_disasters']; ?>" name="natural_disasters"></td>
        <td><input type="text" value="<?php echo $list['unexpected_events']; ?>" name="unexpected_events"></td>
        <td><input type="text" value="<?php echo $list['debt']; ?>" name="debt"></td>
        <td><input type="text" value="<?php echo $list['other']; ?>" name="other"></td>
        <td><input type="text" value="<?php echo $list['disability_grade']; ?>" name="disability_grade"></td>
    </tr>

</table>
<input type="submit">
</form>