<?php

use humhub\modules\abcTheme\Events;
use humhub\modules\space\components\SpaceDirectoryQuery;
use humhub\modules\space\models\Space;
use humhub\components\Widget;
use humhub\modules\space\widgets\MembershipButton;
use humhub\modules\space\widgets\SpaceDirectoryFilters;
use humhub\modules\ui\menu\widgets\Menu;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'abc-theme',
    'class' => 'humhub\modules\abcTheme\Module',
    'namespace' => 'humhub\modules\abcTheme',
    'events' => [
        ['humhub\modules\admin\widgets\SpaceMenu', Menu::EVENT_INIT, ['humhub\modules\abcTheme\Events', 'onAdminSpaceMenuInit']],
        ['humhub\modules\space\models\Space', Space::EVENT_SEARCH_ADD, ['humhub\modules\abcTheme\Events', 'onSpaceSearchAdd']],
        ['humhub\modules\space\modules\manage\widgets\DefaultMenu', Menu::EVENT_INIT, ['humhub\modules\abcTheme\Events', 'onSpaceAdminDefaultMenuInit']],
        ['humhub\modules\space\models\Space', Space::EVENT_BEFORE_INSERT, ['humhub\modules\abcTheme\Events', 'onSpaceBeforeInsert']],
        ['humhub\modules\space\widgets\Chooser', Widget::EVENT_CREATE, ['humhub\modules\abcTheme\Events', 'onSpaceChooserCreate']],
        ['humhub\modules\space\widgets\SpaceChooserItem', Widget::EVENT_CREATE, ['humhub\modules\abcTheme\Events', 'onSpaceChooserItemCreate']],
//        ['humhub\modules\marketplace\components\LicenceManager', 'getLicence', ['humhub\modules\abcTheme\Events', 'onLicenceManagerGet']],
        [SpaceDirectoryFilters::class, SpaceDirectoryFilters::EVENT_INIT, [Events::class, 'onInitSpaceDirectoryFilters']],
        [SpaceDirectoryQuery::class, SpaceDirectoryQuery::EVENT_INIT, [Events::class, 'onInitSpaceDirectoryQuery']],
        [MembershipButton::class, MembershipButton::EVENT_INIT, [Events::class, 'onInitSpaceMembershipButton']],
    ]
];
?>