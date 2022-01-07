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
            $contacto->telefone = $this->request->getData('telefone_completo');
            $contacto->telemovel = $this->request->getData('telemovel_completo');
            $contacto->fax = $this->request->getData('fax_completo');

            $this->log($contacto);

            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('O contacto foi guardado com sucesso.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Não foi possível guardar o contacto. Por favor tente novamente'));
        }
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
        //get contacto object by his ID
        $contacto = $this->Contactos->get($id, [
            'contain' => ['Pessoas']
        ]);

        //get pessoa object from contact.pesssoa_id by its ID
        $this->loadModel('Pessoas');
        $pessoa = $this->Pessoas->get($contacto->pessoa_id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->log($this->request->getData());
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            $contacto->telefone = $this->request->getData('telefone_completo');
            $contacto->telemovel = $this->request->getData('telemovel_completo');
            $contacto->fax = $this->request->getData('fax_completo');

            if ($this->Contactos->save($contacto)) {
                $this->Flash->success(__('O contacto foi atualizado com sucesso.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Não foi possível guardar o contacto. Por favor tente novamente'));
        }
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
        $contacto = $this->Contactos->get($id);
        if ($this->Contactos->delete($contacto)) {
            $this->Flash->success(__('O contacto foi apagado com sucesso'));
        } else {
            $this->Flash->error(__('Não foi possível apagar o contacto. Por favor tente novamente.'));
        }

        return $this->redirect($this->referer());
    }
}
