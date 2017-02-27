<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escuelas Controller
 *
 * @property \App\Model\Table\EscuelasTable $Escuelas
 */
class EscuelasController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('TinyAuth.AuthUser');
    }
}
