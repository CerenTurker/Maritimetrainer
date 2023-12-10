<?php defined('__ROOT__') OR exit('No direct script access allowed');
class Transfer extends Model{
  // we define 3 attributes
  // they are public so that we can access them using $post->author directly
// Para transferi işlemi
protected $_table_name = 'transfers';
protected $_primary_key = 'transfer_id';
}