<?php
class customerApiController extends SecController{

	public function checkLogin(){

		$email_post = $_POST['email'];
		$pass_post = $_POST['pass'];

		require(MODEL."customer/customerModel.php");
		$customer_model = new customerModel();

		$customer = $customer_model->getCustomer($email_post);
		
		$errors = [];
		if($customer){
			if($customer['password'] !== $pass_post){
				$errors[] = array("msg"=>"Incorrect pass", "field" =>"pass");
			}
		}else{
			$errors[] = array("msg"=>"Email not found", "field" =>"email");
		}

		$data = array();
		$data['errors'] = $errors;

		if(count($errors) === 0){
			if($customer['password'] === $pass_post){

				require(CONTROLLER."login/loginController.php");
				$login_controller = new loginController();
				$login_controller->login();

				$data["success"] = true;
			}
		}

		return $data;
	}
}