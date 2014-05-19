#Shirts.IO PHP SDK Documentation
----

- [Installation](#installation)
- [Setup](#setup)
- Products
	- [Get Categories](#categories)
	- [Get Products](#products)
	- [Get Product Information](#product-info)
- Quote
	- [Get Quote](#quote)
- Order
	- [Place Order](#order)
- Status
	- [Get Order Status](#status)
	

<a name="installation" />
##Installation

```
require: {
 ....
 "abishekrsrikaanth/shirts.io-php-sdk": "1.0"
 ....
}
```

<a name="setup" />
##Setup

```
include("vendor/autoload.php");
use ShirtsIO\ShirtsIO;

$apiKey = "API KEY PROVIDED BY SHIRTS IO"
ShirtsIO::setAPIKey($apiKey);

```


##Products

<a name="categories" />
###Get Categories
```
$productObj = ShirtsIO::Products();
$categories = $productObj->getCategories(); //This will return an array of Product Categories
echo json_encode($categories);

```

<a name="products" />
###Get Products

```
$productObj = ShirtsIO::Products();
$products = $productObj->getProducts($categoryId);
echo json_encode($products);
```

<a name="product-info" />
###Get Product Information

```
$productObj = ShirtsIO::Products();
$productInfo = $productObj->getProductInfo($productId);
echo json_encode($productInfo);
```

**Response: ** https://www.shirts.io/docs/products_reference/#product_id

<a name="quote">

##Quote

###Get Quote


##Order

###Place Order

##Status

###Get Order Status
