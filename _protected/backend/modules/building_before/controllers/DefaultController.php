<?php

namespace backend\modules\building_before\controllers;

use backend\controllers\BackendController;


class DefaultController extends BackendController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
