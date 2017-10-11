<?php

class CurlHandle {

    private static $url = ''; // 访问的url
    private static $oriUrl = ''; // referer url
    private static $data = array(); // 可能发出的数据 post,put
    private static $method; // 访问方式，默认是GET请求

    public static function send($url, $data = array(), $method = 'get')
    {
        if ( ! $url) return false;

        if ( ! is_array($data)) return false;

        if ( ! in_array($method,array('get', 'post', 'put', 'delete')))
        {
            return false;
        }

        self::$url  = $url;
        self::$data = $data;
        self::$method = $method;

        $urlArr = parse_url($url);
        self::$oriUrl = $urlArr['scheme'] .'://'. $urlArr['host'];

        $func = self::$method . 'Request';

        return self::$func();
    }

    /**
     * 发起get请求
     */
    private static function getRequest()
    {
        if ( ! empty(self::$data))
        {
            self::$url = strpos(self::$url,'?') === false  ?
                self::$url . '?' . http_build_query(self::$data) :
                self::$url . '&' . http_build_query(self::$data) ;
        }

        $ch = curl_init();//初始化curl

        curl_setopt($ch, CURLOPT_URL, self::$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); // 自动设置Referer
        curl_setopt($ch, CURLOPT_REFERER, self::$oriUrl); // 来源一定要设置成来自本站
        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环

        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

    /**
     * 发起post请求
     */
    private static function postRequest()
    {
        $ch = curl_init();//初始化curl

        curl_setopt($ch, CURLOPT_URL, self::$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);

        // 来源一定要设置成来自本站
        curl_setopt($ch, CURLOPT_REFERER, self::$oriUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式

        if ( ! empty(self::$data))
        {
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query(self::$data));
        }

        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环

        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

    /**
     * 发起put请求
     */

    private static function putRequest()
    {
        if ( ! empty(self::$data))
        {
            self::$url = strpos(self::$url,'?') === false  ?
                self::$url . '?' . http_build_query(self::$data) :
                self::$url . '&' . http_build_query(self::$data) ;
        }

        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::$method); //设置请求方式
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-HTTP-Method-Override:" . self::$method));//设置HTTP头信息
        curl_setopt($ch, CURLOPT_URL, self::$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); // 自动设置Referer
        curl_setopt($ch, CURLOPT_REFERER, self::$oriUrl); // 来源一定要设置成来自本站
        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环

        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

    /**
     * 发起delete请求
     */
    private static function deleteRequest()
    {
        if ( ! empty(self::$data))
        {
            self::$url = strpos(self::$url,'?') === false  ?
                self::$url . '?' . http_build_query(self::$data) :
                self::$url . '&' . http_build_query(self::$data) ;
        }

        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::$method); //设置请求方式
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-HTTP-Method-Override:" . self::$method));//设置HTTP头信息
        curl_setopt($ch, CURLOPT_URL, self::$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); // 自动设置Referer
        curl_setopt($ch, CURLOPT_REFERER, self::$oriUrl); // 来源一定要设置成来自本站
        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环

        $data = curl_exec($ch);//运行curl
        curl_close($ch);

        return $data;
    }

}