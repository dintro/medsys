<?php

class HospitalController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('veiw','index','create','update','delete'),
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
		$model=new Hospital;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Hospital']))
		{
			$model->attributes=$_POST['Hospital'];
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

		if(isset($_POST['Hospital']))
		{
			$model->attributes=$_POST['Hospital'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
    
    public function actionCreatePdf()
        {
            $model=Hospital::model()->find();
                
            $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'L', 'cm', 'A5', true, 'UTF-8');
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor("Nicola Asuni");
            $pdf->SetTitle("На стационар");
            $pdf->SetSubject("TCPDF Tutorial");
            $pdf->SetKeywords("TCPDF, PDF, example, test, guide");
            $pdf->setPrintHeader(true);
            $pdf->setPrintFooter(false);
            $pdf->AddPage();
            $pdf->SetFont('dejavusans', " ", 17);
            
            $tbl = "ЧЕРНИГОВСКАЯ РАЙОННАЯ ПОЛИКЛИНИКА" . "<br><br>"; //. date('d.m.Y', time()) . "<br><br>";
            $tbl .= '<tbody> <li><b>Пациент</b>:';
            $tbl .= "{$model->user->fullname}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Отделение</b>:';
            $tbl .= "{$model->deps->department}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Дата поступления</b>:';
            $tbl .= "{$model->datein}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>Дата выписки</b>:';
            $tbl .= "{$model->dateout}";
            $tbl .= '</li>';
            $tbl .= '<p>';
            $tbl .= '<tbody> <li><b>№ Палаты</b>:';
            $tbl .= "{$model->ward_number}";
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
		$model=new Hospital('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hospital']))
			$model->attributes=$_GET['Hospital'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Hospital the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Hospital::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Hospital $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hospital-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
