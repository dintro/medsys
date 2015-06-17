<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

    /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionRegistration()
	{
		$model=new User;
        $model->scenario = 'registration';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
            
            $settings = Settings::model()->findByPk(1);
            
            if($settings->defaultStatusUser==0){
                $model->ban = 1;
            } else {
                $model->ban = 0;
            }
			if($model->save()){
			 
                if($settings->defaultStatusUser==0){
                    Yii::app()->user->setFlash('registration','Вы можете авторизоваться.');
                } else {
                    Yii::app()->user->setFlash('registration','Ждите подтверждения администратора.');
                }
			}
		}

		$this->render('registration',array(
			'model'=>$model,
		));
	}
    
    public function actionAddMedOrder()
	{
		$model=new Mednotes;
        $model->scenario = 'addmedorder';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mednotes']))
		{
			$model->attributes=$_POST['Mednotes'];
			if($model->save()){
                    Yii::app()->user->getFlash('success','Ваша заявка принята и обрабатывается. Мы оповестим Вас в ближайшие 24 часа.');
			}
		}

		$this->render('addmedorder',array(
			'model'=>$model,
		));
	}
    
    public function actionAddStacionar()
	{
		$model=new Hospital;
        $model->scenario = 'addstacionar';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hospital']))
		{
			$model->attributes=$_POST['Hospital'];
			if($model->save()){
                    Yii::app()->user->getFlash('success','Ваша заявка принята и обрабатывается. Мы оповестим Вас в ближайшие 24 часа.');
			}
		}

		$this->render('addstacionar',array(
			'model'=>$model,
		));
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
    
    public function actionDepartments()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('departments');
	}
    
    public function actionDoctors()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('doctors');
	}
    
    public function actionInfo()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('info');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: $name <{$model->email}>\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Спасибо что написали нам. Очень скоро мы свяжемся с Вами.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}