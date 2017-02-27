<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends \Cake\Controller\Controller
{
    use \Crud\Controller\ControllerTrait;
    public $components = array(
        'UserPermissions.UserPermissions',
    );

    public $helpers = [
        'Modal' => [
            'className' => 'Bootstrap.BootstrapModal'
        ]
    ];


    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
        $this->loadComponent('Auth', [
            'authError'=>'No estas autorizado a ver esta página',
            'flash' => [
                'element' => 'error',
                'key' => 'auth'
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'unauthorizedRedirect'=>$this->request->session()->read('lastUrl'),
            'authorize' => [
                'TinyAuth.Tiny'
            ]
        ]);
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.Add',
                'Crud.Edit',
                'Crud.View',
                'Crud.Delete'
            ]
        ]);

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['verify','changePassword']);
        $url = Router::url(NULL, true); //complete url
        if (!preg_match('/login|logout/i', $url)){
            $this->request->session()->write('lastUrl', $url);
        }
    }
    public function getMonthName($month){
        $months = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        return $months[$month-1];
    }
}
