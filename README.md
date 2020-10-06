# IP签名档Mod
做好的 [API](http://ipcounter.ihcr.top)
逛github的时候看见@xhboke的源码，又恰巧洛谷兴起了一阵计数器潮，为了更好的展（zhuang）示（bi）自己，特将源代码fork一份，添加模式2.
![这是实例](http://ipcounter.ihcr.top/?mode=2&mail=abc1763613206@163.com&str=%E5%8D%9A%E8%A7%88%E4%B9%90%E5%AD%A6%EF%BC%8C%E6%95%A2%E4%BA%8E%E6%8E%A2%E7%B4%A2%E3%80%82&qq=1817532680&gh=abc1763613206&lg=%E6%9F%90%E4%BA%BA&strsize=18)

## 调教方法
实际上都写在index.php里了

```
mode：1或不填：原作模式。2：魔改模式
lg：洛谷用户名
gh：Github用户名
qq：QQ号
mail：邮箱
str：最下方留言（strsize：大小）
```
PSD源文件也已上传，如需其他请自己更改（别忘了改坐标）。

使用前需在服务器端安装msyh.ttf字体。

使用时记得给counter.dat赋予写入权限。

## 2020年10月6日更新

考虑到用api访问量一大就会爆炸，所以就把调用api改成使用GeoIP了。

可能需要时不时更新一下根目录下的GeoLite2-City.mmdb文件。

更新链接：[http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz](http://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz)

同时修改了原来``index.php``代码屎一样的缩进。

### 以下为原作的介绍~
# IP签名档源码
<h2>说在前面</h2>
自从论坛IP签名档开放以来，访问量达到1806287，一百八十多万，由于证书过期和懒得维护。今特开源。
<h2>演示效果</h2>
<a href="https://blog.icysky.cn/ipcounter">https://blog.icysky.cn/ipcounter </a>

我服务器上用的是PRC_ChuYin.jpg这张图，修改的时候请注意修改文字坐标。

另外，请注意服务器上的这个版本并不支持传入参数。

<h2>原帖地址</h2>

https://www.xhboke.com/858.html
<h2>修复</h2>
<h3>6.11<h3>
$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip; <br>
$country = $data['data']['country']; <br>
$region = $data['data']['region']; <br>
$city = $data['data']['city'];<br>

