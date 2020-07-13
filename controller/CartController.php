<?php
include 'core/autoload.php';
class controller_CartController
{
	public function add()
	{	
		if (isset($_COOKIE["shopping_cart"])) {
			$cookie_data = stripslashes($_COOKIE['shopping_cart']);
			$cart_data = json_decode($cookie_data, true);
		} else {
			$cart_data = array();
		}

		$item_id_list = array_column($cart_data, 'product_id');
		if (in_array($_POST["product_id"], $item_id_list)) {
			foreach ($cart_data as $keys => $values) {
				if ($cart_data[$keys]["product_id"] == $_POST["product_id"]) {
					$cart_data[$keys]["product_amount"] = $cart_data[$keys]["product_amount"] + $_POST["product_amount"];
				}
			}
		} else {
			$item_array = array(
				'product_id'       =>   $_POST["product_id"],
				'product_name'     =>   $_POST["product_name"],
				'product_img'      =>   $_POST["product_img"],
				'product_price'    =>   $_POST["product_price"],
				'product_discount' =>   $_POST['product_discount'],
				'product_amount'   =>   $_POST['product_amount']
			);
			$cart_data[] = $item_array;
		}
		$item_data = json_encode($cart_data);
		setcookie('shopping_cart', $item_data, time() + (86400 * 30));
		$_SESSION['add_cart_success'] = 1;
		return redirect('single?id=' . $_POST['product_id']);
	}

	public function clear()
	{
		setcookie("shopping_cart", "", time() - 3600);
		$_SESSION['clear_cart_success'] = 1;
		return redirect('checkout');
	}

	public function remove()
	{	
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach ($cart_data as $keys => $values) {
			if ($cart_data[$keys]['product_id'] == $_GET["id"]) {
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				$_SESSION['remove_cart_success'] = 1;
				return redirect('checkout');
			}
		}
	}

	public function order()
	{
		$err = false;
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		$orderDAO = new model_OrderDAO(model_DbConnection::make());
		$orderDetailDAO = new model_OrderDetailDAO(model_DbConnection::make());
		$order = new model_Order();
		$order->name = trim($_POST['name']);
		$order->phone = trim($_POST['phone']);
		$order->address = trim($_POST['address']);
		if(trim($_POST['total_order']) > 1300000) $order->delivery = 0; else $order->delivery = 145000;
		$order->total_order = trim($_POST['total_order']) + $order->delivery;
		$order->user_id = null;
		if (!isset($_SESSION)) {
			session_start();
		}
		// Check already loged in
		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
			$order->user_id = $_SESSION["id"];
		}
		if ($order_id = $orderDAO->createCRUD($order)) {
			foreach ($cart_data as $item) {
				$orderDetail = new model_OrderDetail();
				$orderDetail->order_id = $order_id;
				$orderDetail->product_id = $item['product_id'];
				$orderDetail->realPrice = $item['product_price'] * (100 - $item['product_discount']) / 100;
				$orderDetail->amount = $item['product_amount'];
				$orderDetail->total_detail = $orderDetail->realPrice * $orderDetail->amount;
				if ($orderDetailDAO->createCRUD($orderDetail)) $err = false;
				else {
					$err = true;
					break;
				}
			}
		} else {
			$err = true;
		}
		if (!$err) {
			$this->clear();
		}
	}

	public function edit(){
		if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
			$orderDAO = new model_OrderDAO(model_DbConnection::make());
			$orderDAO->updateStatus(trim($_POST['status']),trim($_POST['order_id']));
			return redirect('adOrder');
		}else {
            return view('layout/404');
        }
	}
}
