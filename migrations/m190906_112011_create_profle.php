<?php

use yii\db\Schema;
use yii\db\Migration;

class m190906_112011_create_profle extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ( $this->db->driverName === 'mysql' )
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('user_profile', [
            'id'      => 'pk',
            'user_id' => 'int',
            
            'fullname'    => 'string',
            'external_id'  => 'string',
            'image'  => 'string',
            'info'    => 'text',
            
            'created_at' => 'int',
            'updated_at' => 'int',
        ], $tableOptions);
        
        
        $this->addForeignKey('fk_user_profile_user_id', 'user_profile', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }
    
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_profile_user_id', 'user_profile');
        
        $this->dropTable('user_profile');
    }
}
