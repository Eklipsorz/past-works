<?
$news_pw=array("123"=>"123","456"=>"456");
$news=array_keys($news_pw);

if(!in_array($id,$news))
{
echo"非本站會員";
exit;
}

if($pw !=$news_pw[$id])
{
echo"密碼錯誤";
exit;
}
session_register("id","pw")
header("location:index.html");

?>
