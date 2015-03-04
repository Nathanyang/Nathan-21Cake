# Nathan-21Cake
nathan copy a 21Cake Web
=======================================

Create Bundle
---------------------------------------
    1. php ./app/console generate:bundle
        enter Bundle namespace: NathanDessert/CakeBundle
        Configuration format (yml, xml, php, or annotation): annotation
    2. 使用Twig整合HTML5Boilerplate
    3. 资源install
        php ./app/console assets:install web 硬拷贝
        php ./app/console assets:install web [--symlink] [--relative] 软连接形式
        页面上使用{{ asset("bundles/nathandessertcake") }} /(css/js/font/images)files

        {% javascripts '@NathanDessertCakeBundle/Resources/public/js/*' %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
        1) need to modify app/config/config.yml
        2) then go to assetic:
        3) under assetic: go to bundles: []
        4) and in bundles: [] //type your bundle name
        for instance if your bundle is Acme\DemoBundle, then do the following
        assetic:
            bundles: [ AcmeDemoBundle ]
        or you just need to comment (with #) the line bundles: []
    4. 删掉一个bundle需同时清空app/cache 文件夹，删除app/AppKernel.php 文件中的注册信息，删除app/config/routing.yml中的路由信息
    5. coffee script
        node 安装好后需要设置系统变量，这一步非常关键。进入我的电脑→属性→高级→环境变量。在系统变量下新建“NODE_PATH”，输入“D:\Program Files\nodejs\node_global\node_modules”。
        npm i -g coffee-script/（npm install -g coffee-script）
        注意：需要将node_global添加到windows环境变量
        coffee -v ok
        Symfony 支持的 filters: 查看文件vendor/symfony/assetic-bundle/Resources/config/filters

        npm config get cache
        D:\Program Files\nodejs\node_cache
        npm config get globalconfig 全局配置文件
        old D:\Program Files\node_modules\node_global\etc\npmrcclear
        npm config get globalignorefile
        D:\Program Files\nodejs\node_global\etc\npmignore
        npm config get prefix
        D:\Program Files\nodejs\node_global

        npm config set cache D:\nodeJsProgramFiles\nodejs\node_cache
        npm config set globalconfig D:\nodeJsProgramFiles\node_modules\node_global\etc\npmrcclear
        npm config set globalignorefile  D:\nodeJsProgramFiles\nodejs\node_global\etc\npmignore
        npm config set prefix  D:\nodeJsProgramFiles\nodejs\node_global 主要是这句配置起作用了










