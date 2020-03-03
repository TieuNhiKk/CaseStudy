<?php

// $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
// $totalpage = ceil($pages / 4);
// $food = [];
// for ($i = (($page - 1) * 4); $i < ($page * 4) || $i<$totalpage ; $i++) {
//     $j = $page * 4 - $i - 1;
//     $food[$j] = $foods[$i];
// }

// $li = '';

// if ($page > 1) {
//     $li .=  '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '>Previous</a></li>';
//     $li .= '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '</a></li>';
// }

// $li .= "<li class='page-item active'><a class='page-link' href='?page=" . $page . "</a></li>";

// if ($page < $totalpage) {
//     $li .= "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "</a></li>";
//     $li .= "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next</a></li>";
// }
