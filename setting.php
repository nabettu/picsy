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
				<li style="padding-top:5px;"><a href="faq.php">FAQ</a></li>
					<?php
					if (!empty($_SESSION['me'])) {
						echo "<li><a href=\"logout.php\" class=\"btn btn-large\">Logout</a></li>";
					} else {
						echo "<li><a href=\"getToken.php\" class=\"btn btn-large btn-custom\">Login</a></li>";
					}
					?>
			</ul>

		</div>
    </div>
</div><!--navbar-->

<!-- ナビゲーションバー以下開始 -->
<div style="padding-top:100px;">
	<div class="text-center">
		<p class="top-catch">
			ご利用ありがとうございます。<br>こちらは設定画面です。
		</p>
		<br>

<?php
	if (!empty($_SESSION['me'])) {
//		echo "PicsyID:".$_SESSION['id']."<br>";
		echo "instagramアカウント:".$_SESSION['me']." でログインしています。";
		echo "<br><br>";
		
		$link = mysql_connect($DSN,$DB_USER,$DB_PASSWORD) or die("MySQLへの接続に失敗しました。");
		// データベースを選択する
		$sdb = mysql_select_db($DB_NAME,$link) or die("データベースの選択に失敗しました。");
		$sql = "select * from `LAA0287235-zuqsqh`.`picsy` where `id` = ".$_SESSION['id']." limit 1";
		$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
		while ($row = mysql_fetch_assoc($result)) {
			$func = $row['func'];
		};
		mysql_close($link) or die("MySQL切断に失敗しました。");
		
		if($func==0) {
			echo "現在Instagramの写真をTwitterへ<b>投稿する</b>設定になっています。<br><br>";
			echo "<a  onclick=\"ch_func(".$_SESSION['id'].",1)\" class=\"btn btn-large\">投稿機能をOFF</a><br><br>";
		} else {
			echo "現在Instagramの写真をTwitterへ<b>投稿しない</b>設定になっています。<br><br>";
			echo "<a  onclick=\"ch_func(".$_SESSION['id'].",0)\" class=\"btn btn-large btn-custom\">投稿機能をON</a><br><br>";
		}
		echo "<a href=\"logout.php\" class=\"btn btn-large\">Logout</a><br>";
	} else {
		echo "ログイン後にアクセスお願いします。<br><br>";
		echo "<a href=\"index.php\" class=\"btn btn-large btn-custom\">トップへ戻る</a><br><br>";
	}
?>
<!--div id="test_out">testteet</div-->


<script type="text/javascript"><!--
function ch_func(id,func){
		myRet = confirm('設定を変更します。よろしいですか？');
		if ( myRet == true ){
			//Dbの値を変える
			var data = { func : func, id : id };
//			var n_data="id="+id;
//			var a="func="+func;
			$.ajax({
				type: "POST",
				url: "db_ajax.php",
				data: data,
				success: function(data) {
					//document.getElementById("test_out").innerHTML ='func='+data;
					alert("設定を変更しました");
					
					//このページをリロードする
					location.reload();
				},
				error: function() {
					alert('error');
				}
			});
		}else{
		//キャンセルの時にはなにもしない
		}
}
// --></script>

<p class="top-schema">
※ご利用時の注意点<br>
アプリケーションからの投稿時にはtwitterへのシェアは必要ありません。自動的にすべての写真がtwitterへ投稿されます。<br>
<img src="image/sample.jpg" style="max-width:300px; border:1px solid #000000;" /><br>
<br>
※今後の追加予定の機能<br>
・ページの英語対応<br>
・#picsyタグをつけている時のみ投稿する機能<br>
・InstagramのURLをTwitterへのつぶやきへつけるか付けないか選択機能<br>
<br>
その他本サービスについてご質問やバグ報告等あれば<a href="http://twitter.com/tatsuaki_w"  target="_blank">@tatsuaki_w</a>までお願いします。
</p>

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
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://picsy.t-tu.com" data-lang="ja">ツイート</a>
				<script>
					!function(d,s,id){
					var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
					if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
					js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);
					}}(document, 'script', 'twitter-wjs');
				</script>
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
