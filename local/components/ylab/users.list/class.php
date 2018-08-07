<?php

/**
 * Class UsersListComponent
 */
class UsersListComponent extends \CBitrixComponent
{
    /**
     * @return mixed|void
     */
    public function executeComponent()
    {
        //** @global \Cmain $APPLICATION */
        global $APPLICATION;

        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getUsersList();

        $this->includeComponentTemplate();
    }

    /**
     * @return array
     */
    protected function getUsersList()
    {
        CModule::IncludeModule("iblock");
        for ($iBust = 1; $iBust < 3; $iBust++) {
            $sDBProps = CIBlockElement::GetProperty(2, $iBust, "sort", "asc", array());
            $arProps = array();
            while ($sArProps = $sDBProps->Fetch()) {
                $arProps[$sArProps['CODE']] = $sArProps['VALUE'];
            }
        }
        return $arProps;
    }

}