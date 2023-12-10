<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Accounts extends My_controller
{
	public $account_model;
	public function __construct() {
		$this->account_model = new Account();
	}
	public function index()
	{
		$allAccounts = $this->account_model->get();
		return $allAccounts;
	
	}
	public function createAccount()
	{
		$sonuc = $this->account_model->save(["owner_name"=>$_POST['owner_name'],"balance"=>$_POST['balance'], "currency"=>$_POST['$currency']]);
		$account =  $this->account_model->get_by($sonuc);
		return $account;
	}
	public function getAccountById()
	{
		$account =  $this->account_model->get_by($_POST['account_id']);
		return $account ;
	}
	public function deleteAccount()
	{
		$accounts = $this->account_model->delete($_POST['id']);
		return $accounts ;
	}
}