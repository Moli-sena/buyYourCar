 <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Car Dealer Website</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><?= $this->Html->link(__('Home'), ['controller' => 'Home', 'action' => 'index']) ?></li>
						 
						 <li><?= $this->Html->link(__('Cars'), ['controller' => 'CarLists', 'action' => 'index']) ?></li>
	                      <!--li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                    <li><a href="blog-posts.html">Blog</a></li>
			                         <li><a href="team.html">Team</a></li>
			                         <li><a href="testimonials.html">Testimonials</a></li>
                              </ul>
                         </li-->
						 <?php if($this->request->session()->read('Auth.User.user_type')==1){?>
			<li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
						 
		 <li><?= $this->Html->link(__('Your Car list'), ['controller' => 'CarLists', 'action' => 'list']) ?></li>
        <li><?= $this->Html->link(__('Add New Car'), ['controller' => 'CarLists', 'action' => 'add']) ?></li>
		 <li><?= $this->Html->link(__('Sell List'), ['controller' => 'Carts', 'action' => 'selllist']) ?></li>
		<?php }?>
		 <?php if ($this->request->session()->read('Auth.User.id')){ ?>
		<li><?= $this->Html->link(__('My order'), ['controller' => 'Carts','action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
		<?php }else{ ?>
		
		 <li><?= $this->Html->link(__('Registration'), ['controller' => 'Users', 'action' => 'add']) ?></li>
		  <li><?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'index']) ?></li>
		
		<?php }?>
						 
						 
						
                        
                         
                    </ul>
               </div>

          </div>
     </section>

    