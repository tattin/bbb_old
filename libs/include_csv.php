<?php
/**
 * 汎用 CSV読み込み
 * TODO 要チェック
 */

function includeCSVData($fileName, $headers, &$errors, $check_header_item = true, $file_encode = "SJIS"){
  $message = '';
  $file = $_FILES[$fileName];
  $arrData = array(); // 実データ
  $row = 0;
  $num = 0;
  if($file["error"] != 0){
    if($file["error"] == 1 || $file["error"] == 2) {
      $errors['upload'] = 'アップロードされたファイルは容量の制限を越えています。';
    } else if($file["error"] == 4) {
      $errors['upload'] = 'ファイルを指定してください。';
    } else {
      $errors['upload'] = 'ファイルのアップロードに失敗しました。';
    }
    return array();
  }
  $str = file_get_contents($file["tmp_name"]);

  $str = mb_convert_encoding($str, "UTF-8", $file_encode);
  // bom付UTF-8の場合、bomを削除
  if (($file_encode == "UTF-8" || $file_encode == "UTF-16") && ord($str{0}) == 0xef && ord($str{1}) == 0xbb && ord($str{2}) == 0xbf) {
    $str = substr($str, 3);
  }
  file_put_contents($file["tmp_name"], $str);
  $fp = fopen($file["tmp_name"], "r"); // CSVファイルを読み込む

  // 最初の行は項目名
  $koumoku = fgetcsv_reg($fp);
  if ($koumoku !== FALSE) {
    $num = count($koumoku);
    foreach($koumoku as $key => $val) {
      $koumoku[$key] = mb_convert_kana($val, 'KVa');
    }
  }
  if($check_header_item && count($koumoku) != count($headers)){
    $errors['csv'] = 'CSVの項目数が正しくありません。ファイルを確認してください。';
    fclose($fp);
    return array();
  }
  while (($data = fgetcsv_reg($fp)) !== false) {
    if(count($data) == 0 || (count($data) == 1 && $data[0] == "")) {
      $row++;
      continue;
    }
    $temp_array = array();
    for ($i=0; $i < $num; $i++) {
      $colName = $koumoku[$i];
      $tmpValue = mb_convert_kana($data[$i], 'KVa'); // 項目名で連想配列
      $tmpValue = str_replace("\r\n","\r",$tmpValue);
      $tmpValue = str_replace("\r","\r\n",$tmpValue);
      $temp_array[$colName] = $tmpValue;
    }
    foreach($headers as $key => $val) {
      if(isset($temp_array[$key])) {
        $arrData[$row][$val] = $temp_array[$key];
      } else {
        $arrData[$row][$val] = "";
      }
    }

    $row++;
  }
  fclose($fp);
  return $arrData;
}

function fgetcsv_reg (&$handle, $length = null, $d = ',', $e = '"') {
        $d = preg_quote($d);
        $e = preg_quote($e);
        $_line = "";
    $eof = false;
    while (($eof != true)and(!feof($handle))) {
            $_line .= (empty($length) ? fgets($handle) : fgets($handle, $length));
            $itemcnt = preg_match_all('/'.$e.'/', $_line, $dummy);
            if ($itemcnt % 2 == 0) $eof = true;
        }
        $_csv_line = preg_replace('/(?:\r\n|[\r\n])?$/', $d, trim($_line));
        $_csv_pattern = '/('.$e.'[^'.$e.']*(?:'.$e.$e.'[^'.$e.']*)*'.$e.'|[^'.$d.']*)'.$d.'/';
        preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
        $_csv_data = $_csv_matches[1];
        for($_csv_i=0;$_csv_i<count($_csv_data);$_csv_i++){
            $_csv_data[$_csv_i]=preg_replace('/^'.$e.'(.*)'.$e.'$/s','$1',$_csv_data[$_csv_i]);
            $_csv_data[$_csv_i]=str_replace($e.$e, $e, $_csv_data[$_csv_i]);
        }
        return empty($_line) ? false : $_csv_data;
    }

?>