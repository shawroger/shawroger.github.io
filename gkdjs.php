<?php
define('ADMIN_USERNAME','cafe');   
define('ADMIN_PASSWORD','freeday');
if(!isset($_SERVER['PHP_AUTH_USER'])||!isset($_SERVER['PHP_AUTH_PW'])||$_SERVER['PHP_AUTH_USER']!=ADMIN_USERNAME||$_SERVER['PHP_AUTH_PW']!= ADMIN_PASSWORD) 
{  
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="Search System of Roger"');
echo '<h1>401 Unauthorized</h1>';
echo '<p>Your request is unauthorized,please contact with the webmaster.</p>';
exit;
}  
?> 

<?php
header("Content-type:text/html;charset=utf-8");
include "include.php";
$time=date("Ymdhis").rand(10000,99999);
include "editor.php";
?>
<br><br><br><br>

<style type="text/css">
    body{background:WhiteSmoke;}
    ul li{background: Silver;}
    ul li a{color:white;}
    .fileLabel{
          display: inline-block;
          width:auto;
          height: 40px;
          line-height: 40px;
          text-align: center;
          border: 1px solid #8cc051;
          border-radius: 5px;
          background: lightgray;
          cursor: pointer;
          
}
.fileInput{opacity: 0;}
p#filename{font-size: 16px;padding-right:5px;padding-left:5px;}
        
        
</style>
<script>
    $("#upfiles").hide();
</script>

    

<script>
function onfile()
{
    var filepath = $("#upfiles").val();
    if(filepath=="")
    {
        $("#filename").text("请选择修改后的图片（备选）");
    }
    else
    {
        $("#filename").text(filepath);
    }

}
</script>
<div class="container">
    <ul class="nav nav-pills nav-justified" role="tablist">
    <li><a href="//service.shawroger.com/search">进入首页</a></li>
    <li><a href="//service.shawroger.com/search/add">添加词条</a></li>
    <li><a href="//service.shawroger.com/search/edit">编辑词条</a></li>
    <li><a href="//roger.cafe/about" target="_blank">关于我们</a></li>
  </ul>
   <div class="jumbotron">
        <h1>编辑你的词条</h1>
