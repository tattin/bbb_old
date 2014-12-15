<?php
require_once 'getList.php';

class getListClass{
    // �R���X�g���N�^
    function getListClass(){
        // CSV�̊e��@�̃��X�g���擾
        $this->arrHead = getHeadList();
        $this->arrBody = getBodyList();
        $this->arrArm = getArmList();
        $this->arrLeg = getLegList();

        // ������
        $this->arrAssaultMain    = getAssaultMain();
        $this->arrAssaultSub     = getAssaultSub();
        $this->arrAssaultAssist  = getAssaultAssist();
        $this->arrAssaultSpecial = getAssaultSpecial();
        // ������I��p
        $this->arrAssaultMainSelect    = getIdValueList($this->arrAssaultMain);
        $this->arrAssaultSubSelect     = getIdValueList($this->arrAssaultSub);
        $this->arrAssaultAssistSelect  = getIdValueList($this->arrAssaultAssist);
        $this->arrAssaultSpecialSelect = getIdValueList($this->arrAssaultSpecial);
        // �֕���
        $this->arrHeavyMain    = getHeavyMain();
        $this->arrHeavySub     = getHeavySub();
        $this->arrHeavyAssist  = getHeavyAssist();
        $this->arrHeavySpecial = getHeavySpecial();
        // �֕���I��p
        $this->arrHeavyMainSelect    = getIdValueList($this->arrHeavyMain);
        $this->arrHeavySubSelect     = getIdValueList($this->arrHeavySub);
        $this->arrHeavyAssistSelect  = getIdValueList($this->arrHeavyAssist);
        $this->arrHeavySpecialSelect = getIdValueList($this->arrHeavySpecial);
        // ������
        $this->arrSnipeMain    = getSnipeMain();
        $this->arrSnipeSub     = getSnipeSub();
        $this->arrSnipeAssist  = getSnipeAssist();
        $this->arrSnipeSpecial = getSnipeSpecial();
        // ������I��p
        $this->arrSnipeMainSelect    = getIdValueList($this->arrSnipeMain);
        $this->arrSnipeSubSelect     = getIdValueList($this->arrSnipeSub);
        $this->arrSnipeAssistSelect  = getIdValueList($this->arrSnipeAssist);
        $this->arrSnipeSpecialSelect = getIdValueList($this->arrSnipeSpecial);
        // �x����
        $this->arrSupportMain    = getSupportMain();
        $this->arrSupportSub     = getSupportSub();
        $this->arrSupportAssist  = getSupportAssist();
        $this->arrSupportSpecial = getSupportSpecial();
        // �x����I��p
        $this->arrSupportMainSelect    = getIdValueList($this->arrSupportMain);
        $this->arrSupportSubSelect     = getIdValueList($this->arrSupportSub);
        $this->arrSupportAssistSelect  = getIdValueList($this->arrSupportAssist);
        $this->arrSupportSpecialSelect = getIdValueList($this->arrSupportSpecial);

        // �Z���N�g���ڂ��擾
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