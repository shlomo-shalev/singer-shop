<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Menu;

class MainController extends Controller
{
    public static $dtv = [
        'page_title' => 'Rapley - ',
        'mini_nav' => [],
        'nav_active' => [
            'active' => '',
            'active_shop' => '',
        ],
    ];

    public function createPaginateData($items, $redirect){
        $paginate_last_page = $items->lastPage();
        $current_page = $items->currentPage();
        $items_view_total = $items->count();
        $last_item = $items->lastItem();
        if($paginate_last_page < $current_page){
            return redirect($redirect . '?page=' . $paginate_last_page);
        }
        return [
            'paginate_last_page' => $paginate_last_page,
            'current_page' => $current_page,
            'items_total' => $items->total(),
            'items_view_total' => $items_view_total,
            'presented_total' => $last_item + 1 - $items_view_total,
            'will_display_total' => $last_item,
        ];
    }

}