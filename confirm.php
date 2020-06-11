<?php
/*
Template Name: 確認ページ;
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns#">
<meta charset="utf-8">
<meta name="viewport"　
content="width=device-width, initial-scale=1.0 ">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>確認</title>
    
    
<link rel="stylesheet" href="./style.css" type="text/css">
    
    <style type="text/css">
        .confirm-form{
    max-width: 800px;
    margin: 100px auto;
    padding: 40px 20px;
    background-color: #e8d2bc;
}
        .back-btn,.sent-btn{
    padding: 5px 10px;
    margin: 0 0 0 20px;
    color: #fff;
    font-weight: bold;
    background-color: #24a2b3;
    border: 2px solid #24a2b3;
    transition: .3s ease-in-out;
}
    </style>
</head>

    
      
      <body>
          
          <?php 
    // フォームのボタンが押されたら
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを各変数に格納
        $name = $_POST["name"];
        $furigana = $_POST["furigana"];
        $mail = $_POST["email"];
        $tel = $_POST["tel"];
        $sex = $_POST["sex"];
        $item = $_POST["item"];
        $content  = $_POST["content"];
        $email = "supu123sherlock@gmail.com";
    }

    // 送信ボタンが押されたら
    if (isset($_POST["submit"])) {
        // 送信ボタンが押された時に動作する処理をここに記述する
            
        // 日本語をメールで送る場合のおまじない
            mb_language("ja");
        mb_internal_encoding("UTF-8");
        
        //mb_send_mail("supu123sherlock@gmail.com", "メール送信テスト", "メール本文");

            // 件名を変数subjectに格納
            $subject = "［自動送信］お問い合わせ内容の確認";

            // メール本文を変数bodyに格納
        $body = <<< EOM
{$name}　様

お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$mail}

【 電話番号 】 
{$tel}

【 性別 】 
{$sex}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
        
        // 送信元のメールアドレスを変数fromEmailに格納
        $fromEmail = "contact@dream-php-seminar.com";

        // 送信元の名前を変数fromNameに格納
        $fromName = "お問い合わせテスト";

        // ヘッダ情報を変数headerに格納する      
        $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

        // メール送信を行う
        mb_send_mail($email, $subject, $body, $header);

        // サンクスページに画面遷移させる
        header("Location: http://samplesite6.eatdog.shop/%e3%81%8a%e5%95%8f%e3%81%84%e5%90%88%e3%82%8f%e3%81%9b%e3%81%82%e3%82%8a%e3%81%8c%e3%81%a8%e3%81%86%e3%81%94%e3%81%96%e3%81%84%e3%81%be%e3%81%99%e3%80%82/");
        exit;
    }
?>
          <div class="confirm-form">
          <h2>確認</h2>  
          <h2 class="contact-title">お問い合わせ 内容確認</h2>
          <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
                <div>
                    <label>お名前</label>
                    <p><?php echo $name; ?></p>
                </div>
                  <div>
                    <label>ふりがな</label>
                    <p><?php echo $furigana; ?></p>
                </div>
                <div>
                    <label>メールアドレス</label>
                    <p><?php echo $mail; ?></p>
                </div>
                <div>
                    <label>電話番号</label>
                    <p><?php echo $tel; ?></p>
                </div>
                <div>
                    <label>性別</label>
                    <p><?php echo $sex ?></p>
                </div>
                <div>
                    <label>お問い合わせ項目</label>
                    <p><?php echo $item; ?></p>
                </div>
                <div>
                    <label>お問い合わせ内容</label>
                    <p><?php echo nl2br($content); ?></p>
                </div>
          
          <form action="confirm.php" method="post">
              
              <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
            <input type="hidden" name="email" value="<?php echo $mail; ?>">
            <input type="hidden" name="tel" value="<?php echo $tel; ?>">
            <input type="hidden" name="sex" value="<?php echo $sex; ?>">
            <input type="hidden" name="item" value="<?php echo $item; ?>">
            <input type="hidden" name="content" value="<?php echo $content; ?>">
              

              
              <input class="back-btn" type="button" value="内容を修正する" onclick="history.back(-1)">
        
              <input class="sent-btn" type="submit" name="submit" value="送信">
              
          </form>
          

          </div>
          

             
          </body>
    
</html>