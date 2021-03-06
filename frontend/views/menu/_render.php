<?php
/**
 * @file      _render.php.
 * @date      23/2/2016
 * @time      5:03 AM
 * @author  Mahesh Joshi <mahesh.connectnepal@gmail.com>
 * @copyright Copyright (c) 2015 Yii2-cms
 * @license   http://www.yii2-cms.com/license/
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\widgets\MenuRenderer;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $selectedMenu common\models\Menu */
?>

<?php $form = ActiveForm::begin([
    'action'  => Url::to(['/menu/update', 'id' => $selectedMenu->id]),
    'options' => ['class' => 'menu-items-form']
]); ?>

    <div class="box box-primary">

        <div class="box-header">
            <h2 class="box-title">
                <?= $selectedMenu->menu_title ?>
            </h2>

            <div class="box-tools pull-right">
                <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
            </div>
        </div>

        <div class="box-body clearfix">

            <?= $form->field($selectedMenu, 'menu_title', ['template' => '{input}{error}'])->textInput(['id' => 'menu-update-menu_title']); ?>

            <div class="dd">
                <?php echo MenuRenderer::widget(['items' => $selectedMenu->getAvailableMenuItem()]); ?>
            </div>

            <?php
            if (isset(Yii::$app->params['menu']['location'])) {
                echo $form->field($selectedMenu, 'menu_location')->radioList(Yii::$app->params['menu']['location'], [
                    'separator' => '<br />',
                    'class'     => 'radio'
                ]);
            }
            ?>

        </div>

        <div class="box-footer">
            <?= Html::hiddenInput('MenuOrder', null, ['id' => 'menu-output', 'class' => 'form-control']); ?>
            <?= Html::submitButton('Save', ['id' => 'save-menu', 'class' => 'btn btn-flat btn-primary']); ?>
        </div>
    </div>
<?php ActiveForm::end();