<?php if(count($this->getLoadedProductCollection()->getItems())): ?>
    <div class="box-collateral box-up-sell">
        <h2><?php echo $this->__('You may also like') ?></h2>
        <ul class="products-grid products-grid--max-4-col" id="upsell-product-table">
            <?php foreach ($this->getLoadedProductCollection()->getItems() as $_link): ?>
                <li>
                    <a href="<?php echo $_link->getProductUrl() ?>" title="<?php echo $this->escapeHtml($_link->getName()) ?>" class="product-image">
                        <img src="<?php echo $this->helper('catalog/image')->init($_link, 'small_image')->resize(280) ?>" alt="<?php echo $this->escapeHtml($_link->getName()) ?>" />
                    </a>
                    <h3 class="product-name"><a href="<?php echo $_link->getProductUrl() ?>" title="<?php echo $this->escapeHtml($_link->getName()) ?>"><?php echo $this->escapeHtml($_link->getName()) ?></a></h3>
                    <?php echo $this->getPriceHtml($_link, true, '-upsell') ?>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
<?php endif ?>
