<?php 
    if(isset($field) && isset($sort)){
        $href = '?sort_by='.$field.'-'.$sort.'&page=';
    }else if(isset($keyword)){
        if(isset($_GET['size']) && isset($_GET['color'])) {
            $href = '?keyword='.$keyword.'&size='.$_GET['size'].'&color='.$_GET['color'].'&page=';
        }else if(isset($_GET['color'])) {
            $href = '?keyword='.$keyword.'&color='.$_GET['color'].'&page=';
        }else if(isset($_GET['size'])) {
            $href = '?keyword='.$keyword.'&size='.$_GET['size'].'&page=';
        }else {
            $href = '?keyword='.$keyword.'&page=';
        }
    }else if(isset($_GET['size']) && isset($_GET['color'])) {
        $href = '?size='.$_GET['size'].'&color='.$_GET['color'].'&page=';
    }else if(isset($_GET['color'])) {
        $href = '?color='.$_GET['color'].'&page=';
    }else if(isset($_GET['size'])) {
        $href = '?size='.$_GET['size'].'&page=';
    }else {
        $href = '?page=';
    }
?>

<nav class="pagination-container">
    <ul class="pagination">
        <li class="pagination-item">
            <a href="<?=$href.($curr_page - 1)?>" class="pagination-link <?=($curr_page == 1 ? 'disable' : '')?>">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for($i=1; $i<=$pages; $i++):?>
        <li class="pagination-item">
            <a href="<?=$href.$i?>" class="pagination-link <?=($i == $curr_page) ? 'active' : ''?>">
                <?=$i?>
            </a>
        </li>
        <?php endfor;?>
        <li class="pagination-item">
            <a href="<?=$href.($curr_page + 1)?>" class="pagination-link <?=($curr_page == $pages ? 'disable' : '')?>">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>