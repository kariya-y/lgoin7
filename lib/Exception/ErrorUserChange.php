<?php

namespace MyApp\Exception;

class ErrorUserChange extends \Exception {
  protected $message = 'Userクラスのchangeメソッドで何か問題がありました';
}