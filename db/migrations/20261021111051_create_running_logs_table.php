<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateRunningLogsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    //id, user_id, distance, time, date, notes, created_at, updated_at
    public function change(): void
    {
        $table = $this->table('running_logs');
        $table->AddColumn("user_id", "integer", ["signed" => false])
        ->addForeignKey("user_id", "users", "id") //user_id = id from users table
        ->addColumn("distance", "float", ["null" => true]) //time and distance can be null cuz user can log only time or distance
        ->addColumn("time", "integer", ["null" => true]) //time in ms
        ->addColumn("date", "date")
        ->addColumn("notes", "text", ["null" => true])
        ->addTimestamps() //created_at and updated_at
        ->create();
    }
}
