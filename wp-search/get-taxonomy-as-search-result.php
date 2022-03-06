<?php 

    if(!empty($_GET['name_author'])) {
        $name_author = $_GET['name_author'];
    } else {
        $name_author = '';
    }

    $authorTerms = get_terms( array(
        'taxonomy'      => array( 'book-author' ),
        'orderby'       => 'id', 
        'order'         => 'ASC',
        'hide_empty'    => false,
        'fields'        => 'all',
        'name__like'    => $name_author )
    );


?>

<form action="" >
    <input type="search" name="name_author" value="<?php echo $name_author; ?>" placeholder="Search author" />
    <button type="submit" >
        <i class="fa fa-search"></i>
    </button>
</form>


<?php if(!empty($_GET['name_author'])): ?>
    <div class="search-result">
        <?php foreach ($authorTerms as $singleAuthor) : ?>
            <h2><?php echo $singleAuthor -> name; ?></h2>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    