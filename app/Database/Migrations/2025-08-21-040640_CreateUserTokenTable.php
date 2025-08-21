<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTokenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_token' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false,
                'comment'        => 'Primary key',
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'NIP user',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Email user',
            ],
            'token' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
                'null'       => false,
                'collation'  => 'utf8mb3_unicode_ci',
                'comment'    => 'Token unik',
            ],
            'date_created' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
                'comment'    => 'Tanggal dibuat (timestamp)',
            ],
        ]);

        $this->forge->addKey('id_token', true); // Primary key
        $this->forge->createTable('user_token', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_token', true);
    }
}
