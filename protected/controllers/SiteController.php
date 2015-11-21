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

    private function dealVisitPlus($deal)
    {
        $deal->deal_visit +=1;
        $deal->save();
    }


    /**
     * This is the default 'index'action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionDealDetails($state, $city, $category, $id)
    {

        Yii::app()->user->setReturnUrl(Yii::app()->request->url);

        Yii::import('application.vendors.*');

        $deal = Deals::model()->findByAttributes(array('deal_id'=>$id));

        $this->dealVisitPlus($deal);

         // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('details', array('deal'=>$deal));
    }



    /**
	 * This is the default 'index'action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

        $deal = new Deals();
        $criteria=new CDbCriteria(array(
            //'order'=>'status desc',
            'condition'=>"deal_status='Active'",
        ));
        $dataProvider=new CActiveDataProvider('deals', array(
            'criteria'=>$criteria,
        ));
        $dataProvider->pagination->pageSize=8;

        $this->render('index',array('dataProvider'=>$dataProvider));
	}

    public function actionAuthorizeIPN()
    {
//        $data = array(
//            'x_response_code'=>1,
//            'x_response_reason_code'=>1,
//            'x_response_reason_text'=>'This transaction has been approved.',
//            'x_avs_code'=>'Y',
//            'x_auth_code'=>'CYDSQZ',
//            'x_trans_id'=>2193987006 ,
//            'x_method'=>'CC',
//            'x_card_type'=>'Visa',
//            'x_account_number'=>'XXXX8888',
//            'x_first_name'=>'asm',
//            'x_last_name'=>'hossain',
//
//            'x_email'=>'sajib.cse03@gmail.com',
//            'x_invoice_num'=>101,
//            'x_description'=>'Goodlynx',
//            'x_type'=>'auth_capture',
//            'x_cust_id'=>'31',
//            'x_amount'=>'10.00',
//            'x_tax_exempt'=>'FALSE',
//        );
//
//        if($data['x_response_code']==1)
//        {
//            $transaction  = new Transaction();
//            $transactionDetails = new TransactionDetails();
//
//            $trans = Yii::app()->db->beginTransaction();
//
//            try
//            {
//                $transaction->user_id = $data['x_cust_id'];
//                $transaction->deal_id = $data['x_invoice_num'];
//                $transaction->number_of_deal = 1;
//                $transaction->amount = $data['x_amount'];
//                $transaction->status ='received';
//                if($transaction->save())
//                {
//                    $transactionDetails->transaction_id = $transaction->transaction_id;
//                    $transactionDetails->payment_type_id = 2;
//                    $transactionDetails->payment_transaction_id = $data['x_trans_id'];
//                    $transactionDetails->payment_transaction_code = $data['x_auth_code'];
//                    $transactionDetails->payment_transaction_code = $data['x_auth_code'];
//                    $transactionDetails->credit_card_type = $data['x_card_type'];
//                    $transactionDetails->payment_account_number = $data['x_account_number'];
//                    $transactionDetails->payment_response_message = $data['x_response_reason_text'];
//                    if($transactionDetails->save())
//                        $trans->commit();
//                }
//            }
//            catch(Exception $e)
//            {
//                $trans->rollback();
//            }
//
//
//        }

        print_r($_REQUEST);

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
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}