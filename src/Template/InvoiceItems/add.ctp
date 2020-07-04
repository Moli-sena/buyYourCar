<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceItem $invoiceItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Invoice Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Car Lists'), ['controller' => 'CarLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car List'), ['controller' => 'CarLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoiceItems form large-9 medium-8 columns content">
    <?= $this->Form->create($invoiceItem) ?>
    <fieldset>
        <legend><?= __('Add Invoice Item') ?></legend>
        <?php
            echo $this->Form->control('seller_id');
            echo $this->Form->control('invoice_id', ['options' => $invoices]);
            echo $this->Form->control('car_list_id', ['options' => $carLists]);
            echo $this->Form->control('gross_amount');
            echo $this->Form->control('quantity');
            echo $this->Form->control('discount_amount');
            echo $this->Form->control('total_amount');
            echo $this->Form->control('delivery_charge');
            echo $this->Form->control('created_at', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
