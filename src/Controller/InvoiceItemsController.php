<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvoiceItems Controller
 *
 * @property \App\Model\Table\InvoiceItemsTable $InvoiceItems
 *
 * @method \App\Model\Entity\InvoiceItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sellers', 'Invoices', 'CarLists'],
        ];
        $invoiceItems = $this->paginate($this->InvoiceItems);

        $this->set(compact('invoiceItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceItem = $this->InvoiceItems->get($id, [
            'contain' => ['Sellers', 'Invoices', 'CarLists'],
        ]);

        $this->set('invoiceItem', $invoiceItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceItem = $this->InvoiceItems->newEntity();
        if ($this->request->is('post')) {
            $invoiceItem = $this->InvoiceItems->patchEntity($invoiceItem, $this->request->getData());
            if ($this->InvoiceItems->save($invoiceItem)) {
                $this->Flash->success(__('The invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice item could not be saved. Please, try again.'));
        }
        $sellers = $this->InvoiceItems->Sellers->find('list', ['limit' => 200]);
        $invoices = $this->InvoiceItems->Invoices->find('list', ['limit' => 200]);
        $carLists = $this->InvoiceItems->CarLists->find('list', ['limit' => 200]);
        $this->set(compact('invoiceItem', 'sellers', 'invoices', 'carLists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceItem = $this->InvoiceItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceItem = $this->InvoiceItems->patchEntity($invoiceItem, $this->request->getData());
            if ($this->InvoiceItems->save($invoiceItem)) {
                $this->Flash->success(__('The invoice item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice item could not be saved. Please, try again.'));
        }
        $sellers = $this->InvoiceItems->Sellers->find('list', ['limit' => 200]);
        $invoices = $this->InvoiceItems->Invoices->find('list', ['limit' => 200]);
        $carLists = $this->InvoiceItems->CarLists->find('list', ['limit' => 200]);
        $this->set(compact('invoiceItem', 'sellers', 'invoices', 'carLists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceItem = $this->InvoiceItems->get($id);
        if ($this->InvoiceItems->delete($invoiceItem)) {
            $this->Flash->success(__('The invoice item has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
