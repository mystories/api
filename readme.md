mystories api模块
=======

mystories是一个新闻阅读类app服务端服务层的demo,这是用php语言实现的一个api接口模块。
本模块使用laraval框架。依赖另一个模块提供rpc服务（https://github.com/mystories/service.git）。

安装
------------


从github下载源码:

```
git clone https://github.com/mystories/api.git
```

运行
------------

根据自己习惯配置好apache或者nginx即可, 需要对PHP和laravel有一定的了解。
下面是一个示例的apache配置:

```
<VirtualHost *:8092>
        DocumentRoot "/work/mystories/api/public"
        <IfModule mod_rewrite.c>
                RewriteEngine on
                RewriteRule !\.(txt|js|css|png|gif|jpg|html|php|gz)$  /index.php [QSA,PT,L]
        </IfModule>
        <Directory "/work/mystories/api/public">
                 Options Indexes FollowSymLinks
                 AllowOverride None
                 AllowOverride All
                 Allow from all
                 Require all granted
        </Directory>
</VirtualHost>
```

启动后,在浏览器输入下面的url即可测试接口:

```
http://localhost:8092/article
```

文档
------------

* article:获取文章列表

* article/{id}:获取文章详情

