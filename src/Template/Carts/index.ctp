<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart[]|\Cake\Collection\CollectionInterface $carts
 */
?>




<section style="padding:0 0;!important">
	<div class="container">
               <div class="text-center">
                    <h1>My Order</h1>

                    </div>
    </div>
	</section>	  
<section class="section-background">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Car Name</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($carts as $cart): ?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">Product 1</h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?=$cart->price?></td>
							<td data-th="Quantity">
								1
							</td>
							<td data-th="Subtotal" class="text-center"><?=$cart->price?></td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total 1.99</strong></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total $150.00</strong></td>
							<td><a href="https://www.paypal.com/webapps/hermes?token=5EY097812P7754247&useraction=commit&mfid=1546377013907_cf1dec6830d7" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
</div>
    <div class="container">

        <div class="row">	
			<?=$this->element('menu');?>
			<div class="col-lg-9 col-xs-12 carts index large-9 medium-8 columns content">
				<h3><?= __('Carts') ?></h3>
				<table cellpadding="0" cellspacing="0" class="table">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('price') ?></th>
							<th scope="col"><?= $this->Paginator->sort('tax') ?></th>
							<th scope="col"><?= $this->Paginator->sort('car_list_id') ?></th>
						   
						</tr>
					</thead>
					<tbody>
						<?php foreach ($carts as $cart): ?>
						<tr>
							<td><?= $this->Number->format($cart->id) ?></td>
							<td><?= $cart->has('user') ? $this->Html->link($cart->user->name, ['controller' => 'Users', 'action' => 'view', $cart->user->id]) : '' ?></td>
							<td><?= h($cart->price) ?></td>
							<td><?= h($cart->tax) ?></td>
							<td><?= $cart->has('car_list') ? $this->Html->link($cart->car_list->name, ['controller' => 'CarLists', 'action' => 'view', $cart->car_list->id]) : '' ?></td>
							
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
		</div>
	</div>
</section>
