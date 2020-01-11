        <div class="side-content-wrap">
            <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item <?php echo ($act_menu=='Dashboard'?'active':'') ?>">
                        <a class="nav-item-hold" href="<?php echo base_url().'Dashboard'?>">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <?php if(!empty($akses)){
                        $parent_menu = array_filter($akses,function($var){
                            return $var['status']==1;
                            },ARRAY_FILTER_USE_BOTH); 

                        foreach($parent_menu as $parent){ ?>

                    <li class="nav-item <?php echo ($act_menu==$parent['controller']?'active':'') ?> " data-item="<?php echo $parent['kd_menu']?>">
                        <a class="nav-item-hold" href="#">
                            <i class="nav-icon <?php echo $parent['icon']?>"></i>
                            <span class="nav-text"><?php echo $parent['nm_menu']?></span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>

            <div class="sidebar-left-secondary" data-perfect-scrollbar data-suppress-scroll-x="true">
                <!-- Submenu Dashboards -->
                <?php if(!empty($akses)){
                    foreach($parent_menu as $parent){ 
                        $parent_key = $parent['kd_menu'];
                        $child_menu = array_filter($akses,function($var) use ($parent_key){
                            return $var['kd_parent'] == $parent_key;
                            },ARRAY_FILTER_USE_BOTH); 
                        
                        if(!empty($child_menu)){ ?>                             
                        
                <ul class="childNav" data-parent="<?php echo $parent['kd_menu'] ?>">
                    <?php foreach ($child_menu as $child) { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url().$child['controller'] ?>">
                            <i class="nav-icon <?php echo $child['icon'] ?>"></i>
                            <span class="item-name"><?php echo $child['nm_menu'] ?></span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php } ?>
                <?php } ?>
            </div>
            <div class="sidebar-overlay"></div>
        </div>
        <!--=============== Left side End ================-->