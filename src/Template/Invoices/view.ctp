<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['controller' => 'InvoiceItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Item'), ['controller' => 'InvoiceItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoices view large-9 medium-8 columns content">
    <h3><?= h($invoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->name, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Id') ?></th>
            <td><?= h($invoice->order_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gross') ?></th>
            <td><?= $this->Number->format($invoice->gross) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($invoice->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax') ?></th>
            <td><?= $this->Number->format($invoice->tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Amount') ?></th>
            <td><?= $this->Number->format($invoice->total_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($invoice->created_at) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoice Items') ?></h4>
        <?php if (!empty($invoice->invoice_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Seller Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Car List Id') ?></th>
                <th scope="col"><?= __('Gross Amount') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Discount Amount') ?></th>
                <th scope="col"><?= __('Total Amount') ?></th>
                <th scope="col"><?= __('Delivery Charge') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_items as $invoiceItems): ?>
            <tr>
                <td><?= h($invoiceItems->id) ?></td>
                <td><?= h($invoiceItems->seller_id) ?></td>
                <td><?= h($invoiceItems->invoice_id) ?></td>
                <td><?= h($invoiceItems->car_list_id) ?></td>
                <td><?= h($invoiceItems->gross_amount) ?></td>
                <td><?= h($invoiceItems->quantity) ?></td>
                <td><?= h($invoiceItems->discount_amount) ?></td>
                <td><?= h($invoiceItems->total_amount) ?></td>
                <td><?= h($invoiceItems->delivery_charge) ?></td>
                <td><?= h($invoiceItems->created_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceItems', 'action' => 'view', $invoiceItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceItems', 'action' => 'edit', $invoiceItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceItems', 'action' => 'delete', $invoiceItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
