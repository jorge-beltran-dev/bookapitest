<?php if (is_array($this->data)): ?>
    <?php foreach ($this->data as $book): ?>
        <h3><?php echo $book->title ?></h3>
        <img src="<?php echo $book->image ?>"/>
    <?php endforeach; ?> 
<?php else: ?>
<span>ERROR: Check the API Key and service URL are properly configured</span>
<?php endif; ?>
