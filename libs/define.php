<?php
/**
 * 定数定義用
 */
define('STATUS_CATEGORY_ID', 1); //項目分類ID（状態）
define('TEST_CATEGORY_ID', 2); //項目分類ID（TEST）
define('DEFAULT_LIST_DISPLAY_COUNT', 5); //一覧の初期表示件数

define('START_YEAR',2011);

define('MALE_ID', 1);
define('FEMALE_ID', 2);

define('MAGAZINE_DO_NOT', 0);
define('MAGAZINE_TEXT', 1);
define('MAGAZINE_HTML', 2);

define('TEMP_IMAGE_PATH', ROOT_DIR."html/upload/tmp_img/");
define('SAVE_IMAGE_PATH', ROOT_DIR."html/upload/save_img/");
define('TEMP_IMAGE_URL', BASE_URL."upload/tmp_img/");
define('SAVE_IMAGE_URL', BASE_URL."upload/save_img/");

define('NO_VOICE_IMAGE_URL', "noimage/noimage_voice.jpg"); //　upload/save_img以下
define('NO_CHALLENGE_IMAGE_URL', "noimage/noimage_challenge.jpg"); //　upload/save_img以下

define('MAX_IMAGE_SIZE', "3000000");
define('IMAGE_WIDTH', "400");

//リスト表示件数
define('LIST_MAX', 20);
//最大取得件数
define('LIST_TOTAL_MAX', '200');
//他のボイス機能での最大取得件数
define('RECOMMEND_LIMIT', '20');
//管理番号の最大桁数
define('MAX_MANAGE_NO','5');
//メールタイトル制限文字数（半角）
define('TITLE_MAX_WIDTH', 40);
//メール本文制限文字数（半角）
define('CONTENT_MAX_WIDTH', 1000);
//メール配信履歴保存最大件数
define('HISTORY_MAX_COUNT', 50);
//MYページログイン画面
define('MYPAGE_LOGIN_URL', SSL_URL."mypage/login.php");
//メール待機時間
define('MAIL_USLEEP_INTERVAL', 300000);
//招待メール一括送信件数
define('INVITATION_MAIL_SEND_LIMIT', 10);

function getContactMenue(){
    return array(
    );
}

function getAllowTags(){
	return array(
		1 => 'b',
		2 => '/b',
		3 => 'i',
		4 => '/i',
		5 => 'br',
		6 => '/br',
		7 => 'font',
		8 => '/font',
		9 => 'strong',
		10 => '/strong',
		11 => 'u',
		12 => '/u',
		13 => 'p',
		14 => '/p',
		15 => 'span',
		16 => '/span',
		17 => 'em',
		18 => '/em',
		19 => 'div',
		20 => '/div'
	);
}
define('BIRTHDAY_START_YEAR', 1901); // 生年月日の開始年
define('BIRTHDAY_DEFAULT_YEAR', 30); // 生年月日のデフォルトの年

define('SAMPLE_MAIL_ADDRESS', 'mail@sample.com'); //メールアドレス登録時のエラーサンプルアドレス

define('TEMP_FLAG', 'temp_flag'); //usersテーブルの仮会員フラグ
define('CREATE_DATE', 'create_date'); //usersテーブルの登録日
define('LIMIT_TIME', '24'); //本会員登録有効期間 * 時間単位！



