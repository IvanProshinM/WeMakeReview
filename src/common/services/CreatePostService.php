<?php

namespace common\services;

use common\models\Post;
use api\models\PostForm;

class CreatePostService
{

    public function createPost(PostForm $post)
    {
        $newPost = new Post();
        $newPost->name = $post->name;
        $newPost->user_id = \Yii::$app->user->id;
        $newPost->postText = $post->postText;
        $newPost->createdAt = date('Y-m-d');
        $newPost->updatedAt = date('Y-m-d');

        $newPost->save();

        return [
            'model' => $newPost,
            'errors' => $newPost->errors
        ];
    }
}
