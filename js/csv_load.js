// ex：http://blog.cles.jp/item/2691

function loadCSV(path) {
  var httpObj = createXMLHttpRequest(handleResult);
  if (httpObj) {
    httpObj.open("GET", path, true);
    httpObj.send(null);
  }
}

function handleResult() {
  if ((this.readyState == 4) && (this.status == 200)) {
    var text = getAjaxFilter()(this.responseText);
    csvData = parseCSV(text);

    //ここに取得したcsvの処理を書く。ここではテーブルを表示。
    var result = "<table>";
    for (var i = 0; i < csvData.length; i++) {
      result += "<tr>";
      for (var j = 0; j < csvData[i].length; j++){
      result += "<td>";
      result += csvData[i][j];
      result += "</td>";
      }
      result += "</tr>";
    }
    result += "</table>";
    document.getElementById("result").innerHTML = result;
  }
}

function parseCSV(str) {
  var CR = String.fromCharCode(13);
  var LF = String.fromCharCode(10);
  //ここはCSVの改行コードによってCR,LFを使い分ける必要がある。
  var lines = str.split(LF);
  var csvData = new Array();

  for (var i = 0; i < lines.length; i++) {
    var cells = lines[i].split(",");
    if( cells.length != 1 ) csvData.push(cells);
  }
  return csvData;
}

function createXMLHttpRequest(cbFunc) {
  var XMLhttpObject = null;
  try {
    XMLhttpObject = new XMLHttpRequest();
  } catch(e) {
    try {
      XMLhttpObject = new ActiveXObject("Msxml2.XMLHTTP");
    } catch(e) {
      try {
        XMLhttpObject = new ActiveXObject("Microsoft.XMLHTTP");
      } catch(e) {
        return null;
      }
    }
  }
  if (XMLhttpObject) XMLhttpObject.onreadystatechange = cbFunc;
  return XMLhttpObject;
}

function getAjaxFilter() {
  if (navigator.appVersion.indexOf("KHTML") > -1) {
    return function(t) {
      var esc = escape(t);
      return (esc.indexOf("%u") < 0 && esc.indexOf("%") > -1) ? decodeURIComponent(esc) : t
    }
  } else {
    return function(t) {
      return t
    }
  }
}