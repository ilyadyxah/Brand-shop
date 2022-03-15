<?php

namespace App\Models;

class OldItems
{
    protected $items = [
        0 => ['img_link' => 'image/product-1.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        1 => ['img_link' => 'image/product-2.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        2 => ['img_link' => 'image/product-3.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        3 => ['img_link' => 'image/product-4.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        4 => ['img_link' => 'image/product-5.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        5 => ['img_link' => 'image/product-6.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        6 => ['img_link' => 'image/product-7.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        7 => ['img_link' => 'image/product-8.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        8 => ['img_link' => 'image/product-9.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        9 => ['img_link' => 'image/product-10.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        10 => ['img_link' => 'image/product-11.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        11 => ['img_link' => 'image/product-12.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$'],
        12 => ['img_link' => 'image/product-12.png', 'title' => 'ELLERY X M\'O CAPSULE', 'content' => 'Known for her sculptural takes on traditional tailoring, Australian arbiter of cool Kym Ellery teams up with Moda Operandi.', 'price' => '50$']
    ];

    public function getItems($page, $itemsPerPage) {
        return array_slice($this->items, ($page-1)*$itemsPerPage, $itemsPerPage);
    }

    public function getPages($itemsPerPage) : int {
        $count = count($this->items);
        return ($count % 2 == 0) ? $count/$itemsPerPage : ($count/$itemsPerPage + 1);
    }

    public function getItemById($id)  {
        foreach ($this->items as $ids => $item) {
            if ($id == $ids) {
                return $item;
            }
        }
    }


}
