<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\php_project\zzxt\public/../application/index\view\index\index.html";i:1499911034;}*/ ?>
<table>
    <tr>
        <td>id</td>
        <td>candidate_number</td>
        <td>studentid</td>
        <td>studentname</td>
        <td>id_number</td>
        <td>gender</td>
        <td>birthday</td>
        <td>political</td>
        <td>nation</td>
        <td>type</td>
        <td>learning_way</td>
        <td>grade</td>
        <td>class</td>
        <td>professional_cetegory</td>
        <td>profession</td>
        <td>education</td>
        <td>school_system</td>
        <td>admission_date</td>
        <td>department_name</td>
        <td>是否农村</td>
    </tr>
    <?php foreach($list as $row): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['candidate_number']; ?></td>
        <td><?php echo $row['studentid']; ?></td>
        <td><?php echo $row['studentname']; ?></td>
        <td><?php echo $row['id_number']; ?></td>
        <td><?php echo $row['gender']; ?></td>
        <td><?php echo $row['birthday']; ?></td>
        <td><?php echo $row['political']; ?></td>
        <td><?php echo $row['nation']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['learning_way']; ?></td>
        <td><?php echo $row['grade']; ?></td>
        <td><?php echo $row['class']; ?></td>
        <td><?php echo $row['professional_cetegory']; ?></td>
        <td><?php echo $row['profession']; ?></td>
        <td><?php echo $row['education']; ?></td>
        <td><?php echo $row['school_system']; ?></td>
        <td><?php echo $row['admission_date']; ?></td>
        <td><?php echo $row['department_name']; ?></td>
        <td><?php echo $row['is_rural_student']; ?></td>
    </tr>
    <?php endforeach; ?>

</table><?php echo $list->render(); ?>
<form action="<?php echo url('index/index/leadingInDatabase'); ?>" method="post" enctype="multipart/form-data">
<input type="file" name="info">
    <input type="submit">
</form>