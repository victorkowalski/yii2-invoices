<?php

namespace app\controllers;

use app\jobs\DownloadJob;
use Yii;

class QueueController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->request->post()) {
/*
            Yii::$app->queue->push(new DownloadJob([
                'url' => 'http://example.com/image.jpg',
                'file' => '/tmp/image.jpg',
            ]));
*/
            
            // Push a job into the queue and get a message ID.
            $id = Yii::$app->queue->push(new DownloadJob([
                'url' => 'https://avatars.mds.yandex.net/get-zen_doc/175411/pub_5eaf016d70671122c89d7052_5eaf05314670757c12fe47f5/scale_2400',
                //'http://example.com/image.jpg',
                'file' => '/tmp/image.jpg',
            ]));

            // Check whether the job is waiting for execution.
            $isWaiting = Yii::$app->queue->isWaiting($id);

            // Check whether a worker got the job from the queue and executes it.
            $isReserved = Yii::$app->queue->isReserved($id);

            // Check whether a worker has executed the job.
            $isDone = Yii::$app->queue->isDone($id);

            Yii::$app->session->setFlash('queue Job Submitted');

            //run
            $queue = Yii::$app->queue; 
            $queue->run(false);
            
            //$output = shell_exec('ls'); 
  
            // Display the list of all file 
            // and directory 
            //echo "<pre>$output</pre>"; 
/*
            exec('rm /var/www/html/test.html 2>&1', $output); var_dump($output);
            $process = new Process(['rm', '/var/www/html/test.html']);

            $process->run();
            */

        }

        return $this->render('index');
    }

}
