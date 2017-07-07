INSERT INTO `result_table` (
  `customerNumber`,
  `customerName`,
  `productLines`
) SELECT
    `c`.`customerNumber`,
    `c`.`customerName`,
    'list,of,coma,separated,product,lines'
  FROM
    `customers` AS `c`,
    `result_table` AS `rt`
  WHERE `c`.`customerNumber` NOT IN (SELECT `customerNumber` FROM `result_table`)
  LIMIT 1;