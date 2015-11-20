<?php
	/**
	 * Created by sajib.
	 * Email: sajib.cse03@gmail.com
	 * Date: 1/9/13 2:49 AM
	 */
	class fileUpload
	{

		private  $model;
		private $uploadLocation;
		private $isRantomNumber;
		private $randomNumberLength;
		private $fileName;

		private $getneratedFileName;

		private $uploadedFile;

		public function fileUpload($model, $fileName, $uploadLocation, $isRantomNumber, $randomNumberLength)
		{
			$this->model = $model;
			$this->fileName = $fileName;
			$this->uploadLocation = Yii::app()->basePath.'/../'.$uploadLocation.'/';
			$this->isRantomNumber = $isRantomNumber;
			$this->randomNumberLength = $isRantomNumber;
		}

		private  function genarateRandomNumber()
		{
			$this->getneratedFileName = md5( substr(md5(microtime()),rand(0,26),15));
		}

		private function upload()
		{
			$this->uploadedFile = CUploadedFile::getInstance($this->model, $this->fileName);
		}

	}
