SELECT `c`.`customerName` AS `customer`
FROM `customers` AS `c`;


SELECT `c`.`customerName` AS `customer`
FROM `customers` AS `c`
WHERE `c`.`customerNumber` = 121;


SELECT
  `c`.`customerName` AS `customer`,
  `p`.`amount`,
  `p`.`paymentDate`
FROM `customers` AS `c`
  JOIN `payments` AS `p`
    ON `p`.`customerNumber` = `c`.`customerNumber`
WHERE `c`.`customerNumber` = 121;


SELECT
  `c`.`customerName` AS `customer`,
  SUM(`p`.`amount`) AS `payment`,
  YEAR(`p`.`paymentDate`) AS `year`,
  MONTH(`p`.`paymentDate`) AS `month`
FROM `customers` AS `c`
  JOIN `payments` AS `p`
    ON `p`.`customerNumber` = `c`.`customerNumber`
WHERE `c`.`customerNumber` = 121
GROUP BY YEAR(`p`.`paymentDate`),
  MONTH(`p`.`paymentDate`);