<?php 
/*
    $conn=mysqli_connect("localhost","root","root");//or die("cannt connet");
    if($conn){
        echo"ok";
    }else{
        echo"error";    
    } 
	*/
	
	//phpinfo();
// 图片base64编码

//$path   = 'C:\Apache24\htdocs\image\\'.$_POST["file"].'.jpg';
$path   = $_POST["file"];
$data   = file_get_contents($path);
$base64 = base64_encode($data);

if($_POST["type"] == "4") {
$path   = $_POST["file1"];
$data   = file_get_contents($path);
$base64b = base64_encode($data);
}

// 设置请求数据
$appkey = 'your appkey';
$appid = 'your appid'
$url = '';

/*****************
1:ocr id card
2:ocr car plate
3:general ocr
4:face contrast 
5:face search
***511: 个体创建
***512: 删除个体
***521: 增加人脸
***522: 删除人脸
***53: 设置信息，设置个体的名字或备注
***54: 获取信息
***55: 获取组列表
***56:获取个体列表
***57:获取人体列表
***56:获取人体信息
*****************/
if($_POST["type"] == "1") {
	$params = array(
		'app_id'     => $appid,
		'image'      => $base64,
		'card_type'  => '0',
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
		);
	$url = 'https://api.ai.qq.com/fcgi-bin/ocr/ocr_idcardocr';
}
else if($_POST["type"] == "2"){
	$params = array(
		'app_id'     => $appid,
		'image'      => $base64,
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/ocr/ocr_plateocr';
}
else if($_POST["type"] == "3"){
	$params = array(
		'app_id'     => $appid,
		'image'      => $base64,
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/ocr/ocr_generalocr';
}
else if($_POST["type"] == "4"){
	$params = array(
		'app_id'     => $appid,
		'image_a'    => $base64,
		'image_b'    => $base64b,
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_facecompare';
}
else if($_POST["type"] == "5"){
	$params = array(
		'app_id'     => $appid,
		'image'      => $base64,
		'group_id'   => 'group0',
		'topn'       => '5',
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_faceidentify';
}
else if($_POST["type"] == "511"){
	$params = array(
		'app_id'     => $appid,
		'group_ids'  => 'group0',
		'person_id'  => $_POST["id"],
		'image'      => $base64,
		'person_name'=> $_POST["name"],
		'tag'        => $_POST["tag"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_newperson';
}
else if($_POST["type"] == "512"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_delperson';
}
else if($_POST["type"] == "521"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'images'     => $base64,
		'tag'        => $_POST["tag"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_addface';
}
else if($_POST["type"] == "522"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'face_ids'   => '',
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_delface';
}
else if($_POST["type"] == "53"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'person_name'=> $_POST["name"],
		'tag'        => $_POST["tag"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_setinfo';
}
else if($_POST["type"] == "54"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_getinfo';
}
else if($_POST["type"] == "55"){
	$params = array(
		'app_id'     => $appid,
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_getgroupids';
}
else if($_POST["type"] == "56"){
	$params = array(
		'app_id'     => $appid,
		'group_id'   => 'group0',
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_getpersonids';
}
else if($_POST["type"] == "57"){
	$params = array(
		'app_id'     => $appid,
		'person_id'  => $_POST["id"],
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_getfaceids';
}
else if($_POST["type"] == "58"){
	$params = array(
		'app_id'     => $appid,
		'face_id'    => '',
		'time_stamp' => strval(time()),
		'nonce_str'  => strval(rand()),
		'sign'       => '',
	);
	$url = 'https://api.ai.qq.com/fcgi-bin/face/face_getfaceinfo';
}



$params['sign'] = getReqSign($params, $appkey);

// 执行API调用
$response = doHttpPost($url, $params);
echo $response;


	
// getReqSign ：根据 接口请求参数 和 应用密钥 计算 请求签名
// 参数说明
//   - $params：接口请求参数（特别注意：不同的接口，参数对一般不一样，请以具体接口要求为准）
//   - $appkey：应用密钥
// 返回数据
//   - 签名结果
function getReqSign($params /* 关联数组 */, $appkey /* 字符串*/)
{
    // 1. 字典升序排序
    ksort($params);

    // 2. 拼按URL键值对
    $str = '';
    foreach ($params as $key => $value)
    {
        if ($value !== '')
        {
            $str .= $key . '=' . urlencode($value) . '&';
        }
    }

    // 3. 拼接app_key
    $str .= 'app_key=' . $appkey;

    // 4. MD5运算+转换大写，得到请求签名
    $sign = strtoupper(md5($str));
    return $sign;
}

// doHttpPost ：执行POST请求，并取回响应结果
// 参数说明
//   - $url   ：接口请求地址
//   - $params：完整接口请求参数（特别注意：不同的接口，参数对一般不一样，请以具体接口要求为准）
// 返回数据
//   - 返回false表示失败，否则表示API成功返回的HTTP BODY部分
function doHttpPost($url, $params)
{
    $curl = curl_init();

    $response = false;
    do
    {
        // 1. 设置HTTP URL (API地址)
        curl_setopt($curl, CURLOPT_URL, $url);

        // 2. 设置HTTP HEADER (表单POST)
        $head = array(
            'Content-Type: application/x-www-form-urlencoded'
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $head);

        // 3. 设置HTTP BODY (URL键值对)
        $body = http_build_query($params);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $body);

        // 4. 调用API，获取响应结果
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_NOBODY, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); //true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        if ($response === false)
        {
            $response = false;
            break;
        }

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($code != 200)
        {
            $response = false;
            break;
        }
    } while (0);

    curl_close($curl);
    return $response;
}

?>
