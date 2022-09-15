<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2019 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\abcTheme\permissions;

use humhub\libs\BasePermission;
use humhub\modules\abcTheme\models\Type;
use Yii;

class CreateSpaceType extends BasePermission
{

    /**
     * @var Type
     */
    public $spaceType;

    /**
     * @inheritdoc
     */
    protected $moduleId = 'abc-theme';

    /**
     * @inheritdoc
     */
    protected $defaultState = self::STATE_ALLOW;

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return 'create_space_type_' . $this->spaceType->id;
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return Yii::t('AbcThemeModule.base', 'Create spaces of category: {category}', ['category' => $this->spaceType->item_title]);
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return Yii::t('AbcThemeModule.base', 'Users can create spaces of category: {category}', ['category' => $this->spaceType->item_title]);
    }

}
