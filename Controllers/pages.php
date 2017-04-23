<?php
  class PagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('Views/Pages/home.php');
    }

    public function error() {
      require_once('Views/Pages/Shared/Error.php');
    }
  }
?>