<?php defined('__ROOT__') OR exit('No direct script access allowed');
class Account extends Model{
  // we define 3 attributes
  // they are public so that we can access them using $post->author directly
  protected $_table_name = 'accounts';
  protected $_primary_key = 'account_id';
}
