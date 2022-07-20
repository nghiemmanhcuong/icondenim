<?php
    // Lấy ra module hiện tại
    $p = $_GET["p"];
    // Lấy ra type được chuyền trên url nếu có
    if(isset($type)){
        $value = $_GET[$type];
    }

    if(isset($keyword)){
        if(isset($field) && isset($sort)){
            $href = '?p='.$p.'&keyword='.$keyword.'&field='.$field.'&sort='.$sort.'&page=';
        }else {
            $href = '?p='.$p.'&keyword='.$keyword.'&page=';
        }
    }else if(isset($type)){
        $href = '?p='.$p.'&'.$type.'='.$value.'&page=';
    }else if(isset($field) && isset($sort)){
        $href = '?p='.$p.'&field='.$field.'&sort='.$sort.'&page=';
    } else {
        $href = '?p='.$p.'&page=';
    }
?>

<nav class="d-flex justify-content-end">
    <ul class="pagination">
        <li class="page-item <?=($curr_page == 1) ? 'disabled' : ''?>">
            <a class="page-link" href="<?=$href.($curr_page-1)?>">
                <span>&laquo;</span>
            </a>
        </li>
        <?php for($i=1; $i<=$pages; $i++): ?>
        <?php if($curr_page == $i):?>
        <li class="page-item active"><a class="page-link" href="<?=$href.$i?>"><?=$i?></a></li>
        <?php else: ?>
        <li class="page-item"><a class="page-link" href="<?=$href.$i?>"><?=$i?></a></li>
        <?php endif; ?>
        <?php endfor; ?>
        <li class="page-item <?=($curr_page == $pages) ? 'disabled' : ''?>">
            <a class="page-link" href="<?=$href.($curr_page+1)?>">
                <span>&raquo;</span>
            </a>
        </li>
    </ul>
</nav>