## 批量生成短网址 - YOURLS 插件
 - 插件名称: Batch generation shorturl
 - 插件地址: [https://github.com/her-cat/batch-generation-shorturl](https://github.com/her-cat/batch-generation-shorturl)
 - 描述: Batch generation of short URLs
 - 版本: 1.0
 - 作者: 她和她的猫
 - 作者地址: [https://github.com/her-cat](https://github.com/her-cat)
 - 发布时间: 2018-07-31

## 安装

```
$ git clone https://github.com/her-cat/batch-generation-shorturl.git
```

将 `batch-generation-shorturl` 这个目录复制到 `/users/plugins` 目录下面，在管理后台启用这个插件。

## 使用

请求地址：
```
http://域名或ip地址/yourls-api.php?username=你的登录账户&password=你的登录密码&action=batch_generation&urls=https://baidu.com,https://youku.com,https://csdn.com
```

结果：
```
[{
	"raw_url": "https://baidu.com",
	"keyword": "1",
	"shorturl": "http://yourls.com/1"
}, {
	"raw_url": "https://youku.com",
	"keyword": "2",
	"shorturl": "http://yourls.com/2"
}, {
	"raw_url": "https://csdn.com",
	"keyword": "3",
	"shorturl": "http://yourls.com/3"
}]
```