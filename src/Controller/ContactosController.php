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
    public function add($id = null)
    {
        $this->loadModel('Pessoas');
        $pessoa = $this->Pessoas->get($id);
        $contacto = $this->Contactos->newEntity();

        if ($this->request->is('post')) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            $contacto->pessoa_id = $pessoa->id;
            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('O contacto foi guardado com sucesso.'));
                if ($id != null) {
                    $this->redirect(array('controller' => 'Pessoas', 'action' => 'view/' . $id));
                } else {
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('Não foi possível guardar o contacto. Por favor tente novamente'));
        }
        // $this->set('pais', $this->Contactos->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']));
        // $this->set('pessoas', $this->Contactos->Pessoas->find('list', ['limit' => 200]));
        $this->set(compact('contacto', 'pessoa'));
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
        $this->loadModel('Pessoas');
        $contacto = $this->Contactos->get($id, [
            'contain' => ['Pessoas']
        ]);
        $pessoa = $this->Pessoas->get($contacto->pessoa_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('O contacto foi guardado com sucesso.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Não foi possível guardar o contacto. Por favor tente novamente'));
        }
        // $this->set('pais', $this->Contactos->Pais->find('list', ['keyField' => 'id', 'valueField' => 'paisNome']));
        // $this->set('pessoas', $this->Contactos->Pessoas->find('list', ['limit' => 200]));
        $this->set(compact('contacto', 'pessoa'));
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
        //$this->request->allowMethod(['post', 'delete']);
        $contacto = $this->Contactos->get($id);
        if ($this->Contactos->delete($contacto)) {
            $this->Flash->success(__('O contacto foi apagado com sucesso'));
        } else {
            $this->Flash->error(__('Não foi possível apagar o contacto. Por favor tente novamente.'));
        }

        return $this->redirect($this->referer());
    }
}
