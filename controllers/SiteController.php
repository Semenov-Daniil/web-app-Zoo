<?php

namespace app\controllers;

use app\models\Accommodation;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Kinds;
use app\models\Premises;
use app\models\RegisterForm;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->userRegister()) {
                    Yii::$app->user->login($user);
                    return $this->goHome();
                }
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCount()
    {
        $model = new Premises();
        $listTitle = ArrayHelper::map(Premises::find()->orderBy('title')->all(), 'title', 'title');
        $countFeed = '';
        $promt = '';

        if (Yii::$app->request->isPost) {
            $promt = Yii::$app->request->post()['Premises']['title'];
            $countFeed = Accommodation::countFeet(Yii::$app->request->post()['Premises']['title']);
        }

        return $this->render('countFeed', ['model' => $model, 'listTitle' => $listTitle, 'countFeed' => $countFeed, 'promt' => $promt]);
    }

    public function actionCountKinds()
    {
        $model = new Kinds();
        $listTitle = ArrayHelper::map(Kinds::find()->orderBy('family')->all(), 'family', 'family');
        $countKinds = '';
        $promt = '';

        if (Yii::$app->request->isPost) {
            $promt = Yii::$app->request->post()['Kinds']['family'];
            $countKinds = Kinds::countKinds(Yii::$app->request->post()['Kinds']['family']);
        }

        return $this->render('countKinds', ['model' => $model, 'listTitle' => $listTitle, 'countKinds' => $countKinds, 'promt' => $promt]);
    }
}
