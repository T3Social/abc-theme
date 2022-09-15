<?php

namespace humhub\modules\abcTheme\assets;

use yii\web\View;

/**
 * Description of AbcThemeAsset
 *
 * @author buddha
 */
class AbcThemeAsset extends \yii\web\AssetBundle
{
    /**
     * v1.5 compatibility defer script loading
     *
     * Migrate to HumHub AssetBundle once minVersion is >=1.5
     *
     * @var bool
     */
    public $defer = true;

    /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_END];

    /**
     * @inheritdoc
     */
    public $sourcePath = '@abc-theme/themes/abc';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/humhub.abc.theme.js'
    ];
}
