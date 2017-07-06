SELECT
  `od`.`orderNumber`,
  `pr`.`productCode`,
  `pr`.`productName` AS `product`
FROM `products` AS `pr`
  JOIN `orderdetails` AS `od`
    ON `pr`.`productCode` = `od`.`productCode`
  JOIN `orders` AS `o`
    ON `od`.`orderNumber` = `o`.`orderNumber`
  JOIN `customers` AS `c`
    ON `c`.`customerNumber` = `o`.`customerNumber`
  JOIN `payments` AS `pa`
    ON `pa`.`customerNumber` = `c`.`customerNumber`
LIMIT 50;


SELECT
  `pr`.`productName` AS `product`,
  COUNT(`pr`.`productCode`) AS `sold`
FROM `products` AS `pr`
  JOIN `orderdetails` AS `od`
    ON `pr`.`productCode` = `od`.`productCode`
  JOIN `orders` AS `o`
    ON `od`.`orderNumber` = `o`.`orderNumber`
  JOIN `customers` AS `c`
    ON `c`.`customerNumber` = `o`.`customerNumber`
  JOIN `payments` AS `pa`
    ON `pa`.`customerNumber` = `c`.`customerNumber`
GROUP BY `product`
ORDER BY `sold` DESC
LIMIT 10;