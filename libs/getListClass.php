<?php
require_once 'getList.php';

class getListClass{
    // RXgN^
    function getListClass(){
        // CSVÌeí@ÌXgðæ¾
        $this->arrHead = getHeadList();
        $this->arrBody = getBodyList();
        $this->arrArm = getArmList();
        $this->arrLeg = getLegList();

        // í
        $this->arrAssaultMain    = getAssaultMain();
        $this->arrAssaultSub     = getAssaultSub();
        $this->arrAssaultAssist  = getAssaultAssist();
        $this->arrAssaultSpecial = getAssaultSpecial();
        // íIðp
        $this->arrAssaultMainSelect    = getIdValueList($this->arrAssaultMain);
        $this->arrAssaultSubSelect     = getIdValueList($this->arrAssaultSub);
        $this->arrAssaultAssistSelect  = getIdValueList($this->arrAssaultAssist);
        $this->arrAssaultSpecialSelect = getIdValueList($this->arrAssaultSpecial);
        // Öí
        $this->arrHeavyMain    = getHeavyMain();
        $this->arrHeavySub     = getHeavySub();
        $this->arrHeavyAssist  = getHeavyAssist();
        $this->arrHeavySpecial = getHeavySpecial();
        // ÖíIðp
        $this->arrHeavyMainSelect    = getIdValueList($this->arrHeavyMain);
        $this->arrHeavySubSelect     = getIdValueList($this->arrHeavySub);
        $this->arrHeavyAssistSelect  = getIdValueList($this->arrHeavyAssist);
        $this->arrHeavySpecialSelect = getIdValueList($this->arrHeavySpecial);
        // »í
        $this->arrSnipeMain    = getSnipeMain();
        $this->arrSnipeSub     = getSnipeSub();
        $this->arrSnipeAssist  = getSnipeAssist();
        $this->arrSnipeSpecial = getSnipeSpecial();
        // »íIðp
        $this->arrSnipeMainSelect    = getIdValueList($this->arrSnipeMain);
        $this->arrSnipeSubSelect     = getIdValueList($this->arrSnipeSub);
        $this->arrSnipeAssistSelect  = getIdValueList($this->arrSnipeAssist);
        $this->arrSnipeSpecialSelect = getIdValueList($this->arrSnipeSpecial);
        // xí
        $this->arrSupportMain    = getSupportMain();
        $this->arrSupportSub     = getSupportSub();
        $this->arrSupportAssist  = getSupportAssist();
        $this->arrSupportSpecial = getSupportSpecial();
        // xíIðp
        $this->arrSupportMainSelect    = getIdValueList($this->arrSupportMain);
        $this->arrSupportSubSelect     = getIdValueList($this->arrSupportSub);
        $this->arrSupportAssistSelect  = getIdValueList($this->arrSupportAssist);
        $this->arrSupportSpecialSelect = getIdValueList($this->arrSupportSpecial);

        // ZNgÚðæ¾
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