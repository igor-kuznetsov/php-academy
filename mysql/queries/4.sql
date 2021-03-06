SELECT
  `o`.`city` AS `office`,
  CONCAT_WS(' ', `e`.`firstName`, `e`.`lastName`)  AS `employee`
FROM `offices` AS `o`
  JOIN `employees` AS `e`
    ON `o`.`officeCode` = `e`.`officeCode`;


SELECT
  `o`.`city` AS `office`,
  COUNT(`e`.`employeeNumber`) AS `employee_count`
FROM `offices` AS `o`
  JOIN `employees` AS `e`
    ON `o`.`officeCode` = `e`.`officeCode`
GROUP BY `o`.`officeCode`;


SELECT
  `o`.`city` AS `office`,
  `e`.`email`,
  `c`.`customerName`
FROM `offices` AS `o`
  JOIN `employees` AS `e`
    ON `o`.`officeCode` = `e`.`officeCode`
  LEFT JOIN `customers` AS `c`
    ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`;


SELECT
  `o`.`city` AS `office`,
  COUNT(`e`.`employeeNumber`) AS `employee_count`,
  COUNT(`c`.`customerNumber`) AS `customer_count`
FROM `offices` AS `o`
  JOIN `employees` AS `e`
    ON `o`.`officeCode` = `e`.`officeCode`
  LEFT JOIN `customers` AS `c`
    ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`
GROUP BY `o`.`officeCode`;


SELECT
  `o`.`city` AS `office`,
  COUNT(DISTINCT `e`.`employeeNumber`) AS `employee_count`,
  COUNT(`c`.`customerNumber`) AS `customer_count`
FROM `offices` AS `o`
  JOIN `employees` AS `e`
    ON `o`.`officeCode` = `e`.`officeCode`
  LEFT JOIN `customers` AS `c`
    ON `e`.`employeeNumber` = `c`.`salesRepEmployeeNumber`
GROUP BY `o`.`officeCode`;
