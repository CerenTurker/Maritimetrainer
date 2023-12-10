<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Transfers extends My_controller
{
	public $transfer_model;
    public $account_model;
	public function transferMoney()
	{
        $this->transfer_model = new Transfer();
        $this->account_model = new Account();
        $senderAccount =  $this->account_model->get_by($_POST['senderAccountId']);
        $receiverAccount =  $this->account_model->get_by($_POST['receiverAccountId']);
        // Hesapların para birimlerini kontrol edin
    if ($senderAccount->currency != $receiverAccount->currency) {
        return "Error: Accounts have different currencies";
    }else{
        
         // Gönderen hesaptan çıkış yap
        if ($senderAccount->balance - $_POST['amount'] <0) {
            return "Error: your balance is insufficient";

        }else{
            $senderAccount->balance -= $_POST['amount'];
            $this->account_model->save(["owner_name"=>$senderAccount->owner_name, "balance"=>$senderAccount->balance, "currency"=>$senderAccount->currency],$senderAccount->account_id);
            
             // Alıcı hesaba giriş yap
            $receiverAccount->balance += $_POST['amount'];
            $this->account_model->save(["owner_name"=>$receiverAccount->owner_name, "balance"=>$receiverAccount->balance, "currency"=>$receiverAccount->currency],$receiverAccount->account_id);
            
            $transfer_id=$this->transfer_model->save(["from_account_id"=>$_POST['senderAccountId'], "to_account_id"=>$_POST['receiverAccountId'], "amount"=> floatval($_POST['amount'])]);
            $transfer =$this->transfer_model->get_by($transfer_id);
            print_r($transfer);
            return $transfer;
        }
    }
	}
}