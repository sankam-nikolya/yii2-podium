<?php

namespace bizley\podium\db;

use bizley\podium\Module as PodiumModule;
use yii\db\ActiveQuery;

/**
 * ActiveQuery extended for User
 *
 * @author Paweł Bizley Brzozowski <pawel@positive.codes>
 * @since 0.1
 */
class UserQuery extends ActiveQuery
{
    /**
     * Adds proper user ID for query.
     * @param int $id
     */
    public function loggedUser($id)
    {
        if (PodiumModule::getInstance()->userComponent == PodiumModule::USER_INHERIT) {
            return $this->andWhere(['inherited_id' => $id]);
        }
        return $this->andWhere(['id' => $id]);
    }
}
