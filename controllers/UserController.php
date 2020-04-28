<?php

namespace app\controllers;

use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /*
        SELECT * FROM user, billing
where user.id = billing.user_id
ORDER BY price DESC;
*/
/*
$entity['comments'] = EntityObjectComment::find()
->alias('c')
->select(['DATE_FORMAT(c.created_at, \'%d.%m.%Y\') as date', 'count(*) as count'])
->leftJoin('entity_object o', 'c.entity_object_id = o.id')
->leftJoin('entity e', 'e.id = o.entity_id')
->where(['NOT', ['c.comment' => null]])
->andWhere(['e.id' => $entity_id])
->groupBy('date')
->orderBy(['c.created_at' => SORT_ASC])
->asArray()
->all();
*/


        $users = User::find()->alias('u')
        ->leftJoin('billing b', 'u.id = b.user_id')
            ->all();

        foreach ($users as $user) {
            $temp = $user->billings;

            if($temp)               
            $test1 = $temp->invoice_name;
        }
        return $this->render('index', ['users' => $users]);
    }

}
