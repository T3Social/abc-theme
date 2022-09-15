<?php

use humhub\assets\AppAsset;
use humhub\libs\LogoImage;
use humhub\modules\abcTheme\assets\AbcThemeAsset;
use humhub\modules\abcTheme\widgets\Chooser;
use humhub\modules\abcTheme\widgets\SearchWidget;
use humhub\modules\notification\widgets\Overview;
use humhub\modules\user\widgets\AccountTopMenu;
use humhub\widgets\NotificationArea;
use humhub\libs\Html;
use humhub\widgets\TopMenu;
use humhub\widgets\TopMenuRightStack;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
AbcThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?= $this->pageTitle; ?></title>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php $this->head() ?>
        <?= $this->render('head'); ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="wrapper">

        <div id="sidebar-wrapper">
            <?php if (LogoImage::hasImage()) : ?>
                <a class="navbar-brand hidden-xs" href="<?= Yii::$app->homeUrl; ?>">
                    <img id="img-logo" class="img-rounded"
                         src="<?= LogoImage::getUrl(600, 600); ?>"
                         alt="<?= Html::encode(Yii::$app->name) ?>"/>
                </a>
            <?php else: ?>
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl; ?>" id="text-logo">
                    <?= Html::encode(Yii::$app->name); ?>
                </a>
            <?php endif; ?>

            <?= TopMenu::widget(); ?>
            <div id="hide-sidebar">
                <a href="#menu-toggle" class="menu-toggle" class="dropdown-toggle"
                   aria-label="<?= Yii::t('AbcThemeModule.base', 'Hide sidebar') ?>">
                    <i class="fa fa-times"></i>
                </a>
            </div>

			<ul id="google-translate-container">
				<div id="google_translate_element"></div>
 			</ul>

            <?= Chooser::widget(['lazyLoad' => false]); ?>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-md">

                        <div id="topbar-first" class="topbar">
                            <div id="rp-nav" class="nav pull-left">
                                <ul class="nav pull-left navigation-bars">
                                    <li class="dropdown">
                                        <a href="#menu-toggle" class="menu-toggle"
                                           aria-label="<?= Yii::t('AbcThemeModule.base', 'Show sidebar') ?>"
                                           class="dropdown-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </li>
                                </ul>
                                <div class="menu-seperator"></div>
                            </div>
                            <?= SearchWidget::widget(); ?>
                            <div class="topbar-actions pull-right">

                                <ul class="nav pull-left" id="search-menu-nav">
                                    <?= TopMenuRightStack::widget(); ?>
                                </ul>

                                <div class="menu-seperator"></div>
                                <div class="notifications">
                                    <?=
                                    NotificationArea::widget(['widgets' => [
                                        [Overview::class, [], ['sortOrder' => 10]],
                                    ]]);
                                    ?>
                                </div>

                                <div class="menu-seperator"></div>
                                <?= AccountTopMenu::widget(['showUserName' => false]); ?>
                            </div>
                        </div>

                        <div class="content">
                            <?= $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({ pageLanguage: "en" }, "google_translate_element");
			// begin accessibility compliance
			$('img.goog-te-gadget-icon').attr('alt','Google Translate');
			$('div#goog-gt-tt div.logo img').attr('alt','translate');
			$('div#goog-gt-tt .original-text').css('text-align','left');
			$('.goog-te-gadget-simple .goog-te-menu-value span').css('color','#000000');
		}
		$(function() {
			$.getScript("//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit");
		});
	</script>
	<script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
	<script>
		kofiWidgetOverlay.draw('montessori', {
			'type': 'floating-chat',
			'floating-chat.donateButton.text': 'X me',
			'floating-chat.donateButton.background-color': 'rgba(33, 161, 179, 0.7)',
			'floating-chat.donateButton.text-color': '#fff'
		});
	</script>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
