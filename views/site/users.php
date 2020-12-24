<?php

use yii\helpers\Html;
use yii\grid\GridView;


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'username',
        'roleName',
        [
            'label' => 'Role up',
            'value' => function($model) {
                return $model->id != Yii::$app->user->id
                    ? Html::a('Up', ['set-role', 'id' => $model->id, 'role' => 1])
                    : '';
            },
            'format' => 'html',
        ],
        [
            'label' => 'Role down',
            'value' => function($model) {
                return $model->id != Yii::$app->user->id
                    ? Html::a('Down', ['set-role', 'id' => $model->id, 'role' => -1])
                    : '';
            },
            'format' => 'html'
        ]
    ]
]);