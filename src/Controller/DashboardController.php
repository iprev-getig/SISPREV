<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboard Controller
 *
 *
 */
class DashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($config_sistema)
    {
        $this->request->session()->write('config_sistema', $config_sistema);
        $this->set(compact('config_sistema'));
    }

}
