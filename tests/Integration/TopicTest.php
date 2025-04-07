<?php

namespace Yuges\Topicable\Tests\Integration;

use Yuges\Topicable\Models\Topic;
use Yuges\Topicable\Config\Config;
use Yuges\Topicable\Tests\TestCase;
use Yuges\Topicable\Models\Topicable;
use Yuges\Topicable\Tests\Stubs\Models\Post;

class TopicTest extends TestCase
{
    public function testTopicPost()
    {
        $post = Post::query()->create([
            'title' => 'New post',
        ]);

        $topic = Topic::query()->create([
            'name' => 'programming',
            'slug' => 'programming',
        ]);

        $post->topic($topic);

        $this->assertDatabaseHas(Config::getTopicableClass(Topicable::class)::getTableName(), [
            'topic_id' => $topic->id,
            'topicable_id' => $post->id,
            'topicable_type' => $post->getMorphClass(),
        ]);
    }
}
