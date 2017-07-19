<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\php_project\zzxt\public/../application/index\view\.\index\Ide-app-form.html";i:1500450414;}*/ ?>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>填写-广东省家庭经济困难学生认定申请表</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/app-icon72x72@2x.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="images/app-icon72x72@2x.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!--<link rel="stylesheet" href="css/amazeui.css">-->
    <link rel="stylesheet" type="text/css" href="__style__/amazeui.css" />
    <link rel="stylesheet" type="text/css" href="__style__/admin.css" />
    <link rel="stylesheet" type="text/css" href="__style__/app.css" />
    <!--<link rel="stylesheet" href="css/admin.css">-->
    <!--<link rel="stylesheet" href="css/app.css">-->
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器， 本系统暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<!--页头开始-->
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>广东农工商职业技术学院</strong> <small>学生资助管理系统</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-user"></span> 管理员 </a></li>
            <li><a href="javascript:;"><span class="am-icon-sign-out"></span> 退出 </a></li>
        </ul>
    </div>
</header>
<!--页头结束-->

<!--内容开始-->
<article>

    <!--侧边栏开始-->
    <aside>
        <div class="sidebar">
            <div class="am-panel am-panel-default">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
                </div>
            </div>
            <ul class="am-list admin-sidebar-list">
                <li><a href="admin-index.html"><span class="am-icon-home"></span> 首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf"><span class="am-icon-table"></span> 表格填写 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li><a href="admin-user.html" class="am-cf"><span class="am-icon-table"></span> 家庭经济困难学生认定申请表 </a></li>
                        <li><a href="admin-help.html"><span class="am-icon-table"></span> 国家奖学金申请审批表 </a></li>
                        <li><a href="admin-gallery.html"><span class="am-icon-table"></span> 国家励志奖学金申请表 </a></li>
                        <li><a href="admin-log.html"><span class="am-icon-table"></span> 国家助学金申请表 </a></li>
                    </ul>
                </li>
                <li><a href="admin-table.html"><span class="am-icon-database"></span> 统计 <span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>

            </ul>
        </div>
    </aside>
    <!--侧边栏结束-->

    <!--主要内容开始-->
    <section class="main-content">
        <div class="mian-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格填写</strong> / <small>广东省家庭经济困难学生认定申请表</small></div>
            </div>
            <form class="ide-form am-container" action="<?php echo url('submit/identify'); ?>" method="post">
                <div class="form-begin">
                    <table class="am-table">
                        <tbody class="stu_bas_info">
                        <tr>
                            <td rowspan="8"><strong>学生基本情况</strong></td>
                            <td><label for="identification-name">姓名</label></td>
                            <td colspan="2"><input type="text" id="identification-name" placeholder="输入您的姓名" value="<?php echo $list['studentname']; ?>"></td>
                            <td><label for="identification-gender">性别</label></td>
                            <td><input type="text" class="" id="identification-gender" placeholder="输入您的性别" value="<?php echo $list['gender']; ?>"></td>
                            <td><label for="identification-national">民族</label></td>
                            <td><input type="text" class="" id="identification-national" placeholder="输入您的民族" value="<?php echo $list['nation']; ?>"></td>
                            <td><label for="identification-birth">出生年月</label></td>
                            <td colspan="3"><input type="text" class="" id="identification-birth" placeholder="输入您的出生年月" value="<?php echo $list['birthday']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="identification-IDNum">身份证号码</label></td>
                            <td colspan="4"><input type="text" class="" id="identification-IDNum" placeholder="输入您的身份证号码" value="<?php echo $list['id_number']; ?>"></td>
                            <td colspan="4"><strong>户口（转入学校户口的学生填写入学前户口）</strong></td>
                            <td colspan="3">
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="ide-reg-oer-res" value="1" name="gender">
                                        城镇
                                    </label>
                                </div>

                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="ide-reg-oer-res" value="0" name="gender">
                                        农村
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4"><strong>家庭情况</strong></td>
                            <td colspan="2"><label for="population">家庭人口数</label></td>
                            <td colspan="2"><input type="text" class="" id="population" name="population" placeholder="家庭人口数" value="<?php echo $list['population']; ?>"></td>
                            <td colspan="3"><label for="school_population">家庭成员在学人数</label></td>
                            <td colspan="3"><input type="text" class="" id="school_population" name="school_population" placeholder="家庭成员在学人数" value="<?php echo $list['school_population']; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="10" class="am-text-left">
                                <div class="multiterm">
                                    1.建档立卡户:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="establish_card" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="establish_card" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    2.特困供养人员:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="special_person" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="special_person" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    3.城乡最低生活保障户:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="mini_living" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="mini_living" value="0">否
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" class="am-text-left">
                                <div class="multiterm">
                                    4.特困职工子女:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="poor_children" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="poor_children" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    5.城镇低收入困难家庭:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="low_income" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="low_income" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    6.孤儿:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="orphan" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="orphan" value="0">否
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" class="am-text-left">
                                <div class="multiterm">
                                    7.父母一方抚养:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="single_parent" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="single_parent" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    8.烈士子女、因公牺牲军人警察子女:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="martyrs_children" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="martyrs_children" value="0">否
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2"><strong>健康状况</strong></td>
                            <td colspan="10" class="am-text-left">
                                <div class="multiterm">
                                    1.残疾:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability" value="0">否
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm">
                                    2.患重大疾病:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="suffering" value="1">是;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="suffering" value="0">否
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" class="am-text-left">
                                <div class="multiterm">
                                    如是残疾，请选择类别:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_type" value="0" onclick="dis_type_checked()">视残;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_type" value="1" onclick="dis_type_checked()">听残;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_type" value="2" onclick="dis_type_checked()">智残;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_type" value="3" onclick="dis_type_checked()">其他
                                            <input type="text" id="disability_type" name="disability_other" readonly value="<?php echo $list['disability_other']; ?>">
                                            （如有多个类型，请用“，”隔开！）
                                        </label>
                                    </div>
                                </div>
                                <div class="multiterm am-padding-left-lg">
                                    残疾等级:
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_grade" value="0">一级;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_grade" value="1">二级;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_grade" value="2">三级;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="disability_grade" value="3">四级
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="fam_info">
                        <tr>
                            <td rowspan="3"><strong>家庭信息</strong></td>
                            <td><label for="residence_address">户籍地址</label></td>
                            <td colspan="10"><input type="text" id="residence_address" name="residence_address" placeholder="户籍地址" value="<?php echo $list['residence_address']; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="Zip_code">邮政编码</label></td>
                            <td colspan="2"><input type="text" id="Zip_code" name="zip_code" placeholder="邮政编码" value="<?php echo $list['zip_code']; ?>"></td>
                            <td><label for="number">联系电话</label></td>
                            <td colspan="3"><input type="text" id="number" name="number" placeholder="联系电话" value="<?php echo $list['number']; ?>"></td>
                            <td colspan="2"><label for="annual_income">家庭人均年收入</label></td>
                            <td colspan="2">
                                <input type="text" id="annual_income" name="annual_income" placeholder="家庭人均年收入" value="<?php echo $list['annual_income']; ?>">
                                （人民币元）
                            </td>
                        </tr>
                        <tr>
                            <td><strong>住房情况</strong></td>
                            <td colspan="5" class="am-text-left">
                                <div class="multiterm">
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="housing_situation" value="0" onclick="hou_sit_checked()">自有;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="housing_situation" value="1" onclick="hou_sit_checked()">租赁;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="housing_situation" value="2" onclick="hou_sit_checked()">其他;
                                            <input type="text" name="housing_other" id="housing_situation" readonly value="<?php echo $list['housing_other']; ?>">
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td><strong>购车情况</strong></td>
                            <td colspan="4" class="am-text-left">
                                <div class="multiterm">
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="car_situation" value="0">无车;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="car_situation" value="1">小轿车;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="car_situation" value="2">货车;
                                        </label>
                                    </div>
                                    <div class="am-radio">
                                        <label>
                                            <input type="radio" name="car_situation" value="3">农机车;
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="fam_mem_sit">
                        <tr>
                            <td rowspan="11">家庭成员情况（直系亲属，含祖父母）</td>
                            <td>姓名</td>
                            <td>年龄</td>
                            <td>与学生关系</td>
                            <td colspan="2">工作（学习）单位</td>
                            <td colspan="2">联系电话</td>
                            <td>从业情况</td>
                            <td>文化程度</td>
                            <td>年收入（元）</td>
                            <td>健康状况</td>
                        </tr>
                        <?php $members = unserialize($list['members']); ?>
                        <tr>
                            <td><input type="text" name="members[0][name]"></td>
                            <td><input type="text" name="members[0][age]"></td>
                            <td><input type="text" name="members[0][relation]"></td>
                            <td colspan="2"><input type="text" name="members[0][work_units]"></td>
                            <td colspan="2"><input type="text" name="members[0][contact_number]"></td>
                            <td><input type="text" name="members[0][work_condition]"></td>
                            <td><input type="text" name="members[0][education]"></td>
                            <td><input type="text" name="members[0][annual_income]"></td>
                            <td><input type="text" name="members[0][health]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="members[1][name]"></td>
                            <td><input type="text" name="members[1][age]"></td>
                            <td><input type="text" name="members[1][relation]"></td>
                            <td colspan="2"><input type="text" name="members[1][work_units]"></td>
                            <td colspan="2"><input type="text" name="members[1][contact_number]"></td>
                            <td><input type="text" name="members[1][work_condition]"></td>
                            <td><input type="text" name="members[1][education]"></td>
                            <td><input type="text" name="members[1][annual_income]"></td>
                            <td><input type="text" name="members[1][health]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="members[2][name]"></td>
                            <td><input type="text" name="members[2][age]"></td>
                            <td><input type="text" name="members[2][relation]"></td>
                            <td colspan="2"><input type="text" name="members[2][work_units]"></td>
                            <td colspan="2"><input type="text" name="members[2][contact_number]"></td>
                            <td><input type="text" name="members[2][work_condition]"></td>
                            <td><input type="text" name="members[2][education]"></td>
                            <td><input type="text" name="members[2][annual_income]"></td>
                            <td><input type="text" name="members[2][health]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="members[3][name]" ></td>
                            <td><input type="text" name="members[3][age]" ></td>
                            <td><input type="text" name="members[3][relation]"></td>
                            <td colspan="2"><input type="text" name="members[3][work_units]"></td>
                            <td colspan="2"><input type="text" name="members[3][contact_number]"></td>
                            <td><input type="text" name="members[3][work_condition]"></td>
                            <td><input type="text" name="members[3][education]"></td>
                            <td><input type="text" name="members[3][annual_income]"></td>
                            <td><input type="text" name="members[3][health]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="members[4][name]"></td>
                            <td><input type="text" name="members[4][age]"></td>
                            <td><input type="text" name="members[4][relation]"></td>
                            <td colspan="2"><input type="text" name="members[4][work_units]"></td>
                            <td colspan="2"><input type="text" name="members[4][contact_number]"></td>
                            <td><input type="text" name="members[4][work_condition]"></td>
                            <td><input type="text" name="members[4][education]"></td>
                            <td><input type="text" name="members[4][annual_income]"></td>
                            <td><input type="text" name="members[4][health]"></td>
                        </tr>
                        <!--<tr>-->
                            <!--<td><input type="text" name="members[5][name]"></td>-->
                            <!--<td><input type="text" name="members[5][age]"></td>-->
                            <!--<td><input type="text" name="members[5][relation]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[5][work_units]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[5][contact_number]"></td>-->
                            <!--<td><input type="text" name="members[5][work_condition]"></td>-->
                            <!--<td><input type="text" name="members[5][education]"></td>-->
                            <!--<td><input type="text" name="members[5][annual_income]"></td>-->
                            <!--<td><input type="text" name="members[5][health]"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td><input type="text" name="members[6][name]"></td>-->
                            <!--<td><input type="text" name="members[6][age]"></td>-->
                            <!--<td><input type="text" name="members[6][relation]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[6][work_units]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[6][contact_number]"></td>-->
                            <!--<td><input type="text" name="members[6][work_condition]"></td>-->
                            <!--<td><input type="text" name="members[6][education]"></td>-->
                            <!--<td><input type="text" name="members[6][annual_income]"></td>-->
                            <!--<td><input type="text" name="members[6][health]"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td><input type="text" name="members[7][name]"></td>-->
                            <!--<td><input type="text" name="members[7][age]"></td>-->
                            <!--<td><input type="text" name="members[7][relation]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[7][work_units]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[7][contact_number]"></td>-->
                            <!--<td><input type="text" name="members[7][work_condition]"></td>-->
                            <!--<td><input type="text" name="members[7][education]"></td>-->
                            <!--<td><input type="text" name="members[7][annual_income]"></td>-->
                            <!--<td><input type="text" name="members[7][health]"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td><input type="text" name="members[8][name]"></td>-->
                            <!--<td><input type="text" name="members[8][age]"></td>-->
                            <!--<td><input type="text" name="members[8][relation]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[8][work_units]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[8][contact_number]"></td>-->
                            <!--<td><input type="text" name="members[8][work_condition]"></td>-->
                            <!--<td><input type="text" name="members[8][education]"></td>-->
                            <!--<td><input type="text" name="members[8][annual_income]"></td>-->
                            <!--<td><input type="text" name="members[8][health]"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td><input type="text" name="members[9][name]"></td>-->
                            <!--<td><input type="text" name="members[9][age]"></td>-->
                            <!--<td><input type="text" name="members[9][relation]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[9][work_units]"></td>-->
                            <!--<td colspan="2"><input type="text" name="members[9][contact_number]"></td>-->
                            <!--<td><input type="text" name="members[9][work_condition]"></td>-->
                            <!--<td><input type="text" name="members[9][education]"></td>-->
                            <!--<td><input type="text" name="members[9][annual_income]"></td>-->
                            <!--<td><input type="text" name="members[9][health]"></td>-->
                        <!--</tr>-->
                        </tbody>
                        <tbody class="fam_eco_sit">
                        <tr>
                            <td rowspan="2"><strong>影响家庭经济状况有关信息</strong></td>
                            <td colspan="11" class="am-text-left">
                                <div class="am-form-group">
                                    <label for="income_source">家庭主要收入来源类型:</label>
                                    <input type="text" class="" id="income_source" name="income_source" placeholder="家庭主要收入来源类型" value="<?php echo $list['income_source']; ?>">
                                    <p>
                                        （只能选填其中一项。<br>
                                        1.<u>工资、奖金、津贴、补贴和其他劳动收入</u>；
                                        2.<u>离退休金、基本养老金、基本生活费、失业保险金</u>；
                                        3.<u>继承、接受赠予、出租或出售家庭财产获得的收入</u>；
                                        4.<u>存款及利息，有价证券及红利、股票、博彩收入</u>；
                                        5.<u>经商、办厂以及从事种植业、养殖业、加工业扣除必要成本后的收入</u>；
                                        6.<u>赡养费、抚(扶)养费</u>；
                                        7.<u>自谋职业收入</u>；
                                        8.<u>其他应当计入家庭的收入</u>）
                                    </p>
                                </div>
                                <div class="am-form-group">
                                    <label for="funded">学生已获资助情况:</label>
                                    <input type="text" class="" id="funded" name="funded" placeholder="（时间、受资助的具体项目、受助金额人民币元）" value="<?php echo $list['funded']; ?>">
                                </div>
                                <div class="am-form-group FES">
                                    <p><strong>（如无以下情形，只需填写“无”）：</strong></p>
                                    <label for="natural_disasters">家庭遭受自然灾害情况:</label>
                                    <input type="text" class="" id="natural_disasters" name="natural_disasters" placeholder="（时间最近两年内发生、损失金额、人员伤亡等具体描述）" value="<?php echo $list['natural_disasters']; ?>">
                                    <label for="unexpected_events">家庭遭受突发意外事件:</label>
                                    <input type="text" class="" id="unexpected_events" name="unexpected_events" placeholder="（时间最近两年内发生、损失金额、人员伤亡等具体描述）"  value="<?php echo $list['unexpected_events']; ?>">
                                    <label for="debt">家庭欠债情况:</label>
                                    <input type="text" class="" id="debt" name="debt" placeholder="（时间、原因、金额人民币元）"  value="<?php echo $list['debt']; ?>">
                                </div>
                                <div class="am-form-group">
                                    <label for="other">其他情况:</label>
                                    <input type="text" class="" id="other" name="other" placeholder="（时间、人员）"  value="<?php echo $list['other']; ?>">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody class="signature">
                        <tr>
                            <td><strong>签章</strong></td>
                            <td colspan="3">
                                <p>本人保证所填资料真实，并同意授权民政部门通过信息核对系统，对所填资料进行查询、核对。</p>
                                <div class="am-form-group am-fr">
                                    <label for="hand_sign">手写签名：</label>
                                    <input type="text" class="" id="hand_sign">
                                </div>
                                <div class="am-form-group am-fl ide_date">
                                    <input type="text" class="" id="ide_year">
                                    <label for="ide_year">年</label>

                                    <input type="text" class="" id="ide_month">
                                    <label for="ide_month">月</label>
                                    <input type="text" class="" id="ide_day">
                                    <label for="ide_day">日</label>
                                </div>
                            </td>
                            <td colspan="3">
                                <label for="i_m">本人是</label>
                                <input type="text" id="i_m">
                                    同学的（
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="doc-radio-1" value="option1">
                                        父亲
                                    </label>
                                </div>
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="doc-radio-1" value="option2">
                                        母亲
                                    </label>
                                </div>
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="doc-radio-1" value="option2">
                                        监护人
                                    </label>
                                </div>
                                ），该同学所填资料真实，同意授权民政部门通过信息核对系统，对所填资料进行查询、核对。
                                <div class="am-form-group am-fr fam_hand_sign">
                                    <label for="fam_hand_sign">学生家长或监护人手写签名：</label>
                                    <input type="text" id="fam_hand_sign">
                                </div>
                                <div class="am-form-group am-fl ide_date">
                                    <input type="text" class="" id="fam_ide_year">
                                    <label for="fam_ide_year">年</label>
                                    <input type="text" class="" id="fam_ide_month">
                                    <label for="fam_ide_month">月</label>
                                    <input type="text" class="" id="fam_ide_day">
                                    <label for="fam_ide_day">日</label>
                                </div>
                            </td>
                            <td colspan="2" id="res_opi">
                                学生户籍所在地村委会（居委会）意见
                            </td>
                            <td colspan="3" id="TITC">
                                <div class="am-radio am-fl">
                                    <label>
                                        <input type="radio" name="vil-opi" value="0">
                                        情况属实
                                    </label>
                                </div>
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="vil-opi" value="1">
                                        情况不属实
                                    </label>
                                </div>
                                <div class="am-radio am-fl">
                                    <label>
                                        <input type="radio" name="vil-opi" value="2">
                                        其他（补充相关内容）
                                    </label>
                                </div>
                                <div class="agent_sign">
                                    <label class="am-fl" for="agent_hand_sign">经办人手写签名：</label>
                                    <input type="text" id="agent_hand_sign">
                                    <label for="units_name">单位名称：</label>
                                    <input type="text" class="am-fl" id="units_name">
                                </div>
                                <p class="am-fr">（加盖公章）</p>
                                <div class="am-form-group am-fl ide_date">
                                    <input type="text" class="" id="agent_ide_year">
                                    <label for="agent_ide_year">年</label>
                                    <input type="text" class="" id="agent_ide_month">
                                    <label for="agent_ide_month">月</label>
                                    <input type="text" class="" id="agent_ide_day">
                                    <label for="agent_ide_day">日</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <p>
                                    学生户籍所在地乡（镇）或街道意见
                                </p>
                            </td>
                            <td colspan="8">
                                <div class="am-radio am-fl">
                                    <label>
                                        <input type="radio" name="towns-opi" value="0">
                                        情况属实
                                    </label>
                                </div>
                                <div class="am-radio">
                                    <label>
                                        <input type="radio" name="towns-opi" value="1">
                                        情况不属实
                                    </label>
                                </div>
                                <div class="am-radio am-fl">
                                    <label>
                                        <input type="radio" name="towns-opi" value="2">
                                        其他（补充相关内容）
                                    </label>
                                </div>
                                <br>
                                <div class="agent_sign">
                                    <label class="am-fl" for="agent_hand_sign">经办人手写签名：</label>
                                    <input type="text" id="">
                                    <br>
                                    <label for="units_name">单位名称：</label>
                                    <input type="text" class="am-fl" id="">
                                </div>
                                <p class="am-fr">（加盖公章）</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit">
            </form>
        </div>
    </section>
    <!--主要内容结束-->

</article>
<!--内容结束-->


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="__script__/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="__script__/jquery-3.2.1.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<!--<script src="__script__/amazeui.ie8polyfill.js"></script>-->
<script type="text/javascript" src="__script__/amazeui.ie8polyfill.js"></script>
<![endif]-->
<!--<script src="__script__/amazeui.js"></script>-->
<script type="text/javascript" src="__script__/amazeui.js"></script>
<script type="text/javascript" src="__script__/app.js"></script>
<script>


</script>
</body>
</html>