SELECT *
FROM `orders` AS `o1`, `orders` AS `o2`;


SELECT *
FROM `orders` AS `o1`, `orders` AS `o2`
WHERE `o1`.`customerNumber` = `o2`.`customerNumber`;


SELECT *
FROM `orders` AS `o1`, `orders` AS `o2`
WHERE
  `o1`.`customerNumber` = `o2`.`customerNumber`
  AND `o1`.`orderDate` < `o2`.`orderDate`;


SELECT
  `o1`.`customerNumber` AS `customer`,
  `o1`.`orderNumber` AS `order_1`,
  `o1`.`orderDate` AS `order_1_date`,
  `o2`.`orderNumber` AS `order_2`,
  `o2`.`orderDate` AS `order_2_date`,
  PERIOD_DIFF( /* Returns the number of months between P1 and P2. P1 and P2 should be in the format YYMM or YYYYMM. */
      DATE_FORMAT(`o2`.`orderDate`, '%Y%m'),
      DATE_FORMAT(`o1`.`orderDate`, '%Y%m')
  ) AS `diff_months`
FROM `orders` AS `o1`, `orders` AS `o2`
WHERE
  `o1`.`customerNumber` = `o2`.`customerNumber`
  AND `o1`.`orderDate` < `o2`.`orderDate`;


SELECT
  `o1`.`customerNumber` AS `customer`,
  `o1`.`orderNumber` AS `order_1`,
  `o1`.`orderDate` AS `order_1_date`,
  `o2`.`orderNumber` AS `order_2`,
  `o2`.`orderDate` AS `order_2_date`,
  PERIOD_DIFF(
      DATE_FORMAT(`o2`.`orderDate`, '%Y%m'),
      DATE_FORMAT(`o1`.`orderDate`, '%Y%m')
  ) AS `diff_months`,
  (
    SELECT COUNT(*)
    FROM `orders` AS `o3`
    WHERE
      `o3`.`orderDate` > `o1`.`orderDate`
      AND `o3`.`orderDate` < `o2`.`orderDate`
      AND `o3`.`customerNumber` = `o1`.`customerNumber`
  ) AS `inner_orders`
FROM `orders` AS `o1`, `orders` AS `o2`
WHERE
  `o1`.`customerNumber` = `o2`.`customerNumber`
  AND `o1`.`orderDate` < `o2`.`orderDate`;


SELECT
  `o1`.`customerNumber` AS `customer`,
  `o1`.`orderNumber` AS `order_1`,
  `o1`.`orderDate` AS `order_1_date`,
  `o2`.`orderNumber` AS `order_2`,
  `o2`.`orderDate` AS `order_2_date`
FROM `orders` AS `o1`, `orders` AS `o2`
WHERE
  `o1`.`customerNumber` = `o2`.`customerNumber`
  AND `o1`.`orderDate` < `o2`.`orderDate`
  AND (
    SELECT COUNT(*)
    FROM `orders` AS `o3`
    WHERE
      `o3`.`orderDate` > `o1`.`orderDate`
      AND `o3`.`orderDate` < `o2`.`orderDate`
      AND `o3`.`customerNumber` = `o1`.`customerNumber`
  ) = 0
  AND PERIOD_DIFF(
      DATE_FORMAT(`o2`.`orderDate`, '%Y%m'),
      DATE_FORMAT(`o1`.`orderDate`, '%Y%m')
  ) > 3;