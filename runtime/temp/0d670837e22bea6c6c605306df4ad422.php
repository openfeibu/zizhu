<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\php_project\zzxt\public/../application/admin\view\.\myclass.html";i:1500371907;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>
    <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>专业班级</td>
        <td>类型</td>
        <td>贫困表</td>
        <td>认定表</td>
        <td>申请书</td>
        <td>调查表</td>
        <td>总的状态</td>
    </tr>
    <?php foreach($list as $row): ?>
    <tr>
        <td><?php echo $row['studentid']; ?></td>
        <td><?php echo $row['studentname']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['profession']; ?><?php echo $row['class']; ?></td>
        <td><?php if($row['fund_type'] == 1): ?>国家奖学金<?php elseif($row['fund_type'] == 2): ?>国家励志奖学金<?php elseif($row['fund_type'] == 3): ?>国家助学金<?php else: ?>？<?php endif; ?></td>
        <td><a href="/viewpoor/<?php echo $row['poor_id']; ?>/<?php echo $row['survey_id']; ?>"><?php echo $row['poor_id']; ?></a></td>
        <td><a href="/viewidentify/<?php echo $row['identify_id']; ?>"><?php echo $row['identify_id']; ?></a></td>
        <td><?php echo $row['application_id']; ?></td>
        <td><?php echo $row['survey_id']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $list->render(); ?>
</body>
</html>