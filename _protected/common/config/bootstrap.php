<?php
/**
 * Set common path aliases that are either used or overridden by applications
 */

// Path to the installation directory
Yii::setAlias('root', dirname(dirname(dirname(__DIR__))));
// Url to the installation directory
Yii::setAlias('rootUrl', '/kmc');

// Path to applications directories
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('api', dirname(dirname(__DIR__)) . '/api');

// Base path and url to upload directory
Yii::setAlias('uploadPath',Yii::getAlias('@root/uploads/'));
Yii::setAlias('uploadUrl',Yii::getAlias('@rootUrl/uploads/'));

