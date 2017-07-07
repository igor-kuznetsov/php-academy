SELECT
  `c`.`customerNumber`,
  `o`.`orderNumber`,
  `p`.`checkNumber`
FROM customers AS c
  JOIN orders AS o
    ON c.customerNumber = o.customerNumber
  LEFT JOIN payments AS p
    ON p.customerNumber = c.customerNumber
WHERE `p`.`checkNumber` IS NULL;


SELECT
  `c`.`customerNumber`,
  `c`.`customerName`
FROM customers AS c
  JOIN orders AS o
    ON c.customerNumber = o.customerNumber
  LEFT JOIN payments AS p
    ON p.customerNumber = c.customerNumber
WHERE `p`.`checkNumber` IS NULL
GROUP BY `c`.`customerNumber`;