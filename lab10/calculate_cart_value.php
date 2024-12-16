<?php
// 1. cURL kapcsolat a kosarakhoz
$userId = 1; // Az 1-es user ID-t használjuk példaként
$cartsUrl = "https://fakestoreapi.com/carts/user/$userId";
$productsUrl = "https://fakestoreapi.com/products";

// cURL inicializálás és kosár lekérése
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $cartsUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$cartsResponse = curl_exec($ch);
curl_close($ch);

// Kosarak dekódolása
$carts = json_decode($cartsResponse, true);

// 2. cURL kapcsolat az árak lekéréséhez
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $productsUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$productsResponse = curl_exec($ch);
curl_close($ch);

// Termékek dekódolása
$products = json_decode($productsResponse, true);

// Termékárak előkészítése
$productPrices = [];
foreach ($products as $product) {
    $productPrices[$product['id']] = $product['price'];
}

// Kosarak összértékének számítása
$totalValue = 0;
foreach ($carts as $cart) {
    foreach ($cart['products'] as $item) {
        $productId = $item['productId'];
        $quantity = $item['quantity'];
        $totalValue += $productPrices[$productId] * $quantity;
    }
}

// Eredmény kiíratása
echo "A $userId azonosítójú felhasználó kosarainak összértéke: $" . number_format($totalValue, 2);
?>
