<?php
$pageTitleIcon = '<i class="fas fa-list"></i>';
$pageTitle = "최신 게시물 리스트";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<?php if ( $isLogined ) { ?>
<script>
console.clear();

// 유튜브 플러그인 시작
function youtubePlugin() {
  toastui.Editor.codeBlockManager.setReplacer("youtube", function (youtubeId) {
    // Indentify multiple code blocks
    const wrapperId = "yt" + Math.random().toString(36).substr(2, 10);

    // Avoid sanitizing iframe tag
    setTimeout(renderYoutube.bind(null, wrapperId, youtubeId), 0);

    return '<div id="' + wrapperId + '"></div>';
  });
}

function renderYoutube(wrapperId, youtubeId) {
  const el = document.querySelector('#' + wrapperId);
  
  var urlParams = getUrlParams(youtubeId);

  var width = '100%';
  var height = '100%';
  
  if ( urlParams.width ) {
    width = urlParams.width;
  }

  if ( urlParams.height ) {
    height = urlParams.height;
  }
  
  var maxWidth = 500;
  
  if ( urlParams['max-width'] ) {
    maxWidth = urlParams['max-width'];
  }
  
  var ratio = '16-9';
  
  if ( urlParams['ratio'] ) {
    ratio = urlParams['ratio'];
  }
  
  var marginLeft = 'auto';
  
  if ( urlParams['margin-left'] ) {
    marginLeft = urlParams['margin-left'];
  }
  
  var marginRight = 'auto';
  
  if ( urlParams['margin-right'] ) {
    marginRight = urlParams['margin-right'];
  }
  
  if ( youtubeId.indexOf('?') !== -1 ) {
    var pos = youtubeId.indexOf('?');
    youtubeId = youtubeId.substr(0, pos);
  }
  
  el.innerHTML = '<div style="max-width:' + maxWidth + 'px; margin-left:' + marginLeft + '; margin-right:' + marginRight + ';" class="ratio-' + ratio + ' relative"><iframe class="abs-full" width="' + width + '" height="' + height + '" src="https://www.youtube.com/embed/' + youtubeId + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
}
// 유튜브 플러그인 끝

// repl 플러그인 시작
function replPlugin() {
  toastui.Editor.codeBlockManager.setReplacer("repl", function (replUrl) {
    var postSharp = "";
    if ( replUrl.indexOf('#') !== -1 ) {
      var pos = replUrl.indexOf('#');
      postSharp = replUrl.substr(pos);
      replUrl = replUrl.substr(0, pos);
    }

    if ( replUrl.indexOf('?') === -1 ) {
      replUrl += "?dummy=1";
    }

    replUrl += "&lite=true";
    replUrl += postSharp;

    // Indentify multiple code blocks
    const wrapperId = `yt${Math.random().toString(36).substr(2, 10)}`;

    // Avoid sanitizing iframe tag
    setTimeout(renderRepl.bind(null, wrapperId, replUrl), 0);

    return "<div id=\"" + wrapperId + "\"></div>";
  });
}

function renderRepl(wrapperId, replUrl) {
  const el = document.querySelector(`#${wrapperId}`);

  var urlParams = getUrlParams(replUrl);

  var height = 400;

  if ( urlParams.height ) {
    height = urlParams.height;
  }

  el.innerHTML = '<iframe height="' + height + 'px" width="100%" src="' + replUrl + '" scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-modals"></iframe>';
}
// repl 플러그인 끝

// codepen 플러그인 시작
function codepenPlugin() {
  toastui.Editor.codeBlockManager.setReplacer("codepen", function (codepenUrl) {
    // Indentify multiple code blocks
    const wrapperId = `yt${Math.random().toString(36).substr(2, 10)}`;

    // Avoid sanitizing iframe tag
    setTimeout(renderCodepen.bind(null, wrapperId, codepenUrl), 0);

    return '<div id="' + wrapperId + '"></div>';
  });
}

function renderCodepen(wrapperId, codepenUrl) {
  const el = document.querySelector(`#${wrapperId}`);

  var urlParams = getUrlParams(codepenUrl);

  var height = 400;

  if ( urlParams.height ) {
    height = urlParams.height;
  }
  
  var width = '100%';

  if ( urlParams.width ) {
    width = urlParams.width;
  }
  
  if ( !isNaN(width) ) {
    width += 'px';
  }
  
  if ( codepenUrl.indexOf('#') !== -1 ) {
    var pos = codepenUrl.indexOf('#');
    codepenUrl = codepenUrl.substr(0, pos);
  }

  el.innerHTML = '<iframe height="' + height + '" style="width: ' + width + ';" scrolling="no" title="" src="' + codepenUrl + '" frameborder="no" allowtransparency="true" allowfullscreen="true"></iframe>';
}
// repl 플러그인 끝

// lib 시작
String.prototype.replaceAll = function(org, dest) {
  return this.split(org).join(dest);
}

function getUrlParams(url) {
  url = url.trim();
  url = url.replaceAll('&amp;', '&');
  if ( url.indexOf('#') !== -1 ) {
    var pos = url.indexOf('#');
    url = url.substr(0, pos);
  }
  
  var params = {};
  
  url.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str, key, value) { params[key] = value; });
  return params;
}
// lib 끝

function Editor__init() {
  $('.toast-ui-editor').each(function(index, node) {
    var initialValue = $(node).prev().html().trim().replace(/t-script/gi, 'script');
    
    var editor = new toastui.Editor({
      el: node,
      previewStyle: 'vertical',
      initialValue: initialValue,
      height:600,
      plugins: [toastui.Editor.plugin.codeSyntaxHighlight, youtubePlugin, replPlugin, codepenPlugin]
    });
  });
}

function EditorViewer__init() {
  $('.toast-ui-viewer').each(function(index, node) {
    var initialValue = $(node).prev().html().trim().replace(/t-script/gi, 'script');
    var viewer = new toastui.Editor.factory({
      el: node,
      initialValue: initialValue,
      viewer:true,
      plugins: [toastui.Editor.plugin.codeSyntaxHighlight, youtubePlugin, replPlugin, codepenPlugin]
    });
  });
}

$(function() {
  Editor__init();
  EditorViewer__init();
});
</script>
<style>
.toast-youtube-embed {
  position:relative;
}

.ratio-16-9::after {
  content:"";
  display:block;
  padding-top:56.25%;
}

.ratio-1-1::after {
  content:"";
  display:block;
  padding-top:100%;
}

.relative {
  position:relative;
}

.abs-full {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}

.toast-ui-youtube-plugin-wrap {
  max-width:500px;
  margin-left:auto;
  margin-right:auto;
  position:relative;
}

.toast-ui-youtube-plugin-wrap > iframe {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
}

.toast-ui-youtube-plugin-wrap::before {
  content:"";
  display:block;
  padding-top:calc(100% / 16 * 9);
}

.toast-ui-codepen-plugin-wrap > iframe {
  width:100%;
}
</style>
<section class="section-article-menu">
  <div class="container mx-auto">
    <a href="write" class="btn btn-link">글 작성</a>
  </div>
</section>
<hr>

<?php } ?>

<section class="section-articles mt-4">
  <div class="container mx-auto">
    <div class="con-pad">

      <div>
        <div class="badge badge-primary badge-outline">게시물 수</div>
        <?=$totalCount?>
      </div>

      <hr class="mt-4">

      <div>
        <?php foreach ( $articles as $article ) { ?>
          <div class="py-5">
            <?php
            $detailUri = "detail?id=${article['id']}";
            $body = str_replace('<script', '<t-script>', $article['body']);
            $body = str_replace('</script>', '</t-script>', $article['body']);
            ?>
            <div>
              <div class="badge badge-primary badge-outline">번호</div>
              <a href="<?=$detailUri?>"><?=$article['id']?></a>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">제목</div>
              <a href="<?=$detailUri?>"><?=$article['title']?></a>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">작성자</div>
              <?=$article['extra__writerName']?>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">작성날짜</div>
              <?=$article['regDate']?>
            </div>
            <div class="mt-2">
              <div class="badge badge-primary badge-outline">수정날짜</div>
              <?=$article['updateDate']?>
            </div>
            <div class="mt-2">
              <script type="text/x-template"><?=$body?></script>
              <div class="toast-ui-viewer"></div>
            </div>
          </div>
          <hr>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- 하이라이트 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/default.min.css">

<!-- 토스트 UI 에디터, 자바스크립트 코어 -->
<script src="https://uicdn.toast.com/editor/2.5.2/toastui-editor-all.min.js" defer></script>

<!-- 코드 미러 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.1/codemirror.min.css" />
<!-- 토스트 UI 에디터, CSS 코어 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/2.5.2/toastui-editor.min.css" />

<!-- 토스트 UI 에디터, 신택스 하이라이트 플러그인 추가 -->
<script src="https://uicdn.toast.com/editor-plugin-code-syntax-highlight/3.0.0/toastui-editor-plugin-code-syntax-highlight.min.js" defer></script>

  <section>
  <script type="text/x-template">
# CSS
## 6월9일
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [ ] 의식해서 디자인에 신경썻다
### 이미지 관련
- 이미지 변환 시간주기
```css
 transition: transform (원하는 시간)s;
/*background-color 1s; 는 색변하는 시간*/
```
- 이미지 z축으로 순서 정하기
```css
z-index:원하는 순서; 
/*0이 기본*/
/* position:static이면 안됨*/
```
- 이미지 크기 조절
```css
transform:scale(1.4);
/* 이미지가 넘친다면 overflow:hidden;*/
```
```codepen
https://codepen.io/mee06618/embed/bGqxpxx?height=365&theme-id=light&default-tab=css,result
```
  </script>
  <div class="toast-ui-viewer"></div>
</section>

  <section>
  <script type="text/x-template">
# CSS
## 6월10일
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [x] 의식해서 디자인에 신경썻다
### transform속성
- 이미지 확대/축소
```css
  - transform:scale() - X 또는 Y축으로 확대/ 축소
      - transform:scaleX(x축 비율); 
      - transform:scaleY(y축 비율);          // y축으로 확대, 축소
      - transform:scale(x축 비율, y축 비율);  // x축, y축으로 확대, 축소
```
- 이미지 회전
```css
- transform:rotate() - 지정 요소 회전
      - transform:rotateX(Ndeg);  // x축 기준으로 N도 만큼 회전
      - transform:rotateY(Ndeg);  // y축 기준으로 N도 만큼 회전
      - transform:rotate(Ndeg);   // N도 만큼 회전
```
- 이미지 이동
```css
 - transform:translate() - 지정 요소 X 또는 Y축으로 이동
      - transform:translateX(10px);        // X축으로 10px 이동
      - transform:translateY(10px);        // Y축으로 10px 이동
      - transform:translate(-10px, -10px); // X축으로 -10px, Y축으로 -10px 이동
```
- 이미지 기울이기
```css
 - transform:skew() - 지정 요소 X 또는 Y축으로 기울이기
      - transform:skewX(Ndeg);             // x축으로 N도 만큼 기울이기
      - transform:skewY(Ndeg);             // y축으로 N도 만큼 기울이기
      - transform:skew(x축 Ndeg, y축 Ndeg); // x축, y축으로 N도 만큼 기울이기
```
- 이미지 기준점 변경
```css
 - transform-origin 속성 - 지정 요소의 기준점을 변경할 수 있습니다.
      - transform-origin:x축 y축;
```
```codepen
https://codepen.io/mee06618/embed/NWpLNYL?height=365&theme-id=light&default-tab=css,result
```
  </script>
  <div class="toast-ui-viewer"></div>
</section>
<section>
  <script type="text/x-template">
# CSS
## 6월11일
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [x] 의식해서 디자인에 신경썻다
### flex속성-1
- display	Flex : Container를 정의
```css
display: flex;// 지정된 Flex Container는 Block 요소와 같은 성향(수직 쌓임)을 가지며,
display: inline-flex// 지정된 Flex Container는 Inline(Inline Block) 요소와 같은 성향(수평 쌓임)을 가집니다.
```

- flex-direction : Flex Items의 주 축(main-axis)을 설정
```css

flex-direction:row	//Itmes를 수평축(왼쪽에서 오른쪽으로)으로 표시
flex-direction:row-reverse	//Items를 row의 반대 축으로 표시	
flex-direction:column	//Items를 수직축(위에서 아래로)으로 표시	
flex-direction:column-reverse	//Items를 column의 반대 축으로 표시
```


```codepen
https://codepen.io/mee06618/embed/rNyPLdg?height=265&theme-id=light&default-tab=css,result
```
  </script>
  <div class="toast-ui-viewer"></div>
</section>

<section>
  <script type="text/x-template">
# CSS
## 6월14일
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [x] 의식해서 디자인에 신경썻다
### flex속성-2
- flex-wrap :	Flex Items의 여러 줄 묶음(줄 바꿈) 설정
```css
flex-wrap:nowrap	//모든 Itmes를 여러 줄로 묶지 않음(한 줄에 표시)
flex-wrap:wrap	//Items를 여러 줄로 묶음	
flex-wrap:wrap-reverse	//Items를 wrap의 역 방향으로 여러 줄로 묶음	
```

- justify-content	주 축(main-axis)의 정렬 방법을 설정
```css
justify-content:flex-start	//Items를 시작점(flex-start)으로 정렬	flex-start
justify-content:flex-end	//Items를 끝점(flex-end)으로 정렬	
justify-content:center	//Items를 가운데 정렬	
justify-content:space-between	//시작 Item은 시작점에, 마지막 Item은 끝점에 정렬되고 나머지 Items는 사이에 고르게 정렬됨	
justify-content:space-around	//Items를 균등한 여백을 포함하여 정렬
```



```codepen
https://codepen.io/mee06618/embed/xxqMOaG?height=265&theme-id=light&default-tab=css,result
```
  </script>
  <div class="toast-ui-viewer"></div>
</section>

<section>
  <script type="text/x-template">
# CSS
## 6월15일
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [x] 의식해서 디자인에 신경썻다

- align-content	교차 축(cross-axis)의 정렬 방법을 설정(2줄 이상)
```css
align-content:stretch	//Container의 교차 축을 채우기 위해 Items를 늘림
align-content:flex-start	//Items를 시작점(flex-start)으로 정렬	
align-content:flex-end	//Items를 끝점(flex-end)으로 정렬	
align-content:center	//Items를 가운데 정렬	
align-content:space-between	//시작 Item은 시작점에, 마지막 Item은 끝점에 정렬되고 나머지 Items는 사이에 고르게 정렬됨	
align-content:space-around	//Items를 균등한 여백을 포함하여 정렬
```
- align-items	교차 축(cross-axis)에서 Items의 정렬 방법을 설정(1줄)
```css
align-items:stretch	//Container의 교차 축을 채우기 위해 Items를 늘림
align-items:flex-start	//Items를 각 줄의 시작점(flex-start)으로 정렬	
align-items:flex-end	//Items를 각 줄의 끝점(flex-end)으로 정렬	
align-items:center	//Items를 가운데 정렬	
align-items:baseline	//Items를 문자 기준선에 정렬
```

```codepen
https://codepen.io/mee06618/embed/rNyPLQX?height=265&theme-id=light&default-tab=css,result
```
  </script>
  <div class="toast-ui-viewer"></div>
</section>

<section>
  <script type="text/x-template">
# CSS
## 6월16일
### flex속성-4
- [ ] div,nav등 가시성 좋게 묶었다
- [x] 시작전에 구상하고 작업했다
- [x] 의식해서 디자인에 신경썻다
- flex-flow	: flex-direction와 flex-wrap의 단축 속성
```css
.flex-container {
  flex-flow: flex-direction flex-wrap; //두가지 기능을 동시에 사용
}
```

```codepen
https://codepen.io/mee06618/embed/rNyPLQX?height=265&theme-id=light&default-tab=html,result
```
  </script>
  <div class="toast-ui-viewer"></div>

  <div class="toast-ui-viewer"></div>
  </section>

  <section>
    <script type="text/x-template">
  # java
  ## 6월22일
  ### 서블릿 기본뼈대
  - [ ] div,nav등 가시성 좋게 묶었다
  - [x] 시작전에 구상하고 작업했다
  - [x] 의식해서 디자인에 신경썻다
  - flex-flow	: flex-direction와 flex-wrap의 단축 속성

  ```java
  .flex-container {
    import javax.servlet.http.*;

    @SuppressWarnings("serial")
    public class 클래스명 extends HttpServlet {

        public void doGet(HttpServletRequest request,
                HttpServletResponse response)
                throws IOException {

            ……여기에 GET 처리를 쓴다……

        }

        public void doPost(HttpServletRequest request,
                HttpServletResponse response)
                throws IOException {

            ……여기에 POST 처리를 쓴다……

        }
  }
  ```

    </script>
    <div class="toast-ui-viewer"></div>
      # java
      ## 6월23일
      ### 서블릿 기본뼈대
      - [ ] div,nav등 가시성 좋게 묶었다
      - [x] 시작전에 구상하고 작업했다
      - [x] 의식해서 디자인에 신경썻다
      - flex-flow	: flex-direction와 flex-wrap의 단축 속성

      ```java
      .flex-container {
        import javax.servlet.http.*;

        @SuppressWarnings("serial")
        public class 클래스명 extends HttpServlet {

            public void doGet(HttpServletRequest request,
                    HttpServletResponse response)
                    throws IOException {

                ……여기에 GET 처리를 쓴다……

            }

            public void doPost(HttpServletRequest request,
                    HttpServletResponse response)
                    throws IOException {

                ……여기에 POST 처리를 쓴다……

            }
      }
      ```

        </script>
        <div class="toast-ui-viewer"></div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>
