<?php /* Smarty version 2.6.31, created on 2018-06-07 14:05:30
         compiled from top.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>top</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_top_nav.js"></script>
</head>
<body id="top">

<h1>LOGO</h1>

<ul>
    <li><a href="sidebar.php" target="sidebar" id="nav1" class="selected" onclick="admin_top_nav(1)">首页</a></li>
    <li><a href="sidebarn.php" target="sidebar" id="nav2" onclick="admin_top_nav(2)">内容</a></li>
    <li><a href="../View/sidebaru.html" id="nav3" target="sidebar" onclick="admin_top_nav(3)">会员</a></li>
    <li><a href="../View/sidebars.html" id="nav4" target="sidebar" onclick="admin_top_nav(4)">系统</a></li>
</ul>

<p>
    您好，<strong><?php echo $this->_tpl_vars['admin_user']; ?>
</strong> [ <?php echo $this->_tpl_vars['level_name']; ?>
 ] [ <a href="../" target="_blank">去首页</a> ] [ <a href="admin_login.php?action=logout" target="_parent">退出</a> ]
</p>

</body>
</html>