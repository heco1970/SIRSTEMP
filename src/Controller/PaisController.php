<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pais Controller
 *
 * @property \App\Model\Table\PaisTable $Pais
 *
 * @method \App\Model\Entity\Pai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pais = $this->paginate($this->Pais);

        $this->set(compact('pais'));
    }

    /**
     * View method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pai = $this->Pais->get($id, [
            'contain' => []
        ]);

        $this->set('pai', $pai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pai = $this->Pais->newEntity();
        if ($this->request->is('post')) {
            $pai = $this->Pais->patchEntity($pai, $this->request->getData());
            if ($this->Pais->save($pai)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pai'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pai = $this->Pais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pai = $this->Pais->patchEntity($pai, $this->request->getData());
            if ($this->Pais->save($pai)) {
                $this->Flash->success(__('O registro foi gravado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O registro não foi gravado. Tente novamente.'));
        }
        $this->set(compact('pai'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pai = $this->Pais->get($id);
        if ($this->Pais->delete($pai)) {
            $this->Flash->success(__('O registro foi apagado.'));
        } else {
            $this->Flash->error(__('O registro não foi apagado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
