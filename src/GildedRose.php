<?php

namespace Runroom\GildedRose;

class GildedRose {
    private $items;

    public function __construct($items){
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
            if ($item->name !== 'Aged Brie' and $item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0 and $item->name !== 'Sulfuras, Hand of Ragnaros') {
                    $item->quality--;
                }
            } elseif ($item->quality < 50) {
                $item->quality++;
                if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sell_in < 11) {
                        $item->quality++;
                    }
                    if ($item->sell_in < 6) {
                        $item->quality++;
                    }
                }
            }
            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in--;
            }
            if ($item->sell_in < 0 and $item->name !== 'Aged Brie') {
                if ($item->name !== 'Backstage passes to a TAFKAL80ETC concert' and $item->quality > 0 and $item->name !== 'Sulfuras, Hand of Ragnaros') {
                    $item->quality--;
                } else {
                    $item->quality = 0;
                }
            } elseif ($item->sell_in < 0 and $item->quality < 50) {
                $item->quality++;
            }
        }
    }
}
