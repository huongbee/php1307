<?php

class Cart
{
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

	public function add($item, $id, $qty=1){
		$giohang = ['qty'=>0, 'price' => $item->price, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty'] = $giohang['qty'] + $qty;
		$giohang['price'] = $item->price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = ($this->totalPrice + $giohang['item']->price);
		
	}
	//xóa 1
	public function reduceByOne($id){ 
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice = ($this->totalPrice - $this->items[$id]['item']['price']);
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
	//update
	public function update($item, $id, $qty=1){
		$giohang = [
			'qty'=>$qty, 
			'price' => $item->price, 
			'item' => $item
		];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$this->totalPrice -= $this->items[$id]['price'];
				$this->totalQty -= $this->items[$id]['qty'];
			}
		}
		$giohang['price'] = $item->price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty = $this->totalQty + $qty;
		$this->totalPrice = $this->totalPrice + ($giohang['item']->price)*$qty;
	}
	
}
