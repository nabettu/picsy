<?php 
require_once('config.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//i-mode group (ja)//DTD XHTML i-XHTML(Locale/Ver.=ja/2.3) 1.0//EN" "i-xhtml_4ja_10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1">
<link rel="shortcut icon" href="./image/favicon.ico">
<meta property="og:title" content="<?php echo SERVICE_NAME;?>" >
<meta property="og:type" content="<?php echo SERVICE_SCHEMA?>" >
<meta property="og:url" content="<?php echo SITE_URL?>" >
<meta property="og:image" content="image/logo_squ.png" />

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<link href="style.css" rel="stylesheet">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="shortcut icon"  href="image/favicon.ico" />
<title> <?php echo SERVICE_NAME;?></title>
</head>

<body style="">
<div class="container-fluid">


<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
		<div class="container">
			<a href="./"><img class="logo" src="image/logo.png"></a>
		
			<ul class="nav pull-right">
				<!--li style="padding-top:5px;"><a href="index.php">Home</a></li-->
				<li style="padding-top:5px;"><a href="faq.php">FAQ</a></li>
				<!--li>　</li-->
				<li><a href="getToken.php" class="btn btn-large btn-custom">Login</a></li>
			</ul>

		</div>
    </div>
</div><!--navbar-->

<!-- ナビゲーションバー以下開始 -->
<div style="padding-top:80px;">
	<div class="text-center" >

	<p class="top-catch">
	よくある質問
	</p>
	<br>
		<div class="faq">
			<div class="q"><img class="faq" src="image/Q_blue.png">InstagramのアプリでTwitterへの投稿を行うとどうなりますか？</div>
			<img class="faq" src="image/A_pink.png">同じ写真が２回投稿される場合があります。
		</div>
	
	<br>
		<!--hr size="1" color="#999999" style="border-style:dashed;" width="100%"-->
		
		<div class="faq">
			<div class="q"><img class="faq" src="image/Q_blue.png">Instagramへの投稿時にONOFFは選択できますか？</div>
			<img class="faq" src="image/A_pink.png">ONの場合instagramでの投稿はすべてTwitterへ連携しますのでWebからON/OFFを切り替えてください。今後タグでのON/OFF機能を設置予定です。
		</div>
			
	<br>
	
	<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">文章をたくさん入れたら投稿されないみたいだけど、、、</div>
		<img class="faq" src="image/A_pink.png">TwitterはURLを含めて140文字までしか投稿できないため、Instagramでの投稿では80文字程度にしてください。それ以上のコメントを書くと正しく投稿されない場合があります。
	</div>

	<br>
		
	<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">Twitterの投稿をOFFにしたい</div>
		<img class="faq" src="image/A_pink.png">ログイン後、設定画面でTwitterへの投稿をOffにしていただければOFFとなります。
	</div>

	<br>

	<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">Instagramのアカウントから複数のTwitterへ写真を投稿する事は可能ですか?</div>
		<img class="faq" src="image/A_pink.png">Twitterの複数アカウントへの投稿はできません。逆に複数のInstagramアカウントから同じTwitterアカウントへの投稿もサポートしていません。
	</div>
	
	<br>
		
	<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">instaの投稿を消したり編集しましたがTwitterのが反映されません</div>
		<img class="faq" src="image/A_pink.png">サポート外ですので、Twitterの投稿ははTwitterで別途処理を行って下さい。
	</div>
	
	<br>
		<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">今後どんな機能が追加されますか？</div>
		<img class="faq" src="image/A_pink.png">
   下記の機能を順次開発次第発表します。<br>
   * タグでの機能ONOFF機能  EX) #Picsy と、タグを付けた場合だけTwitterへ投稿する等<br>
   * InstaのURLをつけるかつけないかを選択出来る<br>
   * 他、追加して欲しい機能等あれば意見箱か管理者までお願いします。<br>
	</div>
<br>
	<div class="faq">
		<div class="q"><img class="faq" src="image/Q_blue.png">こんな素晴らしいサービスを作ってくれてお礼が言いたい or こんなクソサービス！一言言いたい！
</div>
		<img class="faq" src="image/A_pink.png">その他本サービスについてご質問やバグ報告等あれば<a href="http://twitter.com/tatsuaki_w"  target="_blank">@tatsuaki_w</a>までお願いします。
	</div>


	<br>
	
	<a href="index.php" class="btn btn-large btn-custom">トップへ戻る</a>

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

</div><!--container-fluid-->
</body>
</html>
