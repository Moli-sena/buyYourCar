<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem[]|\Cake\Collection\CollectionInterface $invoiceItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Lists'), ['controller' => 'CarLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car List'), ['controller' => 'CarLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceItems index large-9 medium-8 columns content">
    <h3><?= __('Invoice Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seller_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('invoice_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('car_list_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gross_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('discount_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_charge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($invoiceItems as $invoiceItem): ?>
            <tr>
                <td><?= $this->Number->format($invoiceItem->id) ?></td>
                <td><?= $this->Number->format($invoiceItem->seller_id) ?></td>
                <td><?= $invoiceItem->has('invoice') ? $this->Html->link($invoiceItem->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoiceItem->invoice->id]) : '' ?></td>
                <td><?= $invoiceItem->has('car_list') ? $this->Html->link($invoiceItem->car_list->name, ['controller' => 'CarLists', 'action' => 'view', $invoiceItem->car_list->id]) : '' ?></td>
                <td><?= $this->Number->format($invoiceItem->gross_amount) ?></td>
                <td><?= $this->Number->format($invoiceItem->quantity) ?></td>
                <td><?= $this->Number->format($invoiceItem->discount_amount) ?></td>
                <td><?= $this->Number->format($invoiceItem->total_amount) ?></td>
                <td><?= $this->Number->format($invoiceItem->delivery_charge) ?></td>
                <td><?= h($invoiceItem->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $invoiceItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
