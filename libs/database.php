<?php
include_once('adodb5/adodb.inc.php');

$ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
register_shutdown_function("database_error_catch");
$_ADOConnection = false;

/**
 * DB接続時のエラーをキャッチする
 */
function database_error_catch(){
  global $ERROR_CATCH_MODE;
  if($ERROR_CATCH_MODE){
    $ref = error_get_last();
    if(isset($ref['message']) and strpos($ref['message'],'memory') !== false){
      print "メモリ不足エラー";
    }else{
print "<!--";
      if(isset($ref['message'])){
        print $ref['message']."\n";
      }
      if(isset($ref['file'])){
        print $ref['file']."\n";
      }
      if(isset($ref['line'])){
        print 'line:'. $ref['line']."\n";
      }
print "-->";
    }
  }
}

/**
 * DB接続用文字列を返す
 * @return string DB接続用DNS文字列
 */
function getConnectionString(){
  return DSN;
}

/**
 * DBに接続し、インスタンスを返す
 * @return MDB2_Driver_pgsql DBインスタンス
 */
function getConnection(){
  global $_ADOConnection;
  if($_ADOConnection === false){
    $_ADOConnection = ADONewConnection(getConnectionString());
  }
  //$con = ADONewConnection('mysql');
  //$con->PConnect('localhost','desi14','purj+yyp','desi14');

  //$_ADOConnection->debug = 1;
  return $_ADOConnection;
}
function changeDataBaseDebugMode($bool){
  $con = getConnection();
  $con->debug=$bool;
}

/**
 * 全てを返す
 * @param string $tableName テーブル名
 * @param string $orderString order句
 * @param string $schemaName スキーマ名
 * @return array 結果配列
 */
function getAll($tableName, $orderby = "", $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  if($orderby == "") {
    $orderby = " ORDER BY id";
  }
  $sql = createSelectSql($tableName, $schemaName);
  $con = getConnection();
  $stmt = $con->Prepare($sql.$orderby);
  $ret = $con->GetAll($stmt);
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * keyによる検索を行い、結果の全てを返す
 * @param string $tableName テーブル名
 * @param array $wParams where句用配列
 * @param string $orderString order句
 * @param string $schemaName スキーマ名
 * @return array 結果配列
 */
function getAllByKeys($tableName, $params, $orderString = "", $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $sql = createSelectSql($tableName, $schemaName)." WHERE ".createWhereString($params)." ".$orderString;
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  $ret = $con->GetAll($stmt,$params);
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * keyによる検索を行い、件数を返す
 * @param string $tableName テーブル名
 * @param array $wParams where句用配列
 * @param string $schemaName スキーマ名
 * @return int 件数
 */
function getCountByKeys($tableName, $params, $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $sql = "SELECT count(*) FROM ". fixTableName($tableName, $schemaName). " WHERE ".createWhereString($params);
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  $ret = $con->GetAll($stmt,$params);
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  if(isset($ret[0][0])){
    return $ret[0][0];
  }else{
    return 0;
  }
}

/**
 * idによる検索を行い、1行を返す
 * @param string $tableName テーブル名
 * @param int $id id
 * @param string $schemaName スキーマ名
 * @return array 結果行
 */
function getById($tableName, $id, $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $sql = createSelectSql($tableName, $schemaName)." WHERE user_id = ?";
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  $ret = $con->GetRow($stmt,array($id));
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * keyによる検索を行い、1行を返す
 * @param string $tableName テーブル名
 * @param array $wParams where句用配列
 * @param string $orderString order句
 * @param string $schemaName スキーマ名
 * @return array 結果行
 */
function getByKeys($tableName, $keys, $orderString="", $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  $sql = createSelectSql($tableName, $schemaName)." WHERE ".createWhereString($keys)." ".$orderString;
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  return $con->GetRow($stmt,$keys);
}

/**
 * 1行目の指定した1カラムのみを返す
 * @param string $tableName テーブル名
 * @param string $item 取得するカラム名
 * @param array $wParams where句用配列
 * @param string $orderString order句
 * @param string $schemaName スキーマ名
 * @return string 結果
 */
function getOne($tableName, $item, $params, $orderString = "", $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $sql = 'SELECT "'.$item.'" FROM '.fixTableName($tableName, $schemaName)." WHERE ".createWhereString($params)." ".$orderString;
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  $ret = $con->GetAll($stmt,$params);
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  if(isset($ret[0][0])){
    return $ret[0][0];
  }
  return '';
}

/**
 * SQL文を用いてSELECTを行うを行う
 * @param string $sql SQL文
 * @param array $params Prepareパラメータ
 * @return array 結果配列
 */
function getAllBySql($sql, $params = array()){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  if(count($params) == 0){
    $ret = $con->GetAll($stmt);
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return $ret;
  }else{
    $ret = $con->GetAll($stmt,$params);
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return $ret;
  }
}

/**
 * SELECTを行う(where句はstring)
 * @param string $cols 取得カラム
 * @param string $from from句
 * @param string $where where句
 * @param string $options order,limit,offset等
 * @param array $params Prepareパラメータ
 * @return array 結果配列
 */
function getAllByString($cols, $from, $where = "", $options = "", $params = array()){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $sql = "SELECT ".$cols." FROM ".$from;
  if($where != "") {
    $sql .= " WHERE ".$where;
  }
  if($options != "") {
    $sql .= " ".$options;
  }
  $stmt = $con->Prepare($sql);
  if(count($params) == 0){
    $ret = $con->GetAll($stmt);
  }else{
    $ret = $con->GetAll($stmt,$params);
  }
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * SELECTを行う(where句はarrayバージョン)
 * @param string $cols 取得カラム
 * @param string $from from句
 * @param array  $wparams where句用配列
 * @param string $options order,limit,offset等
 * @param array $params Prepareパラメータ
 * @return array 結果配列
 */
function getColumnByKeys($cols, $from, $wparams = array(), $options = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $sql = "SELECT ".$cols." FROM ".$from;
  if(count($wparams) > 0) {
    $sql.= " WHERE ".createWhereString($wparams);
  }
  if($options != "") {
    $sql .= " ".$options;
  }
  $stmt = $con->Prepare($sql);
  if(count($wparams) == 0){
    $ret = $con->GetAll($stmt);
  }else{
    $ret = $con->GetAll($stmt,$wparams);
  }
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * SQL文を用いてSELECTを行うを行う(SELECTのみユーザ専用)
 * @param string $sql SQL文
 * @param array $params Prepareパラメータ
 * @return array 結果配列
 */
function getAllBySelectOnlySql($sql, $params = array()){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con=ADONewConnection(SELECT_ONLY_DSN);
  $con->SetFetchMode(ADODB_FETCH_ASSOC);
  //$con->debug = 1;
  $stmt = $con->Prepare($sql);
  if(count($params) == 0){
    $ret = $con->GetAll($stmt);
  }else{
//pr(array($stmt,$params));
    $ret = $con->GetAll($stmt,$params);
  }
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  return $ret;
}

/**
 * SQL文のチェックを行う(SELECTのみユーザ専用)
 * @param string $sql SQL文
 * @return bool 結果
 */
function checkSqlSyntax($sql) {
  $con=ADONewConnection(SELECT_ONLY_DSN);
  $result = @pg_prepare($con->_connectionID, "", _convertQuery($sql));
  if(!$result) {
    return false;
  } else {
    return true;
  }

}

/**
 * Prepareの?を$1,$2...に変換
 * @param string $query SQL文
 * @return string 変換結果
 */
function _convertQuery($query) {
  $placeholder_type_guess = $placeholder_type = null;
  $question = '?';
  $colon = ':';
  $positions = array();
  $position = $parameter = 0;
  while ($position < strlen($query)) {
    $q_position = strpos($query, $question, $position);
    $c_position = strpos($query, $colon, $position);
    if ($q_position && $c_position) {
      $p_position = min($q_position, $c_position);
    } elseif ($q_position) {
      $p_position = $q_position;
    } elseif ($c_position) {
      $p_position = $c_position;
    } else {
      break;
    }
    if (is_null($placeholder_type)) {
      $placeholder_type_guess = $query[$p_position];
    }
    
    if ($query[$position] == $placeholder_type_guess) {
      if (is_null($placeholder_type)) {
        $placeholder_type = $query[$p_position];
        $question = $colon = $placeholder_type;
        if (!empty($types) && is_array($types)) {
          if ($placeholder_type == ':') {
          } else {
            $types = array_values($types);
          }
        }
      }
      if ($placeholder_type_guess == '?') {
        $length = 1;
        $name = $parameter;
      } else {
        $name = preg_replace('/^.{'.($position+1).'}([a-z0-9_]+).*$/si', '\\1', $query);
        if ($name === '') {
          $err =& $this->raiseError(MDB2_ERROR_SYNTAX, null, null,
            'named parameter with an empty name', __FUNCTION__);
          return $err;
        }
        $length = strlen($name) + 1;
      }
      if (($key_parameter = array_search($name, $positions))) {
        $next_parameter = 1;
        foreach ($positions as $key => $value) {
          if ($key_parameter == $key) {
            break;
          }
          ++$next_parameter;
        }
      } else {
        ++$parameter;
        $next_parameter = $parameter;
        $positions[] = $name;
      }
      $query = substr_replace($query, '$'.$parameter, $position, $length);
      $position = $p_position + strlen($parameter);
    } else {
      $position = $p_position;
    }
  }
  return $query;
}

/**
 * insertを行う
 * @param string $tableName テーブル名
 * @param array $params 更新パラメータ
 * @param bool $isAdminPage adminページからの呼び出し（insert_user_idの要否）
 * @param bool $needUserID ユーザーIDが必要か（強制的に0を付与）
 * @param string $schemaName スキーマ名
 * @return int 更新行数 失敗時-1
 */
function insert($tableName, $params, $isAdminPage = false, $needUserID = false, $schemaName = ''){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $params2 = array();
  foreach($params as $key => $val) {
//    if(mb_strpos($key, 'insert') !== false || mb_strpos($key, 'update') !== false) {
//      continue;
//    }
    $params2[$key] = $val;
  }
  $sql = createInsertSql($tableName, $params2, $isAdminPage, $needUserID, $schemaName);
//  if($isAdminPage && !$needUserID) {
    $addParams = array();
//  } else if($isAdminPage && $needUserID) {
//    $addParams = array('insert_user_id' => 0, 'update_user_id' => 0);
//  } else {
//    $addParams = array('insert_user_id' => $_SESSION['User']['UserID'], 'update_user_id' => $_SESSION['User']['UserID']);
//  }

  if(!$con->Execute($sql, $params2 + $addParams)) {
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return -1;
  } else {
    $ret = $con->Affected_Rows();
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return $ret;
  }
}

/**
 * 次のIDを取得
 * @param string $tableName テーブル名
 * @param string $schemaName スキーマ名
 * @return int ID
 */
function getNextID($tableName, $idName = "id", $schemaName = "") {
  global $ERROR_CATCH_MODE;
  global $debug;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $ret = getAllBySql("SELECT nextval('".fixTableName($tableName, $schemaName)."_".$idName."_seq') as id");
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  if (!isset($ret[0]['id']) || $ret[0]['id'] == '') {
    return 1;
  }
  return $ret[0]['id'];
}

/**
 * updateを行う
 * @param string $tableName テーブル名
 * @param array $params 更新パラメータ
 * @param array $wParams where句用配列
 * @param bool $isAdminPage adminページからの呼び出し（insert_user_idの要否）
 * @param bool $needUserID ユーザーIDが必要か（強制的に0を付与）
 * @param string $schemaName スキーマ名
 * @return int 更新行数 失敗時-1
 */
function update($tableName, $params, $wParams, $isAdminPage = false, $needUserID = false, $schemaName = ''){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $params2 = array();
  foreach($params as $key => $val) {
//    if(mb_strpos($key, 'insert') !== false || mb_strpos($key, 'update') !== false) {
//      continue;
//    }
    $params2[$key] = $val;
  }
  $sql = createUpdateSql($tableName, $params2, $isAdminPage, $needUserID, $schemaName)." WHERE ".createWhereString($wParams);

  $wParams2 = array();
  foreach($wParams as $key => $val) {
    $wParams2['w'.$key] = $val;
  }
//  if($isAdminPage && !$needUserID) {
    $addParams = array();
//  } else if($isAdminPage && $needUserID) {
//    $addParams = array('update_user_id' => 0);
//  } else {
//    $addParams = array('update_user_id' => $_SESSION['User']['UserID']);
//  }
  if(!$con->Execute($sql, $params2 + $addParams + $wParams2)) {
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return -1;
  } else {
    $ret = $con->Affected_Rows();
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return $ret;
  }
}

/**
 * INSERT文を生成する
 * @param string $tableName テーブル名
 * @param array $params 更新パラメータ
 * @param bool $isAdminPage adminページからの呼び出し（insert_user_idの要否）
 * @param bool $needUserID ユーザーIDが必要か（強制的に0を付与）
 * @param string $schemaName スキーマ名
 * @return string INSERT文
 */
function createInsertSql($tableName, $params, $isAdminPage, $needUserID, $schemaName = ''){
  $str = "INSERT INTO ". fixTableName($tableName, $schemaName). " ( ";
  $values = " VALUES ( ";
  $count = 0;
  foreach($params as $key => $val) {
//    if(mb_strpos($key, 'insert') !== false || mb_strpos($key, 'update') !== false) {
//      continue;
//    }
    if($count == 0) {
      $str .= " $key";
      $values .= " ? ";
    } else {
      $str .= ", $key";
      $values .= ", ? ";
    }
    $count++;
  }
//  if(!$isAdminPage || $needUserID) {
//    $str .= ', insert_user_id ';
//    $values .= ", ? ";
//    $str .= ', update_user_id ';
//    $values .= ", ? ";
//  }
/*
  $str .= ', insert_at ';
  $values .= ", now() ";
  $str .= ', update_at ';
  $values .= ", now() ";
*/

  $str .= ") ". $values . ")";
  return $str;

}

/**
 * UPDATE文を生成する
 * @param string $tableName テーブル名
 * @param array $params 更新パラメータ
 * @param bool $isAdminPage adminページからの呼び出し（insert_user_idの要否）
 * @param bool $needUserID ユーザーIDが必要か（強制的に0を付与）
 * @param string $schemaName スキーマ名
 * @return string UPDATE文
 */
function createUpdateSql($tableName, $params, $isAdminPage, $needUserID, $schemaName = ''){
  $str = "UPDATE ". fixTableName($tableName, $schemaName). " SET ";
  $count = 0;
  foreach($params as $key => $val) {
  /*
    if(mb_strpos($key, 'insert') !== false || mb_strpos($key, 'update') !== false) {
      continue;
    }
   */
    if($count == 0) {
      $str.= " $key = ? ";
    } else {
      $str.= ", $key = ? ";
    }
    $count++;
  }
//  if(!$isAdminPage || $needUserID) {
//    $str .= ', update_user_id = ? ';
//  }
  //$str .= ', update_at = now() ';
  return $str;
}

/**
 * ユーザーIDからユーザー名を返す
 * @param int $userID ユーザーID
 * @param string $schemaName スキーマ名
 * @return string ユーザー名
 */
function getUserNameByID($userID, $schemaName = ''){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $sql = 'SELECT name FROM '.fixTableName('v_users', $schemaName)." WHERE id = ? ORDER BY id";
  $con = getConnection();
  $stmt = $con->Prepare($sql);
  $ret = $con->GetAll($stmt, array('id' => $userID));
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
  if(isset($ret[0][0])){
    return $ret[0][0];
  }
  return '';
}
/**
 * トランザクション開始
 */
function beginTransaction(){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $con->StartTrans();
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
}

/**
 * トランザクション終了
 * エラー発生時にはロールバックされる
 */
function endTransaction(){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();
  $con->CompleteTrans();
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
}

/**
 * wParamsで指定した行があればUPDATE、なければINSERTを行う
 * @param string $tableName テーブル名
 * @param array $params 更新パラメータ
 * @param array $wParams WHERE句用パラメータ
 * @param bool $isAdminPage adminページからの呼び出し（insert_user_idの要否）
 * @param bool $needUserID ユーザーIDが必要か（強制的に0を付与）
 * @param string $schemaName スキーマ名
 * @return int 更新行数。失敗時-1
 */
function updateOrInsert($tableName, $params, $wParams, $isAdminPage = false, $needUserID = false, $schemaName = '') {
  global $ERROR_CATCH_MODE;
  $con = getConnection();
  $params2 = array();
  foreach($params as $key => $val) {
  /*
    if(mb_strpos($key, 'insert') !== false || mb_strpos($key, 'update') !== false) {
      continue;
    }
  */
    $params2[$key] = $val;
  }
  $ret = getByKeys($tableName, $wParams);

  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  if($ret == false || count($ret) == 0) {
    //INSERT処理
    $sql = createInsertSql($tableName, $params2, $isAdminPage, $needUserID, $schemaName);
//    if($isAdminPage && !$needUserID) {
      $addParams = array();
//    } else if($isAdminPage && $needUserID) {
//      $addParams = array('insert_user_id' => 0, 'update_user_id' => 0);
//    } else {
//      $addParams = array('insert_user_id' => $_SESSION['User']['UserID'], 'update_user_id' => $_SESSION['User']['UserID']);
//    }
    $result = $con->Execute($sql, $params2 + $addParams);
  } else {
    //UPDATE処理
    $sql = createUpdateSql($tableName, $params2, $isAdminPage, $needUserID, $schemaName)." WHERE ".createWhereString($wParams);
    $wParams2 = array();
    foreach($wParams as $key => $val) {
      $wParams2['w'.$key] = $val;
    }
//    if($isAdminPage && !$needUserID) {
      $addParams = array();
//    } else if($isAdminPage && $needUserID) {
//      $addParams = array('update_user_id' => 0);
//    } else {
//      $addParams = array('update_user_id' => $_SESSION['User']['UserID']);
//    }
    $result = $con->Execute($sql, $params2 + $addParams + $wParams2);
  }

  if(!$result) {
    $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
    return -1;
  } else {
    $ret = $con->Affected_Rows();
    $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
    return $ret;
  }
}

/**
 * 物理削除
 * @param string $tableName テーブル名
 * @param array $wParams WHERE句用パラメータ
 * @param string $schemaName スキーマ名
 * @return int 更新行数。失敗時-1
 */
function delete($tableName, $wParams, $schemaName = ""){
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con=getConnection();
  $sql = "DELETE FROM ". fixTableName($tableName, $schemaName). " WHERE ".createWhereString($wParams);
  $con->Execute($sql,$wParams);
  $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
}

/**
 * テーブル名からSELECT文を生成する
 * @param string $tableName テーブル名
 * @param string $schemaName スキーマ名
 * @return string SELECT文
 */
function createSelectSql($tableName, $schemaName = ""){
  return "SELECT * FROM ". fixTableName($tableName, $schemaName). " ";
}

/**
 * where句を生成する
 * @param array $wParams 連想配列
 * @return string where句
 */
function createWhereString($arr){
  $str = " 1=1";
  if(is_array($arr)){
    foreach($arr as $k => $v){
      if($k == 'pager_limit' || $k == 'pager_offset') {
        continue;
      }
      if(mb_strpos($v, '%') !== false) {
        $str.= " AND ".$k." LIKE ?";
      } else {
        $str.= " AND ".$k." = ?";
      }
    }
  }
  return $str;
}

/**
 * idとnameのHash配列を返す
 * @param string $tableName テーブル名
 * @param string $idCol idカラム名
 * @param string $name nameカラム名
 * @param array $wParams where句用配列
 * @param string $orderString order句。空ならID順
 * @param string $schemaName スキーマ名
 * @return array Hash配列
 */
function getHashArray($tableName, $idCol, $nameCol, $wParams = array(), $orderString = '', $schemaName = '') {
  $arrHash = array();
  if($orderString == '') {
    $order = " ORDER BY ". $idCol." ";
  } else {
    $order = " ".$orderString;
  }
  $ret = getAllByKeys($tableName, $wParams, $order, $schemaName);
  foreach($ret as $key => $val) {
    $arrHash[$val[$idCol]] = $val[$nameCol];
  }
  return $arrHash;
}

/*
 * テーブル名にメインスキーマ名を付与
 * @param string $tableName テーブル名
 * @param int $schemaName スキーマ名
 * @return string スキーマ名が付与されたテーブル名
 */
function fixTableName($tableName, $schemaName = '') {
  if(strpos($tableName,'.') !== false){
    return $tableName;
  }

  if(($tableName == 'entrance_exit_histories' || $tableName == 'images' || $tableName == 'owners'
    || $tableName == 'owners_owner_subtype_details' || $tableName == 'vehicles') && $schemaName !== '') {
    return $schemaName.'.'.$tableName;
  } else if(($tableName == 'entrance_exit_histories' || $tableName == 'images' || $tableName == 'owners'
    || $tableName == 'owners_owner_subtype_details' || $tableName == 'vehicles') && isset($_SESSION['User']['GroupID'])) {
    return 'group'.$_SESSION['User']['GroupID'].'.'.$tableName;
  } else if(defined('MAIN_SCHEMA') && MAIN_SCHEMA != '') {
    return MAIN_SCHEMA.'.'.$tableName;
  } else {
    return $tableName;
  }
}

/*
 * ラージオブジェクトを削除する（この後にVacume必要）
 * @param string $tableName テーブル名
 * @param array $oidColumns oidのカラム名配列
 * @param int $schemaName スキーマ名
 * @param array $wParams where句用配列
 */
function deleteLargeObject($tableName, $oidColumns, $wParams = array(), $schemaName = "") {
  $i = 0;
  $cols = "";
  foreach($oidColumns as $col) {
    if($i != 0) {
      $cols .= ", ";
    }
    $cols .= $col;
    $i++;
  }
  $con = getConnection();
  beginTransaction();
  $sql = "SELECT ".$cols. " FROM ".fixTableName($tableName, $schemaName)." WHERE ".createWhereString($wParams);
  $ret = getAllBySql($sql, $wParams);
  foreach($ret as $val) {
    foreach($oidColumns as $oidCol) {
      @pg_lo_unlink($con->_connectionID, $val[$oidCol]);
    }
  }
  endTransaction();
}

function executeQuery($sql, $params = array()) {
  global $ERROR_CATCH_MODE;
  $ERROR_CATCH_MODE = true; // メモリエラーキャッチ開始
  $con = getConnection();

  if(!$con->Execute($sql, $params)) {
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return -1;
  } else {
    $ERROR_CATCH_MODE = false; // メモリエラーキャッチ終了
    return 1;
  }
}
?>
