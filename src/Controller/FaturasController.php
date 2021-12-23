<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Faturas Controller
 *
 * @property \App\Model\Table\FaturasTable $Faturas
 *
 * @method \App\Model\Entity\Fatura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaturasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Entidadejudiciais', 'Units', 'Pagamentos']
        ];
        $faturas = $this->paginate($this->Faturas);

        $this->set(compact('faturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fatura = $this->Faturas->get($id, [
            'contain' => ['Entidadejudiciais', 'Units', 'Pagamentos']
        ]);

        $this->set('fatura', $fatura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fatura = $this->Faturas->newEntity();
        if ($this->request->is('post')) {
            $fatura = $this->Faturas->patchEntity($fatura, $this->request->getData());
            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }
        $entidadejudiciais = $this->Faturas->Entidadejudiciais->find('list', ['limit' => 200]);
        $units = $this->Faturas->Units->find('list', ['limit' => 200]);
        $pagamentos = $this->Faturas->Pagamentos->find('list', ['limit' => 200]);
        $this->set(compact('fatura', 'entidadejudiciais', 'units', 'pagamentos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fatura = $this->Faturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fatura = $this->Faturas->patchEntity($fatura, $this->request->getData());
            if ($this->Faturas->save($fatura)) {
                $this->Flash->success(__('The fatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fatura could not be saved. Please, try again.'));
        }
        $entidadejudiciais = $this->Faturas->Entidadejudiciais->find('list', ['limit' => 200]);
        $units = $this->Faturas->Units->find('list', ['limit' => 200]);
        $pagamentos = $this->Faturas->Pagamentos->find('list', ['limit' => 200]);
        $this->set(compact('fatura', 'entidadejudiciais', 'units', 'pagamentos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fatura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fatura = $this->Faturas->get($id);
        if ($this->Faturas->delete($fatura)) {
            $this->Flash->success(__('The fatura has been deleted.'));
        } else {
            $this->Flash->error(__('The fatura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
