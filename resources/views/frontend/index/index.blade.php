<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>CowCat - Laravel CMS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CowCat is a Free, open-source CMS based on the Laravel PHP Framework">
    <meta name="keywords" content="CowCat,奶牛猫,Laravel,CMS,Laravel CMS,CowCat CMS">
    <meta name="author" content="Luis">
    <link rel="stylesheet" href="{{elixir('assets/frontend/css/app.min.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader
============================================= -->
<div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
<!-- Header
============================================= -->
<section class="main-header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="/assets/frontend/img/logo/logo.png" class="img-responsive" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                <div class="col-md-8 col-xs-12 nav-wrap">
                    <ul class="nav navbar-nav">
                        <li><a href="#owl-hero" class="page-scroll" style="text-transform: none;">CowCat</a></li>
                        <li><a href="#services" class="page-scroll">功能特点</a></li>
                        <li><a href="#portfolio" class="page-scroll">页面预览</a></li>
                        <li><a href="#team" class="page-scroll">团队成员</a></li>
                        <li><a href="#contact" class="page-scroll">联系我们</a></li>
                    </ul>
                </div>
                <div class="social-media hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        <li><a target="_blank" href="https://github.com/luisedware/CowCat"><i class="fa fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="owl-hero" class="owl-carousel owl-theme">
        <div class="item" style="background-image: url(http://o93kt6djh.bkt.clouddn.com/slide-tianmao.jpeg)">
            <div class="caption">
                <h6>我叫天猫</h6>
                <h1>工作是<span>卖萌</span></h1>
                <a class="btn btn-transparent" href="https://github.com/luisedware/CowCat" target="_blank">
                    点赞
                </a>
                <a class="btn btn-transparent" href="#">打赏</a>
            </div>
        </div>
        <div class="item" style="background-image: url(http://o93kt6djh.bkt.clouddn.com/slide-summer.jpeg)">
            <div class="caption">
                <h6>我叫 <span>Summer</span></h6>
                <h1>工作也是<span>卖萌</span></h1>
                <a class="btn btn-transparent" href="https://github.com/luisedware/CowCat" target="_blank">
                    点赞
                </a>
                <a class="btn btn-transparent" href="#">打赏</a>
            </div>
        </div>
    </div>
</section>

<!-- Welcome
============================================= -->
<section id="welcome">
    <div class="container">
        <h2>天猫：欢迎大家使用 <span style="text-transform: none;">CowCat </span>,喵!</h2>
        <hr class="sep">
        <p>Summer：数据库里还有很多我们的私房照,喜欢我们就赶紧把项目搭起来吧!</p>
        <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="http://o93kt6djh.bkt.clouddn.com/WechatIMG13.jpeg" alt="logo"
             style="width: 175px;height: 100%;border-radius: 10px;">
    </div>
</section>

<!-- Services
============================================= -->
<section id="services">
    <div class="container">
        <h2>功能特点</h2>
        <hr class="light-sep">
        <p>Features</p>
        <div class="services-box">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-lightbulb"></span></div>
                    <div class="media-body">
                        <h3>简单易用</h3>
                        <p>得益于 Laravel 社区的繁荣</p>
                        <p>和 CowCat 功能开发的定位</p>
                        <p>即便是新手也能进行二次开发</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-mobile"></span></div>
                    <div class="media-body">
                        <h3>响应式设计</h3>
                        <p>后台基于响应式模板 AdminLTE 开发</p>
                        <p>前端使用了 RISE-Multipurpose 模板</p>
                        <p>完美兼容不同屏幕尺寸</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media-left"><span class="icon-lock"></span></div>
                    <div class="media-body">
                        <h3>权限系统</h3>
                        <p>基于 Zizaco/entrust 权限组件开发</p>
                        <p>配合 CowCat 的 RBAC 表结构</p>
                        <p>方便地扩展业务和功能的权限管理</p>
                    </div>
                </div>
                <div class="row wow fadeInUp" data-wow-delay=".6s">
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-adjustments"></span></div>
                        <div class="media-body">
                            <h3>安全稳健</h3>
                            <p>基于 2015 年的 Laravel 5.1 进行开发</p>
                            <p>自发布起提供两年时间的 Bug 修复</p>
                            <p>三年时间的安全修复</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-chat"></span></div>
                        <div class="media-body">
                            <h3>中英文支持</h3>
                            <p>Laravel 本地化功能非常易用</p>
                            <p>基于它简单实现了多语言支持</p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-desktop"></span></div>
                        <div class="media-body">
                            <h3>架构良好</h3>
                            <p>遵循面向对象的单一职责</p>
                            <p>基于 MVC 架构加入 Repository、</p>
                            <p>Presenter、Service层,代码解耦</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio
============================================= -->
<section id="portfolio">
    <div class="container-fluid">
        <h2>页面预览</h2>
        <hr class="sep">
        <p>Page Preview</p>
        <div class="row">
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a class="portfolio-box" href="http://o93kt6djh.bkt.clouddn.com/cowcat-1.Login.png" data-lightbox="image-1" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-1.Login.png" class="img-responsive" alt="1">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                登录认证
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a href="http://o93kt6djh.bkt.clouddn.com/cowcat-2.Index.png" class="portfolio-box" data-lightbox="image-2" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-2.Index.png" class="img-responsive" alt="2">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                后台首页
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a href="http://o93kt6djh.bkt.clouddn.com/cowcat-3.Menu.png" class="portfolio-box" data-lightbox="image-3" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-3.Menu.png" class="img-responsive" alt="3">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                菜单管理
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a href="http://o93kt6djh.bkt.clouddn.com/cowcat-4.Log.png" class="portfolio-box" data-lightbox="image-4" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-4.Log.png" class="img-responsive" alt="4">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                系统日志
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a href="http://o93kt6djh.bkt.clouddn.com/cowcat-5.Permission.png" class="portfolio-box" data-lightbox="image-5" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-5.Permission.png" class="img-responsive" alt="5">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                权限系统
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                <a href="http://o93kt6djh.bkt.clouddn.com/cowcat-6.Assocate.png" class="portfolio-box" data-lightbox="image-6" data-title="Your caption">
                    <img src="http://o93kt6djh.bkt.clouddn.com/cowcat-6.Assocate.png" class="img-responsive" alt="6">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded" style="text-transform: none;">
                                CowCat CMS
                            </div>
                            <div class="project-name">
                                用户授权
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Some Fune Facts
============================================= -->
<section id="fun-facts">
    <div class="container">
        <h2 style="text-transform: none;">Github Profile</h2>
        <hr class="light-sep">
        <div class="row wow fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-4">
                <span class="fa fa-eye"></span>
                <h2 class="number timer">21</h2>
                <h4>Watch</h4>
            </div>
            <div class="col-lg-4">
                <span class="fa fa-star"></span>
                <h2 class="number timer">175</h2>
                <h4>Star</h4>
            </div>
            <div class="col-lg-4">
                <span class="fa fa-code-fork"></span>
                <h2 class="number timer">48</h2>
                <h4>Fork</h4>
            </div>
        </div>
    </div>
</section>
<!-- Some Fune Facts
============================================= -->
<section id="team">
    <div class="container">
        <h2>团队成员</h2>
        <hr class="sep">
        <p>Team Member</p>
        <div class="row wow fadeInUp" data-wow-delay=".3s">
            <div class="col-md-4">
                <div class="team">
                    <img class="img-responsive center-block" src="http://o93kt6djh.bkt.clouddn.com/WechatIMG3.jpeg" alt="1">
                    <h4>天猫</h4>
                    <p>高级卖萌工程师</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team">
                    <img class="img-responsive center-block" src="http://o93kt6djh.bkt.clouddn.com/WechatIMG6.jpeg" alt="3">
                    <h4 style="text-transform: none;">Summer</h4>
                    <p>高级卖萌工程师</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team">
                    <img class="img-responsive center-block" src="http://o93kt6djh.bkt.clouddn.com/WechatIMG12.jpeg" alt="2">
                    <h4 style="text-transform: none;">Luis</h4>
                    <p>PHP 铲屎员</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials
============================================= -->
<section id="testimonials">
    <div class="container">
        <h2>Testimonials</h2>
        <hr class="light-sep">
        <p>What Clients Say About Us</p>
        <div id="owl-testi" class="owl-carousel owl-theme">
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>I’am amazed, I should say thank you so much for your awesome template. Design is so
                        good and neat, every detail has been taken care these team are realy amazing and talented! I
                        will
                        work only with <span>CowCat</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>I’am amazed, I should say thank you so much for your awesome template. Design is so
                        good and neat, every detail has been taken care these team are realy amazing and talented! I
                        will
                        work only with <span>CowCat</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
            <div class="item">
                <div class="quote">
                    <i class="fa fa-quote-left left fa-2x"></i>
                    <h5>I’am amazed, I should say thank you so much for your awesome template. Design is so
                        good and neat, every detail has been taken care these team are realy amazing and talented! I
                        will
                        work only with <span>CowCat</span>.<i class="fa fa-quote-right right fa-2x"></i></h5>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us
============================================= -->
<section id="contact">
    <div class="container">
        <h2>联系我们</h2>
        <hr class="sep">
        <p>Contact Us</p>
        <div class="col-md-6 col-md-offset-3 wow fadeInUp" data-wow-delay=".3s">
            <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="Name" placeholder="姓名">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="Email" placeholder="邮箱">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="想要对我们说些啥"></textarea>
                </div>
                <a href="#" class="btn-block">提交</a>
            </form>
        </div>
    </div>
</section>
<!-- Footer
============================================= -->
<footer>
    <div class="container">
        <h1 style="text-transform: none;">CowCat</h1>
        <div class="social">
            <a target="_blank" href="https://github.com/luisedware/CowCat"><i class="fa fa-github"></i></a>
        </div>
        <h6 style="text-transform:none;">&copy; 2016 CowCat Developed By 天猫,Summer and Luis</h6>
    </div>
</footer>
<script src="{{elixir("assets/frontend/js/app.min.js")}}"></script>
</body>

</html>