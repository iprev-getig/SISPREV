<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,            
            'viewClassmap' => ['xlsx' => 'CakeExcel.Excel']
        ]);
        $this->loadComponent('Flash');

        $this->viewBuilder()->theme('TwitterBootstrap');

        $this->set('project_name', 'SISPREV');

        $this->loadComponent('Search.Prg', [
            'actions' => ['index', 'lookup']
        ]);
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        $this->configSistema();

        ini_set('memory_limit', '-1');
    }

    /**
     * getSearch method
     *
     * @return \Cake\Http\Response|string
     */
    public function getSearch($query)
    {
        $q = $query->__debugInfo()['extraOptions']['search'];
        $q = ((count($q) > 0) && (array_key_exists('q', $q))) ? $q['q'] : '';
        return $q;
    }

    /**
     * configSistema method
     *
     * @return \Cake\Http\Response|null
     */
    public function configSistema()
    {
        $config_sistema = $this->request->session()->read('config_sistema');
        if ($config_sistema == null) {
            if (($this->request->here != '/SISPREV/') 
            && ($this->request->here != '/SISPREV/pages/home')
            && (strpos($this->request->here, '/SISPREV/dashboard/index/') === false)) {
                $this->log($this->request->here, 'debug');
                //debug($this->request->here);
                $this->redirect(['controller' => 'pages', 'action' => 'home']);
            }
        }
        $this->set('config_sistema', $config_sistema);
        $this->set('config_menus', $this->menus());
    }

    /**
     * menus method
     *
     * @return \Cake\Http\Response|null
     */
    public function menus()
    {
        $acessos = TableRegistry::get('Acessos');
        $acessos = $acessos->find('all', 
            ['fields' => ['TipoAcesso.nome', 'TipoAcesso.controller', 'TipoAcesso.principal']])
        ->hydrate(false)
        ->join([
            'TipoAcesso'=>  [
                'table' => 'tipos_acessos',
                'type' => 'LEFT',
                'conditions' => 'TipoAcesso.id = acessos.tipo_acesso_id',
            ]])
        ->join([
            'Sistema'=>  [
                'table' => 'sistemas',
                'type' => 'LEFT',
                'conditions' => 'Sistema.id = acessos.sistema_id',
            ]])
        // ->where(['acessos.usuario_id' => $id])
        ->where(['acessos.index' => True])
        ->where(['Sistema.sigla' => $this->request->session()->read('config_sistema')])
        ->order(['TipoAcesso.nome']);
        return $acessos;
    }
    
}
