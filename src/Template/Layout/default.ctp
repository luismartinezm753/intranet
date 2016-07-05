<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Intranet';
?>
<!DOCTYPE html>
<html>
<head>
    <?= 
        $this->Html->script(array(
        'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
        'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js',
        'https://use.fontawesome.com/a8297223fb.js',
        'bootstrap.min.js'
    ));

    $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
