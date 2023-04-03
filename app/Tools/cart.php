<?php

namespace App\Tools;


 class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){
            
            if($oldCart){
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }

        }

        public function add($item, $id, $image){

          
            $storedItem = ['quantity' => 0, 'id' => 0, 'title' => $item->title,
            'basic_price' => $item->basic_price, 'image' => $image, 'item' =>$item];

            if($this->items){
                if(array_key_exists($id, $this->items)){
                    $storedItem = $this->items[$id];
                }
            }

            $storedItem['quantity']++;
            $storedItem['id'] = $item->id;
            $storedItem['title'] = $item->title;
            $storedItem['basic_price'] = $item->basic_price;
            $storedItem['image'] = $image;
            $this->totalQty++;
            $this->totalPrice+= $item->basic_price;
            $this->items[$id] = $storedItem;

        }

        public function updateQty($id, $qty){
            $this->totalQty -= $this->items[$id]['quantity'];
            $this->totalPrice -= $this->items[$id]['basic_price'] * $this->items[$id]['quantity'];
            $this->items[$id]['quantity'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['basic_price'] * $qty;

        }

        public function removeItem($id){
            $this->totalQty -= $this->items[$id]['quantity'];
            $this->totalPrice -= $this->items[$id]['basic_price'] * $this->items[$id]['quantity'];
            unset($this->items[$id]);
        }


    }