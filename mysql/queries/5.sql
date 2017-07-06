SELECT
  `customerNumber`,
  avg(`amount`)
FROM `payments`
GROUP BY `customerNumber`;


SELECT
  `e`.`employeeNumber`,
  `c`.`customerNumber`,
  `p`.`amount` AS `payment`
FROM `payments` AS `p`
  LEFT JOIN `customers` AS `c`
    ON `p`.`customerNumber` = `c`.`customerNumber`
  RIGHT JOIN `employees` AS `e`
    ON `c`.`salesRepEmployeeNumber` = `e`.`employeeNumber`;


SELECT
  `e`.`employeeNumber`,
  `c`.`customerNumber`,
  IFNULL(AVG(`p`.`amount`), 0) AS `payment`
FROM `payments` AS `p`
  LEFT JOIN `customers` AS `c`
    ON `p`.`customerNumber` = `c`.`customerNumber`
  RIGHT JOIN `employees` AS `e`
    ON `c`.`salesRepEmployeeNumber` = `e`.`employeeNumber`
GROUP BY `c`.`customerNumber`, `e`.`employeeNumber`;