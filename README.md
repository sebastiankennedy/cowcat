## 暂停维护

由于新公司使用 Yii 2 作为唯一的开发框架,所以打算接下来的时间都放在学习 Yii 2 上。
等到 Laravel 5 LTS 出来之后,再结合学习 Yii2 的经验重构本项目。


## CowCat CMS

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

Free,open-source CMF based on the Laravel PHP Framework

## 功能特点（Features）

* 简单易用（Simple and easy to use）
* 日志管理（Log Manager）
* 用户验证（Auth Manager）
* 用户管理（User Manager）
* 菜单管理（Menu Manager）
* 操作管理（Action Manager）
* 中英文切换（Switch in Chinese and English）
* 角色与权限管理（Roles & Permissions Manager）
* 模型视图分层，代码解耦（Repository && Presenters && Services）

## 页面预览（Page PreView）


<!-- ![](http://o93kt6djh.bkt.clouddn.com/cowcat-1.Login.png) -->

![](http://o93kt6djh.bkt.clouddn.com/cowcat-2.Index.png)

![](http://o93kt6djh.bkt.clouddn.com/cowcat-3.Menu.png)

![](http://o93kt6djh.bkt.clouddn.com/cowcat-4.Log.png)

<!-- ![](http://o93kt6djh.bkt.clouddn.com/cowcat-5.Permission.png) -->

<!-- ![](http://o93kt6djh.bkt.clouddn.com/cowcat-6.Assocate.png) -->


## 环境要求（Requirements）

- **PHP : 5.6**
- **Laravel : 5.1.***
- **Composer**

## 我的开发环境（My Development Environment）

- Homebrew
- PHP - 7.0.7
- Redis - 3.2.0
- Nginx - 1.10.1
- MySQL - 5.7.13

## 安装步骤（Installation）

1. **`git clone https://github.com/luisedware/CowCat.git`**
1. **`cd CowCat`**
1. **`sudo vi .env`**
1. **`sudo chmod -R 777 storage/`**
1. **`sudo composer install`**
1. **`sudo npm install`**
1. **`gulp`**
1. **`php artisan migrate:refresh --seed`**
1. **`php artisan serve`**
1. **`gulp watch`**

> 默认账号: user@qq.com / admin@qq.com 密码: 123456

## 感谢（Thanks）

- Site
	- [PHPHub](https://phphub.org/)
	- [LaraBase](http://laravelbase.com/)
	- [Laravel.So](http://laravel.so/)
	- [Laravel 学院](http://laravelacademy.org/)
- Project
	- [BootstrapCMS/CMS](https://github.com/BootstrapCMS/CMS)
	- [yccphp/laravel-5-blog](https://github.com/yccphp/laravel-5-blog)
	- [yuansir/laravel5-rbac-example](https://github.com/yuansir/laravel5-rbac-example)
	- [rappasoft/laravel-5-boilerplate](https://github.com/rappasoft/laravel-5-boilerplate)
- PHP Package
	- [zizaco/entrust](https://github.com/Zizaco/entrust)
	- [orangehill/iseed](https://github.com/orangehill/iseed)
	- [arcanedev/log-viewer](https://packagist.org/packages/arcanedev/log-viewer)
	- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
	- [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- Javascript Package
	- [ztree](https://github.com/uibox/ztree)
	- [admin-lte](http://github.com/almasaeed2010/AdminLTE)
	- [sweetalert](https://github.com/t4t5/sweetalert)


## 开源协议（License）

[MIT License](http://opensource.org/licenses/MIT)
