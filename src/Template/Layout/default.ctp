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

$cakeDescription = 'KenpoNet';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <?= $this->Html->css('sb-admin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
    </header>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link("KenpoNet", [
                    'controller' => 'users',
                    'action' => 'view',
                    $this->request->session()->read('Auth.User.id')
                ],['escape' => false,'class'=>'navbar-brand']); ?>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=  $this->request->session()->read('Auth.User.username')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i>Salir', [
                                'controller' => 'users',
                                'action' => 'logout'
                            ],['escape' => false]); ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php if ($this->request->session()->read('Auth.User.username')): ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php if (!($this->AuthUser->hasRole(ROLE_STUDENT))):?>
                        <li>
                            <?php echo $this->Html->link("Usuarios", [
                                'controller' => 'users',
                                'action' => 'index'
                            ],['escape' => false]); ?>
                        </li>
                    <?php else: ?>
                        <li>
                            <?php echo $this->Html->link("Usuarios", [
                                'controller' => 'users',
                                'action' => 'view',
                                $this->AuthUser->id()
                            ],['escape' => false]); ?>
                        </li>
                    <?php endif; ?>
                    <li>
                        <?php echo $this->Html->link("Grados", [
                            'controller' => 'Grados',
                            'action' => 'index'
                        ],['escape' => false]); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link("Eventos", [
                            'controller' => 'FullCalendar',
                            'action' => 'index'
                        ],['escape' => false]); ?>
                    </li>
                    <?php if (!$this->AuthUser->hasRole(ROLE_STUDENT)):?>
                        <li>
                            <?php echo $this->Html->link("Pagos", [
                                'controller' => 'pagos',
                                'action' => 'index'
                            ],['escape' => false]); ?>
                        </li>
                    <?php endif ?>
                    <?php if (!$this->AuthUser->hasRole(ROLE_STUDENT)):?>
                        <li>
                            <?php echo $this->Html->link("Clases", [
                                'controller' => 'clases',
                                'action' => 'index'
                            ],['escape' => false]); ?>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
            <?php endif; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <?= $this->Flash->render() ?>
            <?= $this->Flash->render('auth') ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <!--<div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>-->
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
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
</body>
</html>
