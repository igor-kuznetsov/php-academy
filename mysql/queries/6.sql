SELECT
  CONCAT_WS(' ', `e`.`firstName`, `e`.`lastName`) AS `employee`,
  `c`.`customerName` AS `customer`
FROM `employees` AS `e`
  LEFT JOIN `customers` AS `c` ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`
WHERE `c`.`customerNumber` IS NULL;