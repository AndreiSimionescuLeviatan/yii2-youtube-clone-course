<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\debug\panels\EventPanel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['like','dislike'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
            ],
            'verb'=> [
                'class'=>VerbFilter::class,
                'actions'=>[['post'],
                    'like'=>['post'],
                ]
            ]
        ];
    }

    public function actionIndex(){
        $dataProvider=new ActiveDataProvider([
           'query' => Video::find()->published()->latest()
        ]);

        //trimite-ma la index cu datele din provider
        return $this->render('index',[
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionView($video_id)
    {
            $this->layout='auth';
            $video=$this->findVideo($video_id);
            $videoView= new VideoView();
            $videoView->video_id=$video_id;
            $videoView->user_id=\Yii::$app->user->id;
            $videoView->created_at=time();
            $videoView->save();

           return $this->render('view',[
               'model'=>$video
           ]);
    }

    public function actionDislike($video_id)
    {
        $video=$this->findVideo($video_id);
        $userId=\Yii::$app->user->id;

        $videoLikeDislike=VideoLike::find()
            ->userIdVideoId($userId,$video_id)
            ->one();

        if(!$videoLikeDislike)
        {
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_DISLIKE);
        }else if ($videoLikeDislike->type==VideoLike::TYPE_DISLIKE){
            $videoLikeDislike->delete();
        }else
        {
            $videoLikeDislike->delete();
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_DISLIKE);
        }

        return $this->renderAjax('_buttons',
            [
                'model'=>$video
            ]);
    }

    public function actionLike($video_id)
    {
        $video=$this->findVideo($video_id);
        $userId=\Yii::$app->user->id;

        $videoLikeDislike=VideoLike::find()
            ->userIdVideoId($userId,$video_id)
            ->one();

        if(!$videoLikeDislike)
        {
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_LIKE);
        }else if ($videoLikeDislike->type==VideoLike::TYPE_LIKE){
            $videoLikeDislike->delete();
        }else
        {
            $videoLikeDislike->delete();
            $this->saveLikeDislike($video_id, $userId, VideoLike::TYPE_LIKE);
        }

        return $this->renderAjax('_buttons',
            [
                'model'=>$video
            ]);
    }

    public function actionSearch($keyword)
    {
        $dataProvider=new ActiveDataProvider([
            'query' => Video::find()
                ->published()
                ->latest()
                ->byKeyword($keyword)
        ]);

        //trimite-ma la index cu datele din provider
        return $this->render('search',[
            'dataProvider'=>$dataProvider
        ]);
    }

    protected function findVideo($video_id)
    {
        $video=Video::findOne($video_id);
        if(!$video)
        {
            throw new NotFoundHttpException('Video does not exist');
        }

        return $video;
    }

    protected function saveLikeDislike($videoId,$userId,$type)
    {
        $videoLikeDislike=new VideoLike();
        $videoLikeDislike->video_id=$videoId;
        $videoLikeDislike->user_id=$userId;
        $videoLikeDislike->type=$type;
        $videoLikeDislike->created_at=time();
        $videoLikeDislike->save();
    }
}