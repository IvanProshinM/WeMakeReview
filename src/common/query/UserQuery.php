<?php

namespace common\query;

class UserQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return \common\models\User|array|null
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\User|array|null
     */

    public function one($db = null)
    {
        return parent::one($db);
    }

}
