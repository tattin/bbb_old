<?php
require_once 'getList.php';

class getListClass{
    // コンストラクタ
    function getListClass(){
        // CSVの各種機体リストを取得
        $this->arrHead = getHeadList();
        $this->arrBody = getBodyList();
        $this->arrArm = getArmList();
        $this->arrLeg = getLegList();

        // 麻武器
        $this->arrAssaultMain    = getAssaultMain();
        $this->arrAssaultSub     = getAssaultSub();
        $this->arrAssaultAssist  = getAssaultAssist();
        $this->arrAssaultSpecial = getAssaultSpecial();
        // 麻武器選択用
        $this->arrAssaultMainSelect    = getIdValueList($this->arrAssaultMain);
        $this->arrAssaultSubSelect     = getIdValueList($this->arrAssaultSub);
        $this->arrAssaultAssistSelect  = getIdValueList($this->arrAssaultAssist);
        $this->arrAssaultSpecialSelect = getIdValueList($this->arrAssaultSpecial);
        // 蛇武器
        $this->arrHeavyMain    = getHeavyMain();
        $this->arrHeavySub     = getHeavySub();
        $this->arrHeavyAssist  = getHeavyAssist();
        $this->arrHeavySpecial = getHeavySpecial();
        // 蛇武器選択用
        $this->arrHeavyMainSelect    = getIdValueList($this->arrHeavyMain);
        $this->arrHeavySubSelect     = getIdValueList($this->arrHeavySub);
        $this->arrHeavyAssistSelect  = getIdValueList($this->arrHeavyAssist);
        $this->arrHeavySpecialSelect = getIdValueList($this->arrHeavySpecial);
        // 砂武器
        $this->arrSnipeMain    = getSnipeMain();
        $this->arrSnipeSub     = getSnipeSub();
        $this->arrSnipeAssist  = getSnipeAssist();
        $this->arrSnipeSpecial = getSnipeSpecial();
        // 砂武器選択用
        $this->arrSnipeMainSelect    = getIdValueList($this->arrSnipeMain);
        $this->arrSnipeSubSelect     = getIdValueList($this->arrSnipeSub);
        $this->arrSnipeAssistSelect  = getIdValueList($this->arrSnipeAssist);
        $this->arrSnipeSpecialSelect = getIdValueList($this->arrSnipeSpecial);
        // 支武器
        $this->arrSupportMain    = getSupportMain();
        $this->arrSupportSub     = getSupportSub();
        $this->arrSupportAssist  = getSupportAssist();
        $this->arrSupportSpecial = getSupportSpecial();
        // 支武器選択用
        $this->arrSupportMainSelect    = getIdValueList($this->arrSupportMain);
        $this->arrSupportSubSelect     = getIdValueList($this->arrSupportSub);
        $this->arrSupportAssistSelect  = getIdValueList($this->arrSupportAssist);
        $this->arrSupportSpecialSelect = getIdValueList($this->arrSupportSpecial);

        // セレクト項目を取得
        $this->arrSelect = getSelectList();
    }
    function _getDefaultAtParts(){
        global $arrHead;
        global $arrBody;
        global $arrArm;
        global $arrLeg;
        $head_w = $arrHead[0][1];
        $body_w = $arrBody[0][1];
        $arm_w  = $arrArm[0][1];
        $limit  = $arrLeg[0][1];
        $limit = $limit - ($head_w + $body_w + $arm_w);
        return $limit;
    }
}

?>