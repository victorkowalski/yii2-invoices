<?php

namespace app\commands;

use yii\console\Controller;
use app\models\User;
use app\models\Billing;

//And used yii seed command to run the controller.
class SeedController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        $user = new User();
        
        for ( $i = 1; $i <= 10; $i++ )
        {
            $user->setIsNewRecord(true);
            $user->id = null;

            $user->name = $faker->firstName;
            $user->email = $faker->email;

            if ( $user->save() )
            {
                $billing = new Billing();
                $billing->setIsNewRecord(true);
                $billing->id = null;

                $billing->user_id = $user->id;
                $billing->invoice_name = 'Invoice No ' . $i;
                $billing->price = mt_rand(1, 1000);;

                $billing->save();
            }
        }

    }
}
