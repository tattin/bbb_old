<?php
/**
 * 環境によって値が変わる値を格納する
 */
//ここには記述していないが、www/bootstrap.phpのROOT_DIRは環境によって変わるので注意すること。

//データベース接続用の文字列
//pgsql://USER:PASSWORD@SERVER[\\INSTANCE_NAME]/DB_NAME
define('DSN', 'pgsql://pguser:pgpass@localhost/dbname');
//SELECT専用ユーザーのデータベース接続用文字列
define('SELECT_ONLY_DSN', 'pgsql://pguser:pgpass@localhost/dbname');

//設置ディレクトリ
define('BASE_URL', '/');

define ('HOME_URL', 'http://girls24.me.land.to');
define ('SITE_URL', 'http://girls24.me.land.to'.BASE_URL);
define ('SSL_URL', 'https://girls24.me.land.to'.BASE_URL);
define ('ADD_SITE_URL', substr(SITE_URL, 0, -strlen(BASE_URL)));
define ('ADD_SSL_URL', substr(SSL_URL, 0, -strlen(BASE_URL)));

define('IMAGE_URL', BASE_URL.'images/');

// ユーザーページのディレクトリ付与
define('ADD_USER_DIR', "user/");

//サイト名。TITLE表示用
define('SITE_NAME', 'たっちん様ツール');

//メール送信サーバー　接続設定
define('SMTP_HOST', 'localhost');
define('SMTP_PORT', '25');
define('SMTP_USERNAME', 'authtest');
define('SMTP_PASSWORD', 'authpass');

// メール送信元アドレス
define('DEFAULT_FROM','takahashi.capsor@gmail.com');
// メール送信元アドレス　NO REPLY
define('NO_REPLY_FROM','takahashi.capsor@gmail.com');

// 仮登録メール　送信元アドレス
define('REGIST_MAIL_FROM', NO_REPLY_FROM);
// 本登録メール　送信元アドレス
define('MAIN_REGIST_MAIL_FROM', NO_REPLY_FROM);

// 管理者へのメール送信先アドレス
define('DEFAULT_TO','takahashi.capsor@gmail.com');
//問い合わせメール　送信先アドレス
define('CONTACT_MAIL_TO', SUPPORT_TO);
//招待メール送信先アドレス
define('INVITATION_TO', DEFAULT_TO);

// メール　送信元名
define('DEFAULT_MAIL_FROM_NAME', "tattin");
// 仮登録メール　送信元名
define('REGIST_MAIL_FROM_NAME', DEFAULT_MAIL_FROM_NAME);
// 本登録メール　送信元名
define('MAIN_REGIST_MAIL_FROM_NAME', DEFAULT_MAIL_FROM_NAME);

ini_set('default_socket_timeout',15);
ini_set('date.timezone','Asia/Tokyo');

define('AUTH_KEY', "gjg78t1mqa1gz3jq5h9z4b36");

// qdmailの改行コード
define('QDMAIL_LFC', "\n");

//challenge.php登録画面の動画のサイズ
define('MOVIE_WIDTH', 220);
define('MOVIE_HEIGHT', 140);

