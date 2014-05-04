<?php 
require_once('config.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.3) 1.0//EN" "i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1">
<link rel="shortcut icon" href="http://picsy.t-tu.com/image/favicon.ico">
<meta property="og:title" content="<?php echo SERVICE_NAME;?>" >
<meta property="og:type" content="<?php echo SERVICE_SCHEMA?>" >
<meta property="og:url" content="<?php echo SITE_URL?>" >
<meta property="og:image" content="http://picsy.t-tu.com/image/logo_squ.png">
<meta property="fb:admins" content="1667345770" >
<meta property="fb:app_id" content="1420328568182173" >
<meta property="og:site_name" content="<?php echo SERVICE_NAME;?>" />
<meta property="og:description" content="<?php echo SERVICE_SCHEMA?>" />
<link rel="apple-touch-icon-precomposed" href="http://picsy.t-tu.com/image/logo_squ.png" >

	
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<link href="http://picsy.t-tu.com/css/bootstrap.min.css" rel="stylesheet">
<link href="http://picsy.t-tu.com/css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href="style.css" rel="stylesheet">
<link href="http://picsy.t-tu.com/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="shortcut icon"  href="image/favicon.ico" />
<title> <?php echo SERVICE_NAME;?></title>
</head>

<body style="">
<div class="container-fluid">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
		<div class="container">
			<a href="./"><img class="logo" src="image/logo.png"></a>
		
			<ul class="nav pull-right" >
				<!--li class="active" style="padding-top:5px;"><a href="index.php">Home</a></li-->
				<li style="padding-top:5px;"><a href="faq.php">FAQ</a></li>
				<!--li>　</li-->
				<li><a href="getToken.php" class="btn btn-large btn-custom">Login</a></li>
			</ul>
			
		</div>
    </div>
</div><!--navbar-->

<!-- ナビゲーションバー以下開始 -->
<div style="padding-top:80px;">
	<div class="text-center">

	<p class="top-catch">
		<nobr>もっと速く</nobr> <nobr>もっと見やすく</nobr>
	</p>
	<br>
	<p class="top-schema">
	<nobr>タイムライン上の写真を</nobr> <nobr>よりあなたのそばに。</nobr>
	</p>
	<br>
	<img class="schema" src="image/insta-twi.png">
	<br>
	<p class="top-schema">
	<nobr> PicsyはInstagramの写真を</nobr>
	<nobr><font color="#00B0F0">Twitter</font>へ<b>プレビューされるように</b></nobr>
	<nobr>投稿するサービスです</nobr>
	</p>
	<br>
	<a href="#myModal" data-toggle="modal" class="btn btn-custom btn-large">はじめる</a>
	<br>
	<br>
		ログイン後にON/OFFを切り替えられるようになりました。
	<br>
	<br>
	<div class="span6">
		<div class="bandabox">
			<img class="banda" src="image/before.png">
			<blockquote class="twitter-tweet">
				<p>黄色いネズミ <a href="http://t.co/09JxTkzoLM">http://t.co/09JxTkzoLM</a>
				</p>&mdash; タツアキ (@tatsuaki_w) 
				<a href="https://twitter.com/tatsuaki_w/statuses/401417516045848576">
				November 15, 2013</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>	
	</div>
	<div class="span6">
		<div class="bandabox">
			<img class="banda" src="image/after.png">
			<blockquote class="twitter-tweet">
			<p>黄色いネズミ <a href="http://t.co/ktDRJdHzZL">http://t.co/ktDRJdHzZL</a> 
			<a href="http://t.co/TFq0AnPfwX">pic.twitter.com/TFq0AnPfwX</a>
			</p>&mdash; タツアキ (@tatsuaki_w) 
			<a href="https://twitter.com/tatsuaki_w/statuses/401417532063506432">
			November 15, 2013</a></blockquote>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
	<br>
	<br>

<div id="myModal" class="modal hide fade">
<div class="modal-header">
    <a href="#" class="close" data-dismiss="modal">&times;</a>
    <h3>登録の流れ</h3>
</div>
<div class="modal-body">
<img class="guide" src="image/guide.png">
<br>
登録完了後は自動的に写真が投稿されるようになります。<br>
投稿ON/OFFなどの設定は、ログイン後の設定画面で行う事が可能です。<br>
</div>
<div class="modal-footer">
    <a href="getToken.php" class="btn btn-large btn-custom">Start</a>
</div>
</div><!--modal end-->


	</div><!--text-center-->
</div><!--padding-top-->
<!-- ここからフッター -->
<div id="footer" style="padding-top:50px;">
<div class="container">
<div class="row">
<hr size="1" color="#999999" style="border-style:dashed;" width="100%">

<!--google adsense-->
<div class="span6">
	<p style="text-align: left;">
		<style>
			.my_adslot { width: 320px; height: 50px; }
			@media(min-width: 500px) { .my_adslot { width: 468px; height: 60px; } }
			@media(min-width: 800px) { .my_adslot { width: 728px; height: 90px; } }
		</style>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- れすぽんしぶる -->
		<ins class="adsbygoogle my_adslot"
		 style="display:inline-block"
		 data-ad-client="ca-pub-7240536018506970"
		 data-ad-slot="4085326248"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</p>
</div><!--span6-->
<!--google adsense end-->

<!--ソーシャルボタンとコピーライト-->
<div class="span6">
	<div class="pull-right">
気に入ったらシェアをお願いします！<br>
<!--facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=1420328568182173";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="http://picsy.t-tu.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
<!--facebook end-->

<!--hatena-->
<a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple-balloon" title="このエントリーをはてなブックマークに追加">
<img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<!--hatena- end->

<!--google plus-->
<div class="g-plusone" data-size="medium"></div>
<script type="text/javascript">
  window.___gcfg = {lang: 'ja'};
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!--google plus end-->

<!--tweet-->
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://picsy.t-tu.com/" data-text="instagramのURLだけ貼付けて来るツイート撲滅運動中！" data-via="tatsuaki_w">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!--tweet end-->

<br>
<p class="copyright" style="text-align:right;">
 <?php echo SERVICE_NAME,"　：",SERVICE_SCHEMA; ?>
<br>
 Copyright &copy; 2013 <a href="http://t-tu.com">t-tu.com</a> All Rights Reserved.
</p>

</div></div>
<!--ソーシャルボタンとコピーライト end-->

</div>
</div>
</div>
<!-- フッター end-->

<!--twitter bootstrapのやつ-->
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--ここからanalystic-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46137790-1', 'picsy.t-tu.com');
  ga('send', 'pageview');
</script>
<!--ここまでanalystic-->

</div><!--container-fluid-->
</body>
</html>
