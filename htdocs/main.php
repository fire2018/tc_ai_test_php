<html>
<body>

<form action="test.php" method="post">
处理类型: <input type="text" style="width:288px;" name="type"><br>
文件: <input type="text" style="width:320px;" name="file"><br>
比较文件: <input type="text" style="width:288px;" name="file1"><br>
ID: <input type="text" style="width:335px;" name="id"><br>
姓名: <input type="text" style="width:320px;" name="name"><br>
标签: <input type="text" style="width:320px;" name="tag"><br>
<input type="submit">
</form>

<?php 
echo "1: 身份证ocr<br>";
echo "2: 车牌ocr<br>";
echo "3: 通用ocr<br>";
echo "4: 人脸对比<br>";
echo "5: 人脸搜索<br>";
echo "***511: 个体创建<br>";
echo "***512: 删除个体<br>";
echo "***521: 增加人脸<br>";
echo "***522: 删除人脸<br>";
echo "***53: 设置信息<br>";
echo "***54: 获取信息<br>";
echo "***55: 获取组列表<br>";
echo "***56: 获取个体列表<br>";
echo "***56: 获取人体列表<br>";
echo "***56: 获取人体信息<br>";
?>

</body>
</html>