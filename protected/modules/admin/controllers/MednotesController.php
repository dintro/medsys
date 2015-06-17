<?php

class MednotesController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			#'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('veiw','index','create','update','delete','selectstaff','createpdf'),
				'roles'=>array('2'),
			),
			array('deny',  // deny all users
				'roles'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Mednotes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mednotes']))
		{
			$model->attributes=$_POST['Mednotes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}    

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Mednotes']))
		{
			$model->attributes=$_POST['Mednotes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
    /** Action to select staff ordered by departments  */
    
    public function actionSelectStaff()
        {
          $giatUnit = (!empty($_POST['deps_id'])) ? $_POST['deps_id']: '0';
          $data=Staff::model()->findAll('deps_id=:deps_id',
          array(':deps_id'=>$giatUnit));
          $data=CHtml::listData($data,'id','fullname');
          foreach($data as $value=>$fullName)
          {
          echo CHtml::tag('option',array('value'=>$value),CHtml::encode($fullName),true);
          }
        }
        
        
    public function actionCreatePdf()
        {
            $model=Mednotes::model()->find();
                
            $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'L', 'cm', 'A5', true, 'UTF-8');
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor("Nicola Asuni");
            $pdf->SetTitle("Мед. запись");
            $pdf->SetSubject("TCPDF Tutorial");
            $pdf->SetKeywords("TCPDF, PDF, example, test, guide");
            $pdf->setPrintHeader(true);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();
            $pdf->SetFont('dejavusans', " ", 17);
            
            $tbl = "ПОЛИКЛИНИЧЕСКИЙ МЕДИЦИНСКИЙ ЦЕНТР Г. ЧЕРНИГОВА" . "<br><br>"; //. date('d.m.Y', time()) . "<br><br>";
            $tbl .= '<tbody> <li><b>Пациент</b>:';
            $tbl .= "{$model->user->fullname}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Отделение</b>:';
            $tbl .= "{$model->deps->department}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Врач</b>:';
            $tbl .= "{$model->staff->fullname}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Дата приёма</b>:';
            $tbl .= "{$model->meetdate}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Время приёма</b>:';
            $tbl .= "{$model->meettime}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Кабинет</b>:';
            $tbl .= "{$model->office_num}";
            $tbl .= '</li>';
            $tbl .='</tbody>';
                
            $pdf->writeHTML($tbl, true, true, false, false, '');
            $pdf->Output("example_002.pdf", "I");
        }
        
        
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Mednotes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Mednotes']))
			$model->attributes=$_GET['Mednotes'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Mednotes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Mednotes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Mednotes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='mednotes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
