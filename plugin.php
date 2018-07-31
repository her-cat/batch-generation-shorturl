<?php
/*
Plugin Name: Batch generation shorturl
Plugin URI: https://github.com/her-cat/batch-generation-shorturl
Description: Batch generation of short URLs
Version: 1.0
Author: 她和她的猫
Author URI: https://github.com/her-cat
*/

// 注册插件
yourls_add_filter( 'api_action_batch_generation', 'batch_generation_shorturl' );

// 插件核心内容
function batch_generation_shorturl() {

    // 判断是否传入参数 urls
	if( !isset( $_REQUEST['urls'] ) ) {
		return array(
			'statusCode' => 400,
			'simple'     => "Need a 'urls' parameter",
			'message'    => 'error: missing param',
		);	
	}

    $urls = $_REQUEST['urls'];

    // 将 urls 以 , 分割为 url 数组
    $url_arr = explode( ',', $urls );
    // 存放结果集
	$result = array();

    // 遍历 url 数组
    foreach ( $url_arr as $url ) {
        // 对 url 进行编码过滤
        $url = yourls_encodeURI( $url );
        $url = yourls_escape( yourls_sanitize_url( $url ) );

        // 生成短网址
        $return = yourls_add_new_link( $url );
        
        // 判断是否生成功
        if (isset($return['statusCode']) && $return['statusCode'] == 200 ) {
            // 加入结果集中
            $result[] = [
                'raw_url' => $url,  // 原 url
                'keyword' => $return['url']['keyword'], // 短网址关键词
                'shorturl' => $return['shorturl'], // 生成的短网址
            ];
        }
	}
    
    // 输出 json 格式结果
	echo json_encode($result);exit;
}