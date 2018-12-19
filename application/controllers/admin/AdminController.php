<?php

namespace application\controllers\admin;

use application\core\Controller;

class AdminController extends Controller {
	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}
}