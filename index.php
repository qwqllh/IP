<?php $counter = intval(file_get_contents("counter.dat")); ?>
<?php include 'function.php';?>
<?php
    header("Content-type: image/JPEG");
    require_once 'vendor/autoload.php';
	use GeoIp2\Database\Reader;
    //判断mode使用不同图片
    $mode = $_GET["mode"];
    $pic = $_GET["pic"];
    
    switch ($mode)
    {
        case "1": 
            $im = imagecreatefromjpeg("images/xhxh.jpg");
            break;
        case "2": 
            if ($pic=="Chtholly")
            {
                $im = imagecreatefromjpeg("images/qmd_Chtholly.jpg");
            }
            else if ($pic=="Pipi")
            {
                $im = imagecreatefromjpeg("images/qmd_pipi.jpg");
            }
            else 
            {
                $im = imagecreatefromjpeg("images/qmd.jpg");
            }
            break;
        default:
            $im = imagecreatefromjpeg("images/xhxh.jpg");
            break;
    }

    $ip = $_SERVER["REMOTE_ADDR"];
    $weekarray = array("日","一","二","三","四","五","六");
    
    // 引入geoip
    $reader = new Reader('GeoIP/GeoLite2-City.mmdb');
    $record = $reader->city($ip);
    
    $country = $record->country->names['zh-CN'];
	$region = $record->mostSpecificSubdivision->names['zh-CN'];
    $city = $record->city->names['zh-CN'];

    //定义颜色
    $black = ImageColorAllocate($im, 0,0,0);//定义黑色的值
    $red = ImageColorAllocate($im, 255,0,0);//红色
    $blue = ImageColorAllocate($im, 0,0,255);
    $font = 'msyh.ttf';//加载字体
    //输出
    imagettftext($im, 16, 0, 10, 40, $red, $font,'欢迎您来自'.$country.'-'.$region.'-'.$city.'的朋友');
    imagettftext($im, 16, 0, 10, 72, $red, $font, '今天是'.date('Y年n月j日')."  星期".$weekarray[date("w")]);//当前时间添加到图片
    imagettftext($im, 16, 0, 10, 104, $red, $font,'您的IP是:'.$ip);//ip
    imagettftext($im, 16, 0, 10, 140, $red, $font,'您使用的是'.$os.'操作系统');
    imagettftext($im, 16, 0, 10, 175, $red, $font,'您使用的是'.$bro.'浏览器');
    imagettftext($im, 14, 0, 10, 200, $black, $font, $get); 
    imagettftext($im, 15, 0, 10, 200, $red, $font,'这个签名档一共被使用了'.$counter.'次'); 

    if ($mode == "2")
    {   //新模式
        $lg = $_GET["lg"]; //获取参数
        $gh = $_GET["gh"];
        $qq = $_GET["qq"];
        $mail = $_GET["mail"];
        $stren = $_GET["str"];
        $strsize = $_GET["strsize"];
        if ($strsize == NULL) 
        {
            $strsize = 18;
        }
        
        imagettftext($im, 20, 0, 595, 34, $black, $font,''.$lg.'');
        imagettftext($im, 20, 0, 595, 75, $black, $font,''.$gh.'');
        imagettftext($im, 20, 0, 595, 120, $black, $font,''.$qq.'');
        imagettftext($im, 20, 0, 595, 163, $black, $font,''.$mail.'');
        imagettftext($im, $strsize, 0, 545, 197, $blue, $font,''.$stren.''); 
    }
    ImageGif($im);
    ImageDestroy($im);
?>
<?php
    $counter = intval(file_get_contents("counter.dat"));  
    $_SESSION['#'] = true;  
    $counter++;  
    $fp = fopen("counter.dat","w");
    //$fpip = fopen("IP.dat","w");
    fwrite($fp, $counter);  
    //fwrite($fpip, $ipold+' '+$ip);
    fclose($fp); 
    //fclose($fpip);
 ?>
