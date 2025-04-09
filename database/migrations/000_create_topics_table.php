<?php

use Yuges\Package\Enums\KeyType;
use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Yuges\Package\Database\Schema\Schema;
use Yuges\Package\Database\Schema\Blueprint;
use Yuges\Package\Database\Migrations\Migration;

return new class extends Migration
{
    public function __construct()
    {
        $this->table = Config::getTopicClass(Topic::class)::getTableName();
    }

    public function up(): void
    {
        if (Schema::hasTable($this->table)) {
            return;
        }

        Schema::create($this->table, function (Blueprint $table) {
            $table->key(Config::getTopicKeyType(KeyType::BigInteger));
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table
                ->foreignIdFor(Config::getTopicClass(Topic::class), 'parent_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->string('type')->nullable();

            $table->order();

            $table->timestamps();
        });
    }
};
