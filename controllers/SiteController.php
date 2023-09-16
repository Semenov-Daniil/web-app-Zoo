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
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
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

        if ((Yii::$app->session)['enter'] == 3) {
            (Yii::$app->session)->destroy();
            return $this->goHome();
        }
        
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

    public function actionFormCountFood()
    {
        $model = new Premises();
        if (Yii::$app->request->isPost) {
            $model = new Kinds();
            $premises = Yii::$app->request->post()['Premises']['title'];
            $query = Kinds::countFood($premises);
            $dataProvider = new ArrayDataProvider([
                'allModels' => $query->asArray()->all(),
                'pagination' => false,
            ]);
            return $this->render('view-count-food', ['premises' => $premises, 'dataProvider' => $dataProvider, 'sum' => $query->sum('count_feed')]);
        }

        $listTitle = ArrayHelper::map(Premises::find()->orderBy('title')->all(), 'title', 'title');
        return $this->render('form-count-food', ['model' => $model, 'listTitle' => $listTitle]);
    }

    public function actionFormKindsPremises()
    {
        $kinds = new Kinds();
        $premises = new Premises();
        $premises->is_pond = 0;
        $listTitle = ArrayHelper::map(Kinds::find()->orderBy('title')->all(), 'title', 'title');
        $radioList = ['Без водоема', 'C водоем'];
        if (Yii::$app->request->isPost) {
            $data = Accommodation::kindsPremises(Yii::$app->request->post()['Kinds']['title'], Yii::$app->request->post()['Premises']['is_pond']);
            $dataProvider = new ArrayDataProvider([
                'allModels' => $data,
                'pagination' => false
            ]);
            return $this->render('view-kinds-premises', ['dataProvider' => $dataProvider]);
        }
        return $this->render('form-kinds-premises', ['kinds' => $kinds, 'premises' => $premises, 'listTitle' => $listTitle, 'radioList' => $radioList]);
    }

    public function actionFormCountKinds()
    {
        $model = new Kinds();
        $listTitle = ArrayHelper::map(Kinds::find()->orderBy('family')->all(), 'family', 'family');

        if (Yii::$app->request->isPost) {
            $family = Yii::$app->request->post()['Kinds']['family'];
            $count = Kinds::countKinds($family);
            return $this->render('view-count-kinds', ['family' => $family, 'count' => $count]);
        }

        return $this->render('form-count-kinds', ['model' => $model, 'listTitle' => $listTitle]);
    }

    public function actionFormPremisesKinds()
    {
        $premises = new Premises();
        $listTitle = ArrayHelper::map(Premises::find()->orderBy('title')->all(), 'title', 'title');
        if (Yii::$app->request->isPost) {
            $data = Accommodation::premisesKinds(Yii::$app->request->post()['Premises']['title']);
            $dataProvider = new ArrayDataProvider([
                'allModels' => $data,
                'pagination' => false
            ]);
            return $this->render('view-premises-kinds', ['dataProvider' => $dataProvider]);
        }
        return $this->render('form-premises-kinds', ['premises' => $premises, 'listTitle' => $listTitle]);
    }
}
