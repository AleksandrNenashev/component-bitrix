<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<h2><?= htmlspecialcharsbx($arResult["TITLE"]) ?></h2>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название группы</th>
        <th>Описание группы</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arResult["GROUPS"] as $group): ?>
        <tr>
            <td><?= $group["ID"] ?></td>
            <td><?= htmlspecialcharsbx($group["NAME"]) ?></td>
            <td><?= htmlspecialcharsbx($group["DESCRIPTION"]) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>