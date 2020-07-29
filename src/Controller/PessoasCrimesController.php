<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasCrimes Controller
 *
 * @property \App\Model\Table\PessoasCrimesTable $PessoasCrimes
 *
 * @method \App\Model\Entity\PessoasCrime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasCrimesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'Crimes']
        ];
        $pessoasCrimes = $this->paginate($this->PessoasCrimes);

        $this->set(compact('pessoasCrimes'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Crime id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasCrime = $this->PessoasCrimes->get($id, [
            'contain' => ['Pessoas', 'Crimes']
        ]);

        $this->set('pessoasCrime', $pessoasCrime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasCrime = $this->PessoasCrimes->newEntity();
        if ($this->request->is('post')) {
            $pessoasCrime = $this->PessoasCrimes->patchEntity($pessoasCrime, $this->request->getData());
            if ($this->PessoasCrimes->save($pessoasCrime)) {
                $this->Flash->success(__('The pessoas crime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas crime could not be saved. Please, try again.'));
        }
        $pessoas = $this->PessoasCrimes->Pessoas->find('list', ['limit' => 200]);
        $crimes = $this->PessoasCrimes->Crimes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasCrime', 'pessoas', 'crimes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Crime id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasCrime = $this->PessoasCrimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasCrime = $this->PessoasCrimes->patchEntity($pessoasCrime, $this->request->getData());
            if ($this->PessoasCrimes->save($pessoasCrime)) {
                $this->Flash->success(__('The pessoas crime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas crime could not be saved. Please, try again.'));
        }
        $pessoas = $this->PessoasCrimes->Pessoas->find('list', ['limit' => 200]);
        $crimes = $this->PessoasCrimes->Crimes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasCrime', 'pessoas', 'crimes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Crime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasCrime = $this->PessoasCrimes->get($id);
        if ($this->PessoasCrimes->delete($pessoasCrime)) {
            $this->Flash->success(__('The pessoas crime has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas crime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
