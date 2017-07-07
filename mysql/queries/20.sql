CREATE VIEW `customer_product_lines` AS
  SELECT
    `c`.`customerNumber`,
    `c`.`customerName`,
    GROUP_CONCAT(DISTINCT `pl`.`productLine`) AS `productLines`
  FROM `customers` AS `c`
    JOIN `orders` AS `o`
      ON `c`.`customerNumber` = `o`.`customerNumber`
    JOIN `orderdetails` AS `od`
      ON `od`.`orderNumber` = `o`.`orderNumber`
    JOIN `products` AS `p`
      ON `p`.`productCode` = `od`.`productCode`
    JOIN `productlines` AS `pl`
      ON `pl`.`productLine` = `p`.`productLine`
  GROUP BY `c`.`customerNumber`;


SELECT * FROM `customer_product_lines`;