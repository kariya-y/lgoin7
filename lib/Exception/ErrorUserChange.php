<?php

namespace MyApp\Exception;

class InvalidEmail extends \Exception {
  protected $message = 'Userクラスのchangeメソッドで何か問題がありました';
}