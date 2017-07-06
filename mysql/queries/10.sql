SELECT
  `of`.`officeCode` AS `office`,
  COUNT(`or`.`orderNumber`) AS `orders_count`
FROM `offices` AS `of`
  JOIN `employees` AS `e`
    ON `e`.`officeCode` = `of`.`officeCode`
  JOIN `customers` AS `c`
    ON `c`.`salesRepEmployeeNumber` = `e`.`employeeNumber`
  JOIN `orders` AS `or`
    ON `or`.`customerNumber` = `c`.`customerNumber`
GROUP BY `of`.`officeCode`;


SELECT
  `of`.`officeCode` AS `office`,
  COUNT(`or`.`orderNumber`) AS `orders_count`
FROM `offices` AS `of`
  JOIN `employees` AS `e`
    ON `e`.`officeCode` = `of`.`officeCode`
  JOIN `customers` AS `c`
    ON `c`.`salesRepEmployeeNumber` = `e`.`employeeNumber`
  JOIN `orders` AS `or`
    ON `or`.`customerNumber` = `c`.`customerNumber`
WHERE YEAR(`or`.`orderDate`) = 2003
GROUP BY `of`.`officeCode`;


SELECT
  `of`.`officeCode` AS `office`,
  COUNT(`or`.`orderNumber`) AS `orders_count`
FROM `offices` AS `of`
  JOIN `employees` AS `e`
    ON `e`.`officeCode` = `of`.`officeCode`
  JOIN `customers` AS `c`
    ON `c`.`salesRepEmployeeNumber` = `e`.`employeeNumber`
  JOIN `orders` AS `or`
    ON `or`.`customerNumber` = `c`.`customerNumber`
WHERE YEAR(`or`.`orderDate`) = 2003
GROUP BY `of`.`officeCode`
HAVING `orders_count` < 15
ORDER BY `orders_count`;