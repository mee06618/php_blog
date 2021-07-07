<?php
if (isset($pageTitle) == false) {
    $pageTitle = "";
}

$application = $this->getApplication();
$envCode = $application->getEnvCode();
$prodSiteDomain = $application->getProdSiteDomain();
$isLogined = $_REQUEST['App__isLogined'];
$loginedMemberId = $_REQUEST['App__loginedMemberId'];
$loginedMember = $_REQUEST['App__loginedMember'];



?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
<script type="text/javascript">

console.clear();


function MobileTopBar__init() {
  $('.mobile-top-bar__btn-show-side-bar').click(function() {
    alert("dfdfd");
    MobileSideBar__show();
  });
}

function MobileSideBar__init() {
  $('.mobile-side-bar, .mobile-side-bar__btn-close').click(function() {
    MobileSideBar__hide();
  });
  
  $('.mobile-side-bar__content').click(function() {
    return false;
  });
}

// 모바일 사이드바 숨김
function MobileSideBar__hide() {
  $('.mobile-side-bar').removeClass('active');
  $('html').removeClass('mobile-side-bar-actived');
  MobileMenuBox1__hide();
}

// 모바일 사이드바 노출
function MobileSideBar__show() {
  alert("dfdfd123123");
  $('.mobile-side-bar').addClass('active');
  $('html').addClass('mobile-side-bar-actived');
}

function MobileMenuBox1__init() {
  
  $('.mobile-menu-box-1 ul > li').click(function() {
    let $this = $(this);
    
    $this.siblings('.active').find('.active').removeClass('active');
    $this.siblings('.active').removeClass('active');
    
    if ( $this.hasClass('active') ) {
      $this.find('.active').removeClass('active');
      $this.removeClass('active');
    }
    else {
      $this.addClass('active');
    }
  });
  
  $('.mobile-menu-box-1 ul').click(function() {
    return false;
  });
}

function MobileMenuBox1__hide() {
  $('.mobile-menu-box-1 .active').removeClass('active');
}


MobileTopBar__init();
MobileSideBar__init();
MobileMenuBox1__init();
</script>


    <!-- 제이쿼리 불러오기 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- 폰트어썸 불러오기 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- 테일윈드 불러오기 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css"/>
    <!-- 데이지UI 불러오기, 테일윈드 필요 -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="/resource/common.css">

    <?php if ($envCode == 'prod') { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZNXX3J5N1S"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-ZNXX3J5N1S');
        </script>
    <?php } ?>

    <?php require_once "meta.php"; ?>

</head>
<body>
<div class="site-wrap min-h-screen flex flex-col pt-10">
<div class="mobile-side-bar md:hidden fixed inset-0 z-50 invisible opacity-0 text-black">
  <div class="mobile-side-bar__content flex flex-col w-80 h-full bg-white ml-auto">
    <div class="mobile-side-bar__head flex-shrink-0 p-3">
        <div class="mobile-side-bar__btn-close ml-auto w-8 h-8 relative cursor-pointer">
          <div class="absolute bg-black inset-x-0 h-1/5"></div>
          <div class="absolute bg-black inset-x-0 h-1/5"></div>
      </div>
     <div class="mobile-side-bar__body flex-grow overflow-y-auto">
        <nav class="mobile-menu-box-1">
         <ul>
          <li>
            <a href="#">1차 메뉴 아이템 01</a>
            <ul>
              <li><a href="#">2차 메뉴 아이템 1</a></li>
              <li><a href="#">2차 메뉴 아이템 2</a></li>
              <li><a href="#">2차 메뉴 아이템 3</a></li>
              <li>
                <a href="#">2차 메뉴 아이템 4</a>
                <ul>
                  <li>
                    <a href="#">3차 메뉴 아이템 1</a>
                  </li>
                  <li><a href="#">3차 메뉴 아이템 2</a></li>
                  <li><a href="#">3차 메뉴 아이템 3</a></li>
                  <li><a href="#">3차 메뉴 아이템 4</a></li>
                  <li><a href="#">3차 메뉴 아이템 5</a></li>
                </ul>
              </li>
              <li>
                <a href="#">2차 메뉴 아이템 5</a>
                <ul>
                  <li><a href="#">3차 메뉴 아이템 1</a></li>
                  <li><a href="#">3차 메뉴 아이템 2</a></li>
                  <li><a href="#">3차 메뉴 아이템 3</a></li>
                  <li><a href="#">3차 메뉴 아이템 4</a></li>
                  <li><a href="#">3차 메뉴 아이템 5</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">1차 메뉴 아이템 02</a>
            <ul>
              <li><a href="#">2차 메뉴 아이템 1</a></li>
              <li><a href="#">2차 메뉴 아이템 2</a></li>
              <li><a href="#">2차 메뉴 아이템 3</a></li>
              <li><a href="#">2차 메뉴 아이템 4</a></li>
              <li><a href="#">2차 메뉴 아이템 5</a></li>
            </ul>    
          </li>
          <li>
            <a href="#">1차 메뉴 아이템 03</a>    
          </li>
          <li><a href="#">1차 메뉴 아이템 04</a></li>
          <li><a href="#">1차 메뉴 아이템 05</a></li>
          <li><a href="#">1차 메뉴 아이템 06</a></li>
          <li><a href="#">1차 메뉴 아이템 07</a></li>
          <li><a href="#">1차 메뉴 아이템 08</a></li>
          <li><a href="#">1차 메뉴 아이템 09</a></li>
          <li><a href="#">1차 메뉴 아이템 10</a></li>
        </ul>
          </nav>
      </div>
    </div>
  
  </div>
  </div>
<header class="top-bar hidden md:block fixed top-0 inset-x-0 bg-gray-500 text-white h-12">

        <div class="container mx-auto h-full flex">
            <a href="/" class="top-bar__logo px-5 flex items-center">
                <span><i class="fas fa-lemon"></i></span>
                <span class="ml-2 font-bold hidden sm:inline">ING BLOG</span>
            </a>

            <div class="flex-grow"></div>

            <nav class="menu-box-1">
                <ul class="flex h-full">
                    <li class="hover:bg-white hover:text-black">
                        <a href="/" class="h-full flex items-center px-5">
                            <span><i class="fas fa-home"></i></span>
                            <span class="ml-2 font-bold hidden sm:inline">HOME</span>
                        </a>
                    </li>
                    <li class="hover:bg-white hover:text-black">
                        <a href="/usr/home/aboutMe" class="h-full flex items-center px-5">
                            <span><i class="far fa-id-card"></i></span>
                            <span class="ml-2 font-bold hidden sm:inline">ABOUT ME</span>
                        </a>
                    </li>
                    <?php if ($isLogined) { ?>
                        <li class="hover:bg-white hover:text-black">
                            <a href="/usr/member/doLogout" class="h-full flex items-center px-5">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span class="ml-2 font-bold hidden sm:inline">LOGOUT</span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="hover:bg-white hover:text-black">
                            <a href="/usr/member/login" class="h-full flex items-center px-5">
                                <span><i class="fas fa-sign-in-alt"></i></span>
                                <span class="ml-2 font-bold hidden sm:inline">LOGIN</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    
  <header class="top-mobile-bar block md:hidden fixed top-0 inset-x-0 bg-gray-500 text-white h-12">
   
   <div class="container mx-auto h-full flex items-center">
   <div class="flex-1"></div>
       <a href="/" class="top-bar__logo flex items-center ml-4">
           <span><i class="fas fa-lemon"></i></span>
           <span class="ml-2 font-bold sm:inline">ING BLOG</span>
       </a>
       <div class="flex-1 flex justify-end"><span class="mobile-top-bar__btn-show-side-bar  cursor-pointer flex items-center mr-3">버튼</span>
       </div>
 
         
    
   </div>
</header>





<main class="flex-grow">
    <section class="section-title mt-5 text-2xl font-bold">
            <h1 class="container mx-auto">
                <div class="con-pad">
                    <span><?= $pageTitleIcon ?></span>
                    <span><?= $pageTitle ?></span>
                </div>
            </h1>
        </section>
        </div>
 
 
 </div>
</body>

</html>