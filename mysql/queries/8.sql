SELECT
  `e`.`employeeNumber` AS `employee_number`,
  COUNT(`c`.`customerNumber`) AS `customers_count`
FROM `employees` AS `e`
  JOIN `customers` AS `c`
    ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`
GROUP BY `e`.`employeeNumber`;


SELECT
  `e`.`employeeNumber` AS `employee_number`,
  COUNT(`c`.`customerNumber`) AS `customers_count`
FROM `employees` AS `e`
  JOIN `customers` AS `c`
    ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`
GROUP BY `e`.`employeeNumber`
HAVING `customers_count` > 5;