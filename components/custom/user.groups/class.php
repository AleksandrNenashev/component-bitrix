<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\GroupTable;

class UserGroupsComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule("main")) {
            ShowError("Не удалось загрузить модуль main");
            return;
        }

        if ($this->startResultCache($this->arParams["CACHE_TIME"])) {
            $this->arResult["TITLE"] = $this->arParams["PAGE_TITLE"];
            $this->arResult["GROUPS"] = $this->getUserGroups();
            $this->includeComponentTemplate();
        }
    }

    private function getUserGroups()
    {
        $groups = [];

        $result = GroupTable::getList([
            "select" => ["ID", "NAME", "DESCRIPTION"],
            "order" => ["ID" => "ASC"]
        ]);

        while ($group = $result->fetch()) {
            $groups[] = $group;
        }

        return $groups;
    }
}
?>