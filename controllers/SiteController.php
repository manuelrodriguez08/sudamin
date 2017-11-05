<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
      
    /**
     * @inheritdoc
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
       
   

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(["site/index"]);
        } else {
			return $this->render('login', [
				'model' => $model,
			]);
        }
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

    public function actionAdmin()
    {
        return $this->render('admin');
    }
    public function actionUser()
    {
        

        return $this->render('user');
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionCrearpermiso(){
	
	   $auth = Yii::$app->authManager;
    // Author -> index/create/view
    // Admin -> {Author} and update/delete -> index/create/view/update/delete
    
    /*$index = $auth->createPermission('Persona/index');
	$index->description = 'Create a index';
    $auth->add($index);
		
    $create = $auth->createPermission('Persona/create');
	$create->description = 'Create a index';
    $auth->add($create);
    $view = $auth->createPermission('Persona/view');
	$view->description = 'Create a index';
    $auth->add($view);
    
    $update = $auth->createPermission('Persona/update');
	$update->description = 'Create a index';
    $auth->add($update);
    $delete = $auth->createPermission('Persona/delete');
	$delete->description = 'Create a index';
    $auth->add($delete);*/
    
    // add "author" role and give this role the "createPost" permission
    $author = $auth->createRole('author');
    $auth->add($author);
    //$auth->addChild($author, $index);
    //$auth->addChild($author, $create);
    //$auth->addChild($author, $view);
    
    // add "admin" role and give this role the "updatePost" permission
    // as well as the permissions of the "author" role
    $admin = $auth->createRole('admin');
    $auth->add($admin);
    //$auth->addChild($admin, $author);
    //$auth->addChild($admin, $update);
    //$auth->addChild($admin, $delete);
	
	$auth->assign($author, 2);
    $auth->assign($admin, 1);
	
	
	}
}
