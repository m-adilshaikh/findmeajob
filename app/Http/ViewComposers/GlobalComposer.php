<?php

class GlobalComposer {

  public function __construct(UserRepository $users) {
    $this->users = $users;
  }

  public function compose(View $view) {
    $view->with('count', $this->users->count());
  }

}

?>