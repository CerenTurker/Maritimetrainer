<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Entries extends My_controller{

public $account_model;
public $entry_model;

public function __construct() {
	$this->account_model = new Account();
    $this->entry_model = new Entry();
    $object = new stdClass();

}
public function depositMoney() {
    $account =$this->account_model->get_by($_POST['account_id']);
    $total=$account->balance + $_POST['amount'];

    // Hareketleri entries tablosuna ekle
    $entry_id=$this->entry_model->save(["account_id"=>$_POST['account_id'],"amount"=>$_POST['amount'], "transaction_type"=>'deposit']);
    $entry =$this->entry_model->get_by($entry_id);
    // Bakiyeyi accounts tablosunda güncelle
    $this->account_model->save(["owner_name"=>$account->owner_name,"balance"=>$total, "currency"=>$account->currency],$_POST['account_id']);
    return $entry;
}

// Para çekme (Withdraw) işlemi
public function withdrawMoney() {
    $account =  $this->account_model->get_by($_POST['account_id']);

    // Kontrol: Yeterli bakiye var mı?
    if ($account->balance >= $_POST['amount']) {
        $total=$account->balance - $_POST['amount'];

        // Hareketleri entries tablosuna ekle
        $entry_id=$this->entry_model->save(["account_id"=>$_POST['accountId'],"amount"=>$_POST['amount'], "transaction_type"=>'withdrawal']);

        $entry =$this->entry_model->get_by($entry_id);

        // Bakiyeyi accounts tablosunda güncelle
        $this->account_model->save(["owner_name"=>$account->owner_name,"balance"=>$total, "currency"=>$account->currency],$_POST['account_id']);

        return $entry;

    } else {
        // Yetersiz bakiye hatası
        echo "Hata: Yetersiz bakiye.";
    }
}
}