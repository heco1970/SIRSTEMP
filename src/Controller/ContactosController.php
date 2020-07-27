<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contactos Controller
 *
 * @property \App\Model\Table\ContactosTable $Contactos
 *
 * @method \App\Model\Entity\Contacto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas']
        ];
        $contactos = $this->paginate($this->Contactos);

        $this->set(compact('contactos'));
    }

    /**
     * View method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contacto = $this->Contactos->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('contacto', $contacto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contacto = $this->Contactos->newEntity();
        if ($this->request->is('post')) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('The contacto has been saved.'));

                return $this->redirect(['controller'=>'pessoas','action' => 'index']);
            }
            $this->Flash->error(__('The contacto could not be saved. Please, try again.'));
        }
        $pessoas = $this->Contactos->Pessoas->find('all');
        $this->set(compact('contacto', 'pessoas'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contacto = $this->Contactos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('The contacto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contacto could not be saved. Please, try again.'));
        }
        $pessoas = $this->Contactos->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('contacto', 'pessoas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contacto = $this->Contactos->get($id);
        if ($this->Contactos->delete($contacto)) {
            $this->Flash->success(__('The contacto has been deleted.'));
        } else {
            $this->Flash->error(__('The contacto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
