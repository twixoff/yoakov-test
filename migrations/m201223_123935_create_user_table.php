<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201223_123935_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'password' => $this->string(),
            'authKey' => $this->string()
        ]);
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'authKey' => Yii::$app->security->generateRandomString(50)
        ]);
        $this->insert('{{%user}}', [
            'username' => 'demo',
            'password' => Yii::$app->security->generatePasswordHash('demo'),
            'authKey' => Yii::$app->security->generateRandomString(50)
        ]);
        $this->insert('{{%user}}', [
            'username' => 'user',
            'password' => Yii::$app->security->generatePasswordHash('user'),
            'authKey' => Yii::$app->security->generateRandomString(50)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
