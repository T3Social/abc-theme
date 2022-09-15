<?php

namespace humhub\modules\abcTheme;

use humhub\libs\DynamicConfig;
use humhub\modules\abcTheme\models\SpaceType;
use humhub\modules\abcTheme\models\Type;
use humhub\modules\ui\view\helpers\ThemeHelper;
use Yii;

class Module extends \humhub\components\Module
{
    /**
     * @inheritdoc
     */
    public $resourcesPath = 'resources';

    /**
     * @var int amount of visible spaces per space type
     */
    public $maxVisibleSpaces = 8;

    /**
     * @inheritdoc
     */
    public function disable()
    {
        $this->disableAbcTheme();
        parent::disable();
    }

    public function enable()
    {
        if (parent::enable()) {
            $this->enableAbcTheme();
            return true;
        }
        return false;
    }


    /**
     * Enables the Abc Theme
     */
    private function enableAbcTheme()
    {
        // Already a theme based on Abc theme is active
        foreach (ThemeHelper::getThemeTree(Yii::$app->view->theme) as $theme) {
            if ($theme->name === 'abc') {
                return;
            }
        }

        $theme = ThemeHelper::getThemeByName('abc');
        if ($theme !== null) {
            $theme->activate();
            DynamicConfig::rewrite();
        }
    }

    /**
     * Disables the Abc Theme or other active themes based on the Abc theme
     */
    public function disableAbcTheme()
    {
        foreach (ThemeHelper::getThemeTree(Yii::$app->view->theme) as $theme) {
            if ($theme->name === 'abc') {
                $ceTheme = ThemeHelper::getThemeByName('HumHub');
                $ceTheme->activate();
                break;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function getPermissions($contentContainer = null)
    {
        if ($contentContainer === null) {
            $permissions = [];

            // Return SpaceType
            foreach (Type::find()->all() as $spaceType) {
                $permissions[] = new permissions\CreateSpaceType(['spaceType' => $spaceType]);
            }

            return $permissions;
        }

        return [];
    }


}