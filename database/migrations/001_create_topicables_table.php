<?php

use Yuges\Package\Enums\KeyType;
use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Yuges\Topicable\Models\Topicable;
use Yuges\Package\Database\Schema\Schema;
use Yuges\Package\Database\Schema\Blueprint;
use Yuges\Package\Database\Migrations\Migration;

return new class extends Migration
{
    public function __construct()
    {
        $this->table = Config::getTopicableClass(Topicable::class)::getTableName();
    }

    public function up(): void
    {
        if (Schema::hasTable($this->table)) {
            return;
        }

        Schema::create($this->table, function (Blueprint $table) {
            $table
                ->foreignIdFor(Config::getTopicClass(Topic::class))
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->keyMorphs(Config::getTopicableKeyType(KeyType::BigInteger), 'topicable');

            $table->unique(['topic_id', 'topicable_id', 'topicable_type']);

            $table->timestamps();
        });
    }
};
