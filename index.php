<?php
//echo "dddddddddddddddd";die;
//$host='10.0.0.35';
$host='75.101.232.88';
$port  = '3306';
//$login  = 'superuser';
$login  = 'root';
$pass  = 'Admin@321';
//$pass  = 'HivMb^641';
$dbase  = 'bradlee';
$start=strtotime(date("Y-m-d H:i:s"));
$str="Starttime           Endtime\r\n". date("Y-m-d H:i:s")."         ";
$con=mysql_connect($host,$login,$pass);
if(!$con)die("no connection");
mysql_select_db($dbase,$con);
//$sql="set profiling =1";
//mysql_query($con,$sql);
//$fh=fopen("/tmp/profile.txt",'a');
$sql="select pid from patient_data";
$rs=mysql_query($sql);
//echo date("Y-m-d H:i:s")."sss<br>";
//$sql="show profile";
//$sql="SELECT Status, FORMAT(DURATION, 6) AS Duration FROM INFORMATION_SCHEMA.PROFILING";
//$rs2=mysql_query($con,$sql);

//while($row2=mysql_fetch_array($rs2)){
//fwrite($fh,$row2['Status']."#".$row2['Duration']."\r\n");
//$prof[$row2['Status']] +=$row2['Duration'];
//$prof['Total'] +=$row2['Duration'];
//}
while($row=mysql_fetch_array($rs)){
//echo $row['pid']."nn<br>";

$sql="select * from patient_data where pid=".$row['pid'];
$rr=mysql_query($sql);
$x=mysql_fetch_array($rr);
//$sql="show profile";
//$prof=array();
//$sql="SELECT Status, FORMAT(DURATION, 6) AS Duration FROM INFORMATION_SCHEMA.PROFILING";
//$rs2=mysql_query($con,$sql);

//while($row2=mysql_fetch_array($rs2)){
//fwrite($fh,$row2['Status']."#".$row2['Duration']."\r\n");
//$prof[$row2['Status']] +=$row2['Duration'];
//$prof['Total'] +=$row2['Duration'];
//}
echo "<br>ssss".$x['fname'];
//$rs12=mysql_query($con,$sql);
//$dd=mysql_fetch_array($rs12);
//echo "lll".mysql_info($con);
}
$end=strtotime(date("Y-m-d H:i:s"));
$str.="        ".date("Y-m-d H:i:s")."     ".($end-$start)."\r\n";
//$sql="show profile";
//$sql="SELECT Status, FORMAT(DURATION, 6) AS Duration FROM INFORMATION_SCHEMA.PROFILING";
//$rs2=mysql_query($con,$sql);

//while($row2=mysql_fetch_array($rs2)){
//fwrite($fh,$row2['Status']."#".$row2['Duration']."\r\n");
//$prof[$row2['Status']] +=$row2['Duration'];
//$prof['Total'] +=$row2['Duration'];
//}
//fclose($fh);
$fh=fopen("/tmp/rdsstatistics.txt",'a');
fwrite($fh,$str);
fclose($fh);
//print_r($prof);
//foreach($prof as $k=>$v){
//echo $k."-----------".number_format($v,7)."<br>";
//}
echo $str;
?>

