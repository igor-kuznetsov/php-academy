SELECT
  `c`.`customerNumber`,
  `c`.`customerName`,
  `o`.`orderNumber`
FROM `customers` AS `c`
  LEFT JOIN `orders` AS `o`
    ON (
      `o`.`customerNumber` = `c`.`customerNumber`
      AND MONTH(`o`.`orderDate`) = '2'
      AND YEAR(`o`.`orderDate`) = '2004'
    );


SELECT
  `c`.`customerNumber`,
  `c`.`customerName`
FROM `customers` AS `c`
  LEFT JOIN `orders` AS `o`
    ON (
    `o`.`customerNumber` = `c`.`customerNumber`
    AND MONTH(`o`.`orderDate`) = '2'
    AND YEAR(`o`.`orderDate`) = '2004'
    )
WHERE `o`.`orderNumber` IS NULL;