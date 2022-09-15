<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2021 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\abcTheme\tests\codeception\fixtures;

use humhub\modules\abcTheme\models\Type;
use yii\test\ActiveFixture;

class TypeFixture extends ActiveFixture
{
    public $modelClass = Type::class;
    public $dataFile = '@abc-theme/tests/codeception/fixtures/data/type.php';
}
