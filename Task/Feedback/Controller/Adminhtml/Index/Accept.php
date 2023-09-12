<?php

namespace Task\Feedback\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action ;
use Magento\Framework\App\Action\Context ;
use Task\Feedback\Model\FeedbackFactory as ModelFactory;
use Task\Feedback\Model\ResourceModel\Feedback as FeedbackResourceModel ;
use Task\Feedback\Helper\Mail ; 


class Accept extends Action {

    protected $modelFactory;

    protected $feedbackResourceModel;

    protected $helperMail;

    public function __construct(
        Context $context,
        ModelFactory $modelFactory ,
        Mail $helperMail,
        FeedbackResourceModel $feedbackResourceModel)
    {
        parent::__construct($context);
        $this->modelFactory = $modelFactory;
        $this->feedbackResourceModel = $feedbackResourceModel;
        $this->helperMail = $helperMail;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = [
            'status' => 'Accepted'
        ];
        $templateId = "email_accept_template";
        // dd($id);
        $feedbackData = $this->modelFactory->create();
         $getData = $this->feedbackResourceModel->load($feedbackData,$id);

        if($getData){
            $feedbackData->addData($data);
            $firstname =$feedbackData->getData('firstName');
            $lastname =$feedbackData->getData('lastName');
            $customerName =$firstname." ".$lastname;
            $email = $feedbackData->getEmail();

            $recipientType = "";

            try{
                $getData->save($feedbackData);
                $this->helperMail->sendEmail($email,$customerName,$templateId,$recipientType);

                $this->messageManager->addSuccessMessage(__("Feedback is Accepted"));
                $redirect = $this->resultRedirectFactory->create();
                $redirect->setPath('adminfeedback/index/index');
                return $redirect;
             }
             catch(\Exception $e){
                $this->messageManager->addErrorMessage(__("Somthing Went Wrong"));
                $redirect = $this->resultRedirectFactory->create();
                $redirect->setPath('adminfeedback/index/index');
                return $redirect;
             }
        }

    }
}